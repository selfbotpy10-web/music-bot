import asyncio
import logging
from telegram import Update, InlineKeyboardButton, InlineKeyboardMarkup
from telegram.ext import Application, CommandHandler, CallbackQueryHandler, MessageHandler, ContextTypes, filters
from telegram import Bot
from telegram.error import TelegramError
from music_engine import search_tracks, track_text

log = logging.getLogger(__name__)

class BotManager:
    def __init__(self, db, admin_ids):
        self.db = db
        self.admin_ids = admin_ids
        self.apps = {}
        self.locks = {}

    async def create_bot(self, owner_id, token):
        token = token.strip()
        if len(token) > 200 or ":" not in token:
            return {"ok": False, "error": "قالب توکن معتبر نیست"}
        price = await self.db.get_price()
        if not await self.db.reserve_build(owner_id, price):
            return {"ok": False, "error": "موجودی الماس کافی نیست"}
        bot = Bot(token=token)
        try:
            await bot.initialize()
            me = await bot.get_me()
            if not me.username:
                raise ValueError("ربات نام کاربری ندارد")
            # Store only after API validation. Token remains private in SQLite; protect file permissions.
            bot_id = await self.db.register_bot(owner_id, token, me.id, me.username, me.first_name, price)
            ok = await self.start_bot(bot_id)
            if not ok:
                # Registration is kept for diagnosis, but refund the reserved price.
                await self.db.refund(owner_id, price, "بازگشت هزینه: راه‌اندازی ربات ناموفق")
                await self.db.set_bot_status(bot_id, "error")
                return {"ok": False, "error": "توکن معتبر بود اما راه‌اندازی ناموفق شد"}
            return {"ok": True, "id": bot_id, "name": me.first_name, "username": me.username, "price": price}
        except Exception as e:
            log.warning("bot creation failed: %s", type(e).__name__)
            await self.db.refund(owner_id, price, "بازگشت هزینه: اعتبارسنجی/ثبت ناموفق")
            return {"ok": False, "error": "توکن نامعتبر است یا تلگرام پاسخ نداد"}
        finally:
            try: await bot.shutdown()
            except Exception: pass

    async def start_bot(self, bot_id):
        if bot_id in self.apps:
            return True
        row = await self.db.get_bot(bot_id)
        if not row:
            return False
        try:
            app = Application.builder().token(row["token"]).build()
            app.bot_data["bot_record_id"] = bot_id
            app.bot_data["db"] = self.db
            app.add_handler(CommandHandler("start", child_start))
            app.add_handler(CommandHandler("admin", child_admin))
            app.add_handler(CallbackQueryHandler(child_callback))
            app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, child_search))
            await app.initialize()
            await app.start()
            await app.updater.start_polling(allowed_updates=Update.ALL_TYPES, drop_pending_updates=False)
            self.apps[bot_id] = app
            await self.db.set_bot_status(bot_id, "active")
            return True
        except Exception as e:
            log.warning("start child bot %s failed: %s", bot_id, type(e).__name__)
            try:
                if 'app' in locals():
                    await app.shutdown()
            except Exception: pass
            await self.db.set_bot_status(bot_id, "error")
            return False

    async def stop_bot(self, bot_id):
        app = self.apps.pop(bot_id, None)
        if app:
            try:
                if app.updater and app.updater.running:
                    await app.updater.stop()
                await app.stop()
                await app.shutdown()
            except Exception as e:
                log.warning("stop child failed: %s", type(e).__name__)
        await self.db.set_bot_status(bot_id, "stopped")

    async def start_saved_bots(self):
        for row in await self.db.all_bots():
            # Avoid automatically restarting bots marked stopped by their owner.
            if row["status"] != "stopped":
                await self.start_bot(row["id"])

    async def stop_all(self):
        for bid in list(self.apps):
            await self.stop_bot(bid)

async def child_start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    await update.effective_message.reply_text(
        "🎧 به مرکز جست‌وجوی موسیقی خوش آمدید!\n\nنام آهنگ یا خواننده را ارسال کنید تا حداکثر ۱۰ نتیجه واقعی از کاتالوگ موسیقی پیدا کنیم.\n"
        "این نسخه لینک رسمی پیش‌نمایش/صفحه اثر را ارائه می‌کند و فایل کامل دارای حق نشر را دانلود نمی‌کند.",
        reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔎 راهنمای جست‌وجو", callback_data="child:help")]])
    )

async def child_search(update: Update, context: ContextTypes.DEFAULT_TYPE):
    q = (update.effective_message.text or "").strip()
    if len(q) < 2:
        return await update.effective_message.reply_text("لطفاً نام آهنگ یا خواننده را دقیق‌تر وارد کنید.")
    msg = await update.effective_message.reply_text("🔎 در حال جست‌وجوی آهنگ...")
    try:
        tracks = await search_tracks(q, limit=10)
    except Exception:
        return await msg.edit_text("⚠️ سرویس جست‌وجو موقتاً در دسترس نیست. کمی بعد دوباره تلاش کنید.")
    db = context.application.bot_data["db"]
    await db.record_search(update.effective_user.id, q, len(tracks))
    if not tracks:
        return await msg.edit_text("😕 نتیجه مناسبی پیدا نشد. نام آهنگ و خواننده را هم‌زمان امتحان کنید.")
    context.user_data["tracks"] = {str(i): t for i,t in enumerate(tracks[:10])}
    rows = []
    for i,t in enumerate(tracks[:10]):
        title = f"{i+1}. {t.get('trackName','بدون عنوان')} — {t.get('artistName','')}"
        rows.append([InlineKeyboardButton(title[:60], callback_data=f"track:{i}")])
    await msg.edit_text(f"🎵 {len(tracks[:10])} نتیجه پیدا شد؛ یکی را انتخاب کنید:", reply_markup=InlineKeyboardMarkup(rows))

async def child_callback(update: Update, context: ContextTypes.DEFAULT_TYPE):
    q = update.callback_query
    await q.answer()
    if q.data == "child:help":
        return await q.edit_message_text("نام آهنگ، بخشی از عنوان یا نام خواننده را ارسال کنید.")
    if q.data.startswith("track:"):
        track = context.user_data.get("tracks", {}).get(q.data.split(":")[1])
        if not track:
            return await q.edit_message_text("نتیجه منقضی شده؛ دوباره جست‌وجو کنید.")
        buttons = []
        if track.get("previewUrl"):
            buttons.append([InlineKeyboardButton("▶️ پخش پیش‌نمایش رسمی", url=track["previewUrl"])])
        if track.get("trackViewUrl"):
            buttons.append([InlineKeyboardButton("🍎 صفحه رسمی اثر", url=track["trackViewUrl"])])
        buttons.append([InlineKeyboardButton("🔎 جست‌وجوی جدید", callback_data="child:help")])
        return await q.edit_message_text(track_text(track), reply_markup=InlineKeyboardMarkup(buttons))

async def child_admin(update: Update, context: ContextTypes.DEFAULT_TYPE):
    row = await context.application.bot_data["db"].get_bot(context.application.bot_data["bot_record_id"])
    uid = update.effective_user.id
    if not row or uid not in {int(row["owner_id"]), *context.application.bot_data.get("admin_ids", set())}:
        return await update.effective_message.reply_text("⛔ این دستور فقط برای مدیر ربات است.")
    await update.effective_message.reply_text(
        f"🎛 پنل پایه مدیریت @{row['username']}\nشناسه ربات: {row['id']}\nوضعیت: {row['status']}\n"
        "آمار جست‌وجو و تنظیمات پیشرفته در نسخه پایه محدود است."
    )
