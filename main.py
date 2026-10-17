import asyncio
import logging
import os
from dotenv import load_dotenv
from telegram import Update, InlineKeyboardButton, InlineKeyboardMarkup
from telegram.ext import (
    Application, CommandHandler, CallbackQueryHandler, MessageHandler,
    ContextTypes, filters
)
from database import Database
from bot_manager import BotManager
from music_engine import search_tracks, track_text

load_dotenv()
logging.basicConfig(level=logging.INFO, format="%(asctime)s %(levelname)s %(name)s: %(message)s")
logging.getLogger("httpx").setLevel(logging.WARNING)
log = logging.getLogger("music-builder")

TOKEN = os.getenv("BUILDER_BOT_TOKEN", "").strip()
ADMIN_IDS = {int(x.strip()) for x in os.getenv("ADMIN_IDS", "").split(",") if x.strip().isdigit()}
DB_PATH = os.getenv("DATABASE_PATH", "music_builder.sqlite3")
PRICE_DEFAULT = 500

db = Database(DB_PATH)
manager = BotManager(db, ADMIN_IDS)
CHILD_APPS = {}
PENDING = {}
USER_RESULTS = {}
PAGE_SIZE = 10

def is_admin(uid: int) -> bool:
    return uid in ADMIN_IDS

def main_menu(uid):
    rows = [
        [InlineKeyboardButton("🎵 ساخت ربات موسیقی", callback_data="build")],
        [InlineKeyboardButton("🤖 ربات‌های من", callback_data="mybots"), InlineKeyboardButton("💎 موجودی الماس", callback_data="balance")],
        [InlineKeyboardButton("🛒 خرید الماس", callback_data="buy"), InlineKeyboardButton("📊 حساب کاربری", callback_data="account")],
        [InlineKeyboardButton("📚 راهنمای ساخت", callback_data="help"), InlineKeyboardButton("🎫 پشتیبانی", callback_data="support")],
    ]
    if is_admin(uid):
        rows.append([InlineKeyboardButton("🛡 پنل مدیریت مرکزی", callback_data="admin")])
    return InlineKeyboardMarkup(rows)

async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    u = update.effective_user
    await db.ensure_user(u.id, u.username or "", u.full_name or "")
    await update.effective_message.reply_text(
        "🎵 به ربات‌ساز موسیقی خوش آمدید!\n\n"
        "ربات موسیقی اختصاصی خود را بسازید، عبارت آهنگ یا خواننده را جست‌وجو کنید و لینک رسمی پیش‌نمایش آهنگ‌ها را دریافت کنید.\n\n"
        f"💎 هزینه ساخت هر ربات: {await db.get_price()} الماس",
        reply_markup=main_menu(u.id)
    )

async def show_home(q, uid):
    await q.edit_message_text("🏠 منوی اصلی ربات‌ساز\nیکی از گزینه‌ها را انتخاب کنید:", reply_markup=main_menu(uid))

async def cb(update: Update, context: ContextTypes.DEFAULT_TYPE):
    q = update.callback_query
    await q.answer()
    uid = q.from_user.id
    data = q.data
    await db.ensure_user(uid, q.from_user.username or "", q.from_user.full_name or "")
    if data == "home":
        return await show_home(q, uid)
    if data == "build":
        price = await db.get_price()
        bal = await db.balance(uid)
        if bal < price:
            return await q.edit_message_text(
                f"❌ موجودی الماس کافی نیست.\n\n💎 هزینه ساخت: {price}\n💰 موجودی فعلی: {bal}",
                reply_markup=InlineKeyboardMarkup([
                    [InlineKeyboardButton("💎 خرید الماس", callback_data="buy")],
                    [InlineKeyboardButton("👤 حساب کاربری", callback_data="account")],
                    [InlineKeyboardButton("🔙 بازگشت", callback_data="home")]
                ])
            )
        PENDING[uid] = {"stage": "token"}
        return await q.edit_message_text(
            f"🎵 ساخت ربات اختصاصی موسیقی\n\n💎 هزینه ساخت: {price} الماس\n"
            "امکانات: جست‌وجوی واقعی از کاتالوگ iTunes، نمایش حداکثر ۱۰ نتیجه، انتخاب نتیجه و لینک رسمی پیش‌نمایش.\n\n"
            "برای ادامه، توکن رباتی را که از @BotFather گرفته‌اید ارسال کنید.\n"
            "⚠️ توکن محرمانه است؛ فقط همین ربات‌ساز آن را می‌گیرد. برای لغو /cancel بفرستید.",
            reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]])
        )
    if data == "balance":
        return await q.edit_message_text(f"💎 موجودی شما: {await db.balance(uid)} الماس", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]]))
    if data == "account":
        stats = await db.user_stats(uid)
        return await q.edit_message_text(
            f"📊 حساب کاربری\nشناسه: {uid}\n💎 الماس: {stats['balance']}\n🤖 ربات‌های ساخته‌شده: {stats['bots']}\n📅 عضویت: {stats['joined']}",
            reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]])
        )
    if data == "mybots":
        bots = await db.user_bots(uid)
        if not bots:
            txt = "هنوز رباتی نساخته‌اید."
        else:
            txt = "🤖 ربات‌های شما:\n\n" + "\n".join(f"• @{b['username']} — {b['status']} (شناسه {b['id']})" for b in bots)
        return await q.edit_message_text(txt, reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]]))
    if data == "buy":
        return await q.edit_message_text(
            "💎 خرید الماس\n\nدر این نسخه پرداخت خودکار فعال نیست. برای شارژ، از پشتیبانی درخواست بدهید و پرداخت را فقط پس از بررسی واقعی مدیر تأیید کنید.\n"
            "ارسال رسید توسط کاربر به‌تنهایی پرداخت را تأیید نمی‌کند.",
            reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]])
        )
    if data == "help":
        return await q.edit_message_text(
            "📚 راهنما\n۱) از BotFather یک ربات بسازید و توکن را کپی کنید.\n۲) «ساخت ربات موسیقی» را بزنید و توکن را ارسال کنید.\n۳) پس از اعتبارسنجی، نام ربات ثبت و اجرا می‌شود.\n۴) داخل ربات ساخته‌شده نام آهنگ یا خواننده را ارسال کنید.\n\nجست‌وجو از iTunes Search API انجام می‌شود. در این نسخه فایل کامل آهنگ دانلود نمی‌شود؛ لینک رسمی پیش‌نمایش/صفحه اثر ارائه می‌شود.",
            reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]])
        )
    if data == "support":
        return await q.edit_message_text("🎫 پشتیبانی\nبرای پشتیبانی، شناسه تلگرام و توضیح مشکل را برای مدیر سامانه ارسال کنید.", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 بازگشت", callback_data="home")]]))
    if data == "admin":
        if not is_admin(uid):
            return await q.edit_message_text("⛔ دسترسی ندارید.")
        return await admin_home(q)
    if data.startswith("adm:"):
        return await admin_callback(q, uid, data)
    if data.startswith("track:"):
        key = data.split(":", 1)[1]
        track = USER_RESULTS.get((uid, key))
        if not track:
            return await q.edit_message_text("این نتیجه منقضی شده است؛ دوباره جست‌وجو کنید.", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🏠 منوی اصلی", callback_data="home")]]))
        return await q.edit_message_text(track_text(track), reply_markup=InlineKeyboardMarkup([
            [InlineKeyboardButton("▶️ لینک رسمی پیش‌نمایش", url=track.get("previewUrl") or track.get("trackViewUrl") or "https://music.apple.com/")],
            [InlineKeyboardButton("🍎 صفحه رسمی اثر", url=track.get("trackViewUrl") or "https://music.apple.com/")],
            [InlineKeyboardButton("🔙 بازگشت به نتایج", callback_data=f"results:{uid}")]
        ]))
    if data.startswith("results:"):
        owner = int(data.split(":")[1])
        if owner != uid:
            return await q.edit_message_text("این درخواست متعلق به کاربر دیگری است.")
        tracks = context.user_data.get("last_tracks", [])
        if not tracks:
            return await q.edit_message_text("نتایج قبلی موجود نیست؛ نام آهنگ را دوباره ارسال کنید.")
        return await show_results(q, uid, tracks)
    if data.startswith("botadm:"):
        parts = data.split(":")
        bot_id = int(parts[1])
        action = parts[2]
        row = await db.get_bot(bot_id)
        if not row or int(row["owner_id"]) != uid:
            return await q.edit_message_text("⛔ این ربات متعلق به شما نیست.")
        if action == "panel":
            return await q.edit_message_text(
                f"🎛 پنل ربات @{row['username']}\nوضعیت: {row['status']}\nشناسه: {bot_id}\n"
                "پنل پایه فعال است؛ تنظیمات پیشرفته‌تر در نسخه بعدی قابل افزودن است.",
                reply_markup=InlineKeyboardMarkup([
                    [InlineKeyboardButton("▶️ راه‌اندازی", callback_data=f"botadm:{bot_id}:start"), InlineKeyboardButton("⏸ توقف", callback_data=f"botadm:{bot_id}:stop")],
                    [InlineKeyboardButton("🔙 بازگشت", callback_data="mybots")]
                ])
            )
        if action == "start":
            ok = await manager.start_bot(bot_id)
            return await q.edit_message_text("✅ ربات راه‌اندازی شد." if ok else "❌ راه‌اندازی ناموفق بود؛ توکن یا اتصال را بررسی کنید.", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data=f"botadm:{bot_id}:panel")]]))
        if action == "stop":
            await manager.stop_bot(bot_id)
            return await q.edit_message_text("⏸ درخواست توقف ثبت شد.", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data=f"botadm:{bot_id}:panel")]]))
    await q.edit_message_text("این گزینه شناخته نشد.", reply_markup=main_menu(uid))

async def show_results(q, uid, tracks):
    rows = []
    for i, t in enumerate(tracks[:10]):
        key = str(i)
        USER_RESULTS[(uid, key)] = t
        title = f"{i+1}. {t.get('trackName','بدون عنوان')} — {t.get('artistName','هنرمند نامشخص')}"
        rows.append([InlineKeyboardButton(title[:60], callback_data=f"track:{key}")])
    rows.append([InlineKeyboardButton("🔎 جست‌وجوی جدید", callback_data="home")])
    await q.edit_message_text(f"🎵 نتایج واقعی جست‌وجو: {len(tracks[:10])}\nیک نتیجه را انتخاب کنید:", reply_markup=InlineKeyboardMarkup(rows))

async def text_message(update: Update, context: ContextTypes.DEFAULT_TYPE):
    uid = update.effective_user.id
    text = (update.effective_message.text or "").strip()
    if text == "/cancel":
        PENDING.pop(uid, None)
        await update.effective_message.reply_text("عملیات لغو شد.", reply_markup=main_menu(uid))
        return
    if uid in PENDING and PENDING[uid].get("stage") == "token":
        token = text
        await update.effective_message.reply_text("🔐 در حال اعتبارسنجی توکن...")
        result = await manager.create_bot(uid, token)
        PENDING.pop(uid, None)
        if result.get("ok"):
            await update.effective_message.reply_text(
                f"🎉 ربات موسیقی ساخته و راه‌اندازی شد!\n\n🎵 نام: {result['name']}\n🤖 نام کاربری: @{result['username']}\n💎 هزینه: {result['price']} الماس\n✅ وضعیت: فعال",
                reply_markup=InlineKeyboardMarkup([
                    [InlineKeyboardButton("🎛 پنل مدیریت ربات", callback_data=f"botadm:{result['id']}:panel")],
                    [InlineKeyboardButton("🤖 مشاهده ربات", url=f"https://t.me/{result['username']}")],
                    [InlineKeyboardButton("🏠 منوی اصلی", callback_data="home")]
                ])
            )
        else:
            await update.effective_message.reply_text("❌ ساخت ربات انجام نشد: " + result.get("error", "خطای نامشخص") + "\nالماس شما در صورت کسر، بازگردانده شده است.", reply_markup=main_menu(uid))
        return
    if text.startswith("/"):
        return
    await db.ensure_user(uid, update.effective_user.username or "", update.effective_user.full_name or "")
    await update.effective_message.reply_text("🔎 در حال جست‌وجوی آهنگ موردنظر شما...")
    try:
        tracks = await search_tracks(text, limit=10)
    except Exception as e:
        log.warning("music search failed: %s", type(e).__name__)
        await update.effective_message.reply_text("⚠️ سرویس جست‌وجو موقتاً در دسترس نیست. کمی بعد دوباره تلاش کنید.")
        return
    await db.record_search(uid, text, len(tracks))
    if not tracks:
        await update.effective_message.reply_text("😕 نتیجه مناسبی پیدا نشد.\nنام آهنگ و خواننده را دقیق‌تر بنویسید.", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🏠 منوی اصلی", callback_data="home")]]))
        return
    context.user_data["last_tracks"] = tracks
    rows = []
    for i, t in enumerate(tracks[:10]):
        USER_RESULTS[(uid, str(i))] = t
        rows.append([InlineKeyboardButton(f"{i+1}. {(t.get('trackName') or 'بدون عنوان')[:35]} — {(t.get('artistName') or '')[:20]}", callback_data=f"track:{i}")])
    await update.effective_message.reply_text(f"🎵 {len(tracks[:10])} نتیجه واقعی پیدا شد:", reply_markup=InlineKeyboardMarkup(rows))

async def admin_home(q):
    stats = await db.system_stats()
    await q.edit_message_text(
        "🛡 پنل مدیریت مرکزی\n\n"
        f"👥 کاربران: {stats['users']}\n🤖 ربات‌های ثبت‌شده: {stats['bots']}\n"
        f"💎 مجموع موجودی: {stats['diamonds']}\n💎 الماس مصرف‌شده: {stats['spent']}\n"
        f"🔎 جست‌وجوها: {stats['searches']}\n\n"
        "از گزینه‌ها استفاده کنید:",
        reply_markup=InlineKeyboardMarkup([
            [InlineKeyboardButton("📊 آمار سیستم", callback_data="adm:stats"), InlineKeyboardButton("💎 قیمت ساخت", callback_data="adm:price")],
            [InlineKeyboardButton("➕ افزودن الماس", callback_data="adm:add")],
            [InlineKeyboardButton("📋 تراکنش‌های اخیر", callback_data="adm:tx")],
            [InlineKeyboardButton("🤖 ربات‌های ثبت‌شده", callback_data="adm:bots")],
            [InlineKeyboardButton("🔙 منوی اصلی", callback_data="home")]
        ])
    )

async def admin_callback(q, uid, data):
    if not is_admin(uid):
        return await q.edit_message_text("⛔ دسترسی ندارید.")
    action = data.split(":")[1]
    if action == "stats":
        s = await db.system_stats()
        return await q.edit_message_text("\n".join(f"{k}: {v}" for k,v in s.items()), reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data="admin")]]))
    if action == "price":
        return await q.edit_message_text(f"💎 قیمت فعلی ساخت: {await db.get_price()} الماس\nبرای تغییر قیمت دستور زیر را ارسال کنید:\n/setprice 500", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data="admin")]]))
    if action == "add":
        return await q.edit_message_text("برای افزودن الماس دستور زیر را ارسال کنید:\n/adddiamonds USER_ID AMOUNT دلیل", reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data="admin")]]))
    if action == "tx":
        rows = await db.recent_transactions()
        msg = "📋 تراکنش‌های اخیر:\n\n" + ("\n".join(rows) if rows else "تراکنشی ثبت نشده است.")
        return await q.edit_message_text(msg[:3900], reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data="admin")]]))
    if action == "bots":
        rows = await db.all_bots()
        msg = "🤖 ربات‌های ثبت‌شده:\n\n" + ("\n".join(f"#{b['id']} @{b['username']} | مالک {b['owner_id']} | {b['status']}" for b in rows) if rows else "هنوز رباتی ثبت نشده است.")
        return await q.edit_message_text(msg[:3900], reply_markup=InlineKeyboardMarkup([[InlineKeyboardButton("🔙 پنل", callback_data="admin")]]))

async def admin_command(update: Update, context: ContextTypes.DEFAULT_TYPE):
    uid = update.effective_user.id
    if not is_admin(uid):
        return
    parts = (update.effective_message.text or "").split(maxsplit=2)
    cmd = parts[0].split("@")[0]
    try:
        if cmd == "/setprice" and len(parts) >= 2:
            value = int(parts[1])
            if value < 1: raise ValueError
            await db.set_price(value, uid)
            await update.effective_message.reply_text(f"✅ قیمت ساخت به {value} الماس تغییر کرد.")
        elif cmd == "/adddiamonds" and len(parts) >= 3:
            target, amount = int(parts[1]), int(parts[2])
            reason = parts[3] if len(parts) > 3 else "شارژ توسط مدیر"
            await db.adjust_diamonds(target, amount, uid, reason)
            await update.effective_message.reply_text("✅ موجودی به‌روزرسانی و تراکنش ثبت شد.")
        else:
            await update.effective_message.reply_text("دستور مدیر:\n/setprice 500\n/adddiamonds USER_ID AMOUNT دلیل")
    except Exception:
        await update.effective_message.reply_text("❌ ورودی نامعتبر یا عملیات ناموفق بود.")

async def post_init(app: Application):
    await db.initialize()
    await manager.start_saved_bots()

async def post_shutdown(app: Application):
    await manager.stop_all()
    await db.close()

def main():
    if not TOKEN:
        raise SystemExit("لطفاً BUILDER_BOT_TOKEN را در فایل .env تنظیم کنید.")
    app = Application.builder().token(TOKEN).post_init(post_init).post_shutdown(post_shutdown).build()
    app.add_handler(CommandHandler("start", start))
    app.add_handler(CommandHandler(["setprice", "adddiamonds"], admin_command))
    app.add_handler(CallbackQueryHandler(cb))
    app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, text_message))
    app.run_polling(allowed_updates=Update.ALL_TYPES)

if __name__ == "__main__":
    main()
