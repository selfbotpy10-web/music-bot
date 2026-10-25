"""Nitro Self Telegram bot. Deploy as a separate Railway service with start command: python bot.py"""
import os
import logging
from telegram import Update, ReplyKeyboardMarkup, KeyboardButton, WebAppInfo, InlineKeyboardMarkup, InlineKeyboardButton
from telegram.ext import Application, CommandHandler, MessageHandler, ContextTypes, filters
from main import app, db, User, Ledger, Selfbot

logging.basicConfig(level=os.getenv("LOG_LEVEL", "INFO"), format="%(asctime)s %(levelname)s %(name)s: %(message)s")
log = logging.getLogger("nitro-bot")
TOKEN = os.getenv("BOT_TOKEN", "").strip()
BOT_USERNAME = os.getenv("BOT_USERNAME", "").strip().lstrip("@")
ADMIN_IDS = {x.strip() for x in os.getenv("ADMIN_IDS", "").split(",") if x.strip()}
WEBAPP_URL = os.getenv("WEBAPP_URL", "").strip()
SUPPORT_USERNAME = os.getenv("SUPPORT_USERNAME", "").strip().lstrip("@")
CHANNEL_USERNAME = os.getenv("CHANNEL_USERNAME", "").strip().lstrip("@")

MENU = ReplyKeyboardMarkup(
    [["🎛 پنل مدیریت و فعال‌سازی سلف"], ["💎 موجودی", "💰 شارژ حساب"],
     ["🎁 خرید گیفت", "🛍 فروشگاه بنر"], ["🤖 دستیار هوشمند", "💎 انتقال الماس"],
     ["🎡 گردونه شانس", "🎯 چالش روزانه"], ["🏆 لیدربورد"],
     ["👥 زیرمجموعه‌گیری", "👤 حساب کاربری"], ["🆘 پشتیبانی", "📢 کانال"], ["❓ سلف چیست؟"]],
    resize_keyboard=True,
    input_field_placeholder="یک گزینه را انتخاب کنید…"
)


def upsert_user(tg_user):
    with app.app_context():
        uid = str(tg_user.id)
        user = User.query.filter_by(telegram_id=uid).first()
        if not user:
            user = User(telegram_id=uid, username=(tg_user.username or "")[:80], first_name=(tg_user.first_name or "کاربر")[:100])
            db.session.add(user)
        else:
            user.username = (tg_user.username or "")[:80]
            user.first_name = (tg_user.first_name or "کاربر")[:100]
        db.session.commit()
        return {"id": user.telegram_id, "name": user.first_name, "username": user.username, "diamonds": user.diamonds}


def is_admin(user_id):
    return str(user_id) in ADMIN_IDS


def webapp_markup():
    if WEBAPP_URL.startswith("https://"):
        return InlineKeyboardMarkup([[InlineKeyboardButton("🌐 باز کردن پنل Nitro Self", web_app=WebAppInfo(url=WEBAPP_URL))]])
    return None


async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not update.effective_user or not update.message:
        return
    user = upsert_user(update.effective_user)
    text = (f"🔥 به نیترو سلف خوش آمدی، {user['name']}!\n"
            "━━━━━━━━━━━━━━━━\n"
            "قدرتمندترین پنل مدیریت سلف تلگرام، با منوی فارسی و دسترسی سریع.\n\n"
            f"💎 موجودی شما: {user['diamonds']:,} الماس\n\n"
            "برای شروع یکی از گزینه‌های زیر را انتخاب کن 👇")
    await update.message.reply_text(text, reply_markup=MENU)
    markup = webapp_markup()
    if markup:
        await update.message.reply_text("برای باز کردن پنل سایت، دکمه زیر را بزن:", reply_markup=markup)


async def balance(update: Update, context: ContextTypes.DEFAULT_TYPE):
    user = upsert_user(update.effective_user)
    await update.message.reply_text(f"💎 کیف پول شما\n\nموجودی: {user['diamonds']:,} الماس\nشناسه تلگرام: `{user['id']}`", parse_mode="Markdown", reply_markup=MENU)


async def account(update: Update, context: ContextTypes.DEFAULT_TYPE):
    user = upsert_user(update.effective_user)
    with app.app_context():
        bots = Selfbot.query.filter_by(owner_telegram_id=str(update.effective_user.id)).count()
    await update.message.reply_text(f"👤 حساب کاربری\n\nنام: {user['name']}\nشناسه: `{user['id']}`\n💎 موجودی: {user['diamonds']:,}\n🤖 سلف‌های ثبت‌شده: {bots}", parse_mode="Markdown", reply_markup=MENU)


async def admin(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not is_admin(update.effective_user.id):
        await update.message.reply_text("⛔ این بخش فقط برای ادمین است.", reply_markup=MENU)
        return
    with app.app_context():
        users = User.query.count()
        diamonds = db.session.query(db.func.sum(User.diamonds)).scalar() or 0
        bots = Selfbot.query.count()
        ledgers = Ledger.query.count()
    text = ("👑 مرکز مدیریت Nitro Self\n\n"
            f"👥 کاربران ثبت‌شده: {users}\n💎 مجموع الماس‌ها: {diamonds:,}\n"
            f"🤖 رکورد سلف‌ها: {bots}\n📒 تراکنش‌ها: {ledgers}\n\n"
            "برای شارژ یا کسر الماس از دستور زیر استفاده کن:\n"
            "`/adddiamonds شناسه_کاربر مقدار توضیح`\n"
            "مثال: `/adddiamonds 123456789 50 شارژ دستی`\n"
            "مقدار منفی برای کسر الماس است.")
    await update.message.reply_text(text, parse_mode="Markdown", reply_markup=MENU)


async def add_diamonds(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not is_admin(update.effective_user.id):
        await update.message.reply_text("⛔ دسترسی ادمین لازم است.", reply_markup=MENU)
        return
    if len(context.args) < 2:
        await update.message.reply_text("فرمت: /adddiamonds شناسه_کاربر مقدار توضیح")
        return
    target = context.args[0]
    try:
        amount = int(context.args[1])
    except ValueError:
        await update.message.reply_text("مقدار الماس باید عدد صحیح باشد.")
        return
    if amount == 0 or abs(amount) > 1_000_000:
        await update.message.reply_text("مقدار نامعتبر است.")
        return
    note = " ".join(context.args[2:])[:240] or "تغییر موجودی توسط ادمین"
    with app.app_context():
        user = User.query.filter_by(telegram_id=target).first()
        if not user:
            await update.message.reply_text("کاربر پیدا نشد. باید حداقل یک بار /start را در ربات زده باشد.")
            return
        if user.diamonds + amount < 0:
            await update.message.reply_text("موجودی کاربر با این کسر منفی می‌شود.")
            return
        user.diamonds += amount
        new_balance = user.diamonds
        db.session.add(Ledger(telegram_id=target, amount=amount, note=note))
        db.session.commit()
    await update.message.reply_text(f"✅ انجام شد. موجودی جدید کاربر {target}: {new_balance:,} الماس")


async def menu_handler(update: Update, context: ContextTypes.DEFAULT_TYPE):
    if not update.message or not update.effective_user:
        return
    text = update.message.text or ""
    if text == "💎 موجودی":
        return await balance(update, context)
    if text == "👤 حساب کاربری":
        return await account(update, context)
    if text == "🎛 پنل مدیریت و فعال‌سازی سلف":
        msg = ("🤖 مدیریت سلف\n\nدر این نسخه، پنل سایت و ثبت اطلاعات آماده است؛ اجرای واقعی نشست سلف هنوز به ماژول موجود پروژه شما مثل helper_bot.py متصل نشده است.\n\n"
               "⚠️ برای جلوگیری از گمراهی، این دکمه سلف را به‌صورت خودکار روشن نمی‌کند.")
        await update.message.reply_text(msg, reply_markup=webapp_markup() or MENU)
    elif text == "💰 شارژ حساب":
        support = f"@{SUPPORT_USERNAME}" if SUPPORT_USERNAME else "پشتیبانی ربات"
        await update.message.reply_text(f"💰 شارژ حساب\n\nدرگاه پرداخت خودکار هنوز پیکربندی نشده است. برای شارژ دستی با {support} تماس بگیرید. شناسه شما: `{update.effective_user.id}`", parse_mode="Markdown", reply_markup=MENU)
    elif text == "🆘 پشتیبانی":
        msg = f"برای پشتیبانی به @{SUPPORT_USERNAME} پیام دهید." if SUPPORT_USERNAME else "نام کاربری پشتیبانی هنوز در تنظیمات ربات ثبت نشده است."
        await update.message.reply_text(msg, reply_markup=MENU)
    elif text == "📢 کانال":
        msg = f"کانال رسمی: https://t.me/{CHANNEL_USERNAME}" if CHANNEL_USERNAME else "لینک کانال هنوز در تنظیمات ربات ثبت نشده است."
        await update.message.reply_text(msg, reply_markup=MENU, disable_web_page_preview=True)
    elif text == "👥 زیرمجموعه‌گیری":
        link = f"https://t.me/{BOT_USERNAME}?start={update.effective_user.id}" if BOT_USERNAME else "BOT_USERNAME را در Railway تنظیم کنید."
        await update.message.reply_text(f"👥 لینک دعوت اختصاصی شما:\n{link}\n\nپس از ثبت نام دوستان، قابلیت پاداش دعوت باید طبق قوانین دلخواه شما فعال شود.", reply_markup=MENU, disable_web_page_preview=True)
    elif text == "❓ سلف چیست؟":
        await update.message.reply_text("سلف معمولاً به حساب کاربری تلگرام که با نشست کاربر اجرا می‌شود گفته می‌شود. برای فعال‌سازی واقعی باید ماژول امن و موجود پروژه متصل شود؛ توکن ربات به‌تنهایی سلف نمی‌سازد.", reply_markup=MENU)
    elif text == "🎁 خرید گیفت":
        await update.message.reply_text("🎁 بخش خرید گیفت هنوز به فروشنده یا API واقعی متصل نشده است.", reply_markup=MENU)
    elif text == "🛍 فروشگاه بنر":
        await update.message.reply_text("🛍 فروشگاه بنر در نسخه پایه نمایشی است؛ برای سفارش واقعی باید محصولات و پرداخت تعریف شوند.", reply_markup=MENU)
    elif text == "🤖 دستیار هوشمند":
        await update.message.reply_text("🤖 هلپر ثبت‌شده در پروژه شما هنوز از این منو فراخوانی نمی‌شود. اتصال آن نیازمند بررسی کد helper_bot.py است.", reply_markup=MENU)
    elif text == "💎 انتقال الماس":
        await update.message.reply_text("💎 انتقال الماس در این نسخه غیرفعال است تا انتقال‌ها بدون کنترل و ثبت تراکنش انجام نشوند.", reply_markup=MENU)
    elif text in ("🎡 گردونه شانس", "🎯 چالش روزانه", "🏆 لیدربورد"):
        await update.message.reply_text("این بخش هنوز فعال نشده و برای جلوگیری از نمایش نتیجه ساختگی، فعلاً فقط به‌صورت معرفی نمایش داده می‌شود.", reply_markup=MENU)
    else:
        await update.message.reply_text("از منوی پایین یک گزینه را انتخاب کنید یا /start را بزنید.", reply_markup=MENU)


def main():
    if not TOKEN:
        raise RuntimeError("BOT_TOKEN در متغیرهای Railway تنظیم نشده است.")
    # Ensure tables exist before the bot starts.
    with app.app_context():
        db.create_all()
    application = Application.builder().token(TOKEN).build()
    application.add_handler(CommandHandler("start", start))
    application.add_handler(CommandHandler("balance", balance))
    application.add_handler(CommandHandler("account", account))
    application.add_handler(CommandHandler("admin", admin))
    application.add_handler(CommandHandler("adddiamonds", add_diamonds))
    application.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, menu_handler))
    log.info("Nitro Self bot is starting; polling must run in only one Railway service.")
    application.run_polling(drop_pending_updates=True)


if __name__ == "__main__":
    main()
