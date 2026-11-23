# -*- coding: utf-8 -*-
"""
V2rey Panel — from-scratch replica of @V2reyPanelBot
=====================================================
Single-file bot built with aiogram 3.x + SQLite (stdlib sqlite3).

A clean-room re-implementation of everything a normal user can SEE in
@V2reyPanelBot: forced-join gate (2 channels), TWO main menus (the
panel-builder menu shown after /start and the "Evo" menu reached when
returning to the main menu from the test-config delivery / lucky-dice
flows), panel builder (tariffs + custom volume 250–10000 GB @ 1500/GB +
username step), my panels, a shared payment screen (wallet / card-to-card
with a KYC gate / crypto), wallet + charge (min 100,000 T, crypto bonus
tiers) + gift code + payment history, lucky dice (native dice, >=4 wins a
10% code valid 6h, 7-day cooldown), free test service (1 GB / 1 day, stub
sub link + QR), config shop (30/60/100 GB plans + custom 20–500 GB,
30–180 days @ 2000/GB), support (@AndyCoffin URL, broken support-2,
tickets), FAQ, (empty) tutorials, bot builder (500,000 T/month) and the
Evo referral program (10%), plus a full admin panel.

Real Marzban / 3x-ui panel provisioning and real payment verification are
TODO stubs — see create_panel_stub() / create_config_stub() /
verify_crypto_payment_stub(): they return placeholder credentials/links
that a real deployment must replace.

Button colours (Bot API styles, as observed live):
  GREEN  = "success"   — both main menus entirely; most CTAs
  BLUE   = "primary"   — gate (ALL primary), tariff header/custom rows,
                         support URL buttons, dice roll, test claim,
                         config custom entry, bot-builder confirm
  ORANGE/BROWN = "danger" — only «حذف کد تخفیف» on the payment screen

Premium / custom emojis:
  The original uses premium custom emojis whose numeric IDs are NOT
  extractable from outside. CUSTOM_EMOJI_IDS therefore ships EMPTY and
  every label keeps its standard-emoji fallback; btn() wires
  icon_custom_emoji_id automatically once an ID is filled in.
"""

import asyncio
import io
import logging
import os
import random
import secrets
import sqlite3
import string
import time
from contextlib import closing
from datetime import datetime, timezone

from aiogram import Bot, Dispatcher, F, Router
from aiogram.client.default import DefaultBotProperties
from aiogram.enums import ParseMode
from aiogram.exceptions import TelegramBadRequest
from aiogram.filters import Command, CommandStart, StateFilter
from aiogram.fsm.context import FSMContext
from aiogram.fsm.state import State, StatesGroup
from aiogram.types import (
    BotCommand,
    BufferedInputFile,
    CallbackQuery,
    InlineKeyboardButton,
    InlineKeyboardMarkup,
    Message,
    WebAppInfo,
)

# ---------------------------------------------------------------------------
# Config (.env)
# ---------------------------------------------------------------------------

def _load_dotenv(path: str = ".env") -> None:
    if not os.path.exists(path):
        return
    with open(path, encoding="utf-8") as fh:
        for line in fh:
            line = line.strip()
            if not line or line.startswith("#") or "=" not in line:
                continue
            key, _, value = line.partition("=")
            os.environ.setdefault(key.strip(), value.strip())


_load_dotenv(os.path.join(os.path.dirname(os.path.abspath(__file__)), ".env"))

BOT_TOKEN = os.getenv("BOT" + "_TOKEN", "")
BOT_USERNAME = os.environ.get("BOT_USERNAME", "V2reyPanelBot")
ADMIN_IDS = {
    int(x) for x in os.environ.get("ADMIN_IDS", "").replace(";", ",").split(",")
    if x.strip().lstrip("-").isdigit()
}
DB_PATH = os.environ.get("DB_PATH", os.path.join(
    os.path.dirname(os.path.abspath(__file__)), "bot.db"))

logging.basicConfig(level=logging.INFO,
                    format="%(asctime)s %(levelname)s %(name)s: %(message)s")
log = logging.getLogger("v2rey-replica")

# ---------------------------------------------------------------------------
# Premium / custom emoji IDs — EMPTY (IDs are not extractable from outside).
# Fill a value and btn(..., emoji_key="panel") picks it up automatically.
# ---------------------------------------------------------------------------
CUSTOM_EMOJI_IDS = {
    "panel": None,
    "config": None,
    "wallet": None,
    "gift": None,
    "dice": None,
    "test": None,
    "support": None,
    "check": None,
    "back": None,
}

STYLE_SUCCESS = "success"   # GREEN
STYLE_PRIMARY = "primary"   # BLUE
STYLE_DANGER = "danger"     # ORANGE / BROWN


def btn(text, callback_data=None, *, url=None, style=None,
        icon_custom_emoji_id=None, emoji_key=None, web_app_url=None):
    """One InlineKeyboardButton with optional Bot API style + custom emoji."""
    icon = icon_custom_emoji_id
    if icon is None and emoji_key is not None:
        icon = CUSTOM_EMOJI_IDS.get(emoji_key)
    kwargs = {"text": text}
    if callback_data is not None:
        kwargs["callback_data"] = callback_data
    if url is not None:
        kwargs["url"] = url
    if web_app_url is not None:
        kwargs["web_app"] = WebAppInfo(url=web_app_url)
    if style or icon:
        try:
            return InlineKeyboardButton(
                **kwargs, style=style, icon_custom_emoji_id=icon)
        except TypeError:
            return InlineKeyboardButton(**kwargs)
    return InlineKeyboardButton(**kwargs)


def kb(rows):
    return InlineKeyboardMarkup(inline_keyboard=rows)


def fmt(n) -> str:
    """Thousands-separated integer, Latin digits like the original bot."""
    try:
        return f"{int(round(float(n))):,}"
    except (TypeError, ValueError):
        return str(n)


def now_ts() -> int:
    return int(time.time())


# ---------------------------------------------------------------------------
# Database (SQLite) + settings
# ---------------------------------------------------------------------------

DEFAULT_SETTINGS = {
    "panel_price_per_gb": "1500",      # Toman per GB for panel builder
    "config_price_per_gb": "2000",     # Toman per GB for config shop
    "botbuilder_price": "500000",      # Toman / month
    "min_charge": "100000",            # minimum wallet charge (Toman)
    "card_number": "6037-0000-0000-0000",   # TODO: admin must set real card
    "card_holder": "—",                     # TODO: admin must set holder
    "crypto_trx": "TTu1SwQkoQZkZCUt8EkzWddZZEtQJbagvA",
    "crypto_usdt_bep20": "0x8E56D00FcDcC52a60089a770B591B3Cb27129ee2",
    "crypto_ton": "UQAfAhd5QhVzBNobvyQfvbIMgYj42DXgDJ6Tj-GMqr5ibyzB",
    "gate_enabled": "1",
    "gate_strict": "0",
    "gate_channels": "-1002251642309,-1003118300399",
    "gate_link_1": "https://t.me/+gate_channel_1",   # TODO: admin sets invite links
    "gate_link_2": "https://t.me/+gate_channel_2",   # TODO: admin sets invite links
    "support_1": "AndyCoffin",
    "support_2": "qim7ixo",
    "support_fin": "qim7ixo",
    "miniapp_url": "",
    "sub_base_url": "https://sub.example.com/sub/",  # TODO: real sub domain
    "ref_percent": "10",
    "crypto_bonus_tiers": "1000000:3,3000000:5,5000000:7,10000000:10",  # min_amount:bonus%
    "dice_cooldown_days": "7",
    "dice_win_percent": "10",
    "dice_code_valid_hours": "6",
}

SCHEMA = """
CREATE TABLE IF NOT EXISTS users(
  id INTEGER PRIMARY KEY, username TEXT, full_name TEXT,
  balance INTEGER DEFAULT 0, banned INTEGER DEFAULT 0,
  kyc_status TEXT DEFAULT 'none',  -- none|pending|approved|rejected
  ref_by INTEGER, test_used INTEGER DEFAULT 0,
  last_dice_at INTEGER DEFAULT 0, created_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS settings(k TEXT PRIMARY KEY, v TEXT);
CREATE TABLE IF NOT EXISTS panels(
  id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, username TEXT,
  volume_gb INTEGER, price INTEGER, sub_link TEXT, status TEXT DEFAULT 'active',
  created_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS configs(
  id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, name TEXT,
  volume_gb INTEGER, days INTEGER, price INTEGER, sub_link TEXT,
  status TEXT DEFAULT 'active', created_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS orders(
  id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, kind TEXT,
  amount INTEGER, final_amount INTEGER, discount_code TEXT,
  status TEXT DEFAULT 'unpaid',  -- unpaid|pending_review|paid|rejected
  method TEXT, meta TEXT, receipt_file TEXT, tx_hash TEXT,
  created_at INTEGER DEFAULT 0, paid_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS codes(
  code TEXT PRIMARY KEY, kind TEXT,  -- gift|discount|dice
  amount INTEGER DEFAULT 0, percent INTEGER DEFAULT 0,
  expires_at INTEGER DEFAULT 0, used_by INTEGER, used_at INTEGER DEFAULT 0,
  created_by INTEGER DEFAULT 0, created_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS wallet_tx(
  id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, amount INTEGER,
  descr TEXT, created_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS tickets(
  id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, text TEXT,
  status TEXT DEFAULT 'open', reply TEXT, created_at INTEGER DEFAULT 0);
CREATE TABLE IF NOT EXISTS kyc(
  id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER,
  card_number TEXT, photo_file TEXT, status TEXT DEFAULT 'pending',
  created_at INTEGER DEFAULT 0);
"""


def db():
    conn = sqlite3.connect(DB_PATH)
    conn.row_factory = sqlite3.Row
    return conn


def init_db():
    with closing(db()) as conn:
        conn.executescript(SCHEMA)
        for k, v in DEFAULT_SETTINGS.items():
            conn.execute(
                "INSERT OR IGNORE INTO settings(k,v) VALUES(?,?)", (k, v))
        conn.commit()


def get_setting(key, default=None):
    with closing(db()) as conn:
        row = conn.execute(
            "SELECT v FROM settings WHERE k=?", (key,)).fetchone()
    if row is None:
        return DEFAULT_SETTINGS.get(key, default)
    return row["v"]


def set_setting(key, value):
    with closing(db()) as conn:
        conn.execute(
            "INSERT INTO settings(k,v) VALUES(?,?) "
            "ON CONFLICT(k) DO UPDATE SET v=excluded.v", (key, str(value)))
        conn.commit()


def sget_int(key, default=0):
    try:
        return int(float(get_setting(key, default)))
    except (TypeError, ValueError):
        return default


def get_user(uid):
    with closing(db()) as conn:
        return conn.execute(
            "SELECT * FROM users WHERE id=?", (uid,)).fetchone()


def ensure_user(user, ref_by=None):
    with closing(db()) as conn:
        row = conn.execute(
            "SELECT * FROM users WHERE id=?", (user.id,)).fetchone()
        if row is None:
            conn.execute(
                "INSERT INTO users(id,username,full_name,ref_by,created_at)"
                " VALUES(?,?,?,?,?)",
                (user.id, user.username or "", user.full_name or "",
                 ref_by, now_ts()))
            conn.commit()
            row = conn.execute(
                "SELECT * FROM users WHERE id=?", (user.id,)).fetchone()
        return row


def add_balance(uid, amount, descr=""):
    with closing(db()) as conn:
        conn.execute(
            "UPDATE users SET balance=balance+? WHERE id=?", (amount, uid))
        conn.execute(
            "INSERT INTO wallet_tx(user_id,amount,descr,created_at)"
            " VALUES(?,?,?,?)", (uid, amount, descr, now_ts()))
        conn.commit()


def gen_code(prefix="", length=8):
    alphabet = string.ascii_uppercase + string.digits
    return prefix + "".join(secrets.choice(alphabet) for _ in range(length))


# ---------------------------------------------------------------------------
# TODO stubs — real provisioning / verification lives here in production.
# ---------------------------------------------------------------------------

def create_panel_stub(username: str, volume_gb: int) -> str:
    """TODO: create the client on the real Marzban / 3x-ui panel and return
    its real subscription link. Placeholder link for the replica."""
    base = get_setting("sub_base_url").rstrip("/") + "/"
    return f"{base}{username}"


def create_config_stub(user_id: int, volume_gb: int, days: int) -> str:
    """TODO: issue a real config on the panel. Placeholder sub link."""
    base = get_setting("sub_base_url").rstrip("/") + "/"
    return f"{base}cfg{user_id}{secrets.token_hex(4)}"


def verify_crypto_payment_stub(tx_hash: str, currency: str, amount) -> bool:
    """TODO: verify the transaction on-chain. Replica: always False —
    an admin approves crypto payments manually from the admin panel."""
    return False


def make_qr_png(link: str) -> bytes:
    import qrcode  # qrcode[pil]
    img = qrcode.make(link)
    buf = io.BytesIO()
    img.save(buf, format="PNG")
    return buf.getvalue()


# ---------------------------------------------------------------------------
# Persian UI texts — VERBATIM from live exploration of @V2reyPanelBot.
# Do not paraphrase: typos in the original (e.g. «حللا», «اکر») are kept.
# ---------------------------------------------------------------------------

WELCOME_PANEL = (
    "👏 سلام به بخش خرید پنل خوش اومدی؛\n"
    "⬅️ بدون نیاز به هیچگونه دانش برنامه نویسی به راحتی پنل VPN خودتو بساز.\n"
    "✔️ امکان ساخت کاربر با حجم و روز دلخواه\n"
    "✔️ دریافت ربات فروش اختصاصی حرفه‌ای\n"
    "✔️ کاملاً اختصاصی و قابل شخصی سازی"
)

WELCOME_EVO = (
    "⚡️ به ربات مجموعه Evo خوش اومدی؛ تجربه اتصالی پرسرعت و بدون قطعی.\n"
    "made by @AndyCoffin & @iblcd 💞🛡\n"
    "💎 جهت خرید و بازدید از محصولات ربات همین الان از طریق دکمه‌های زیر شروع کن !"
)

GATE_TEXT = (
    "📢 عضویت در کانال الزامیست.\n"
    "💎 جهت استفاده از خدمات ربات، لطفاً ابتدا در کانال ما عضو شده و سپس روی دکمه «بررسی عضویت» کلیک کنید."
)

PANEL_TARIFF_TEXT = (
    "💵 تعرفه پنل\n"
    "جهت دیدن جزئیات و یا خرید، پلن مورد نظر خود را انتخاب کنید 👇"
)

PANEL_CUSTOM_VOLUME_TEXT = (
    "✅ نمایندگی با حجم دلخواه\n"
    "حجم پنل خود را انتخاب کنید.\n"
    "💵 هر گیگ: 1,500 تومان\n"
    "📤 حجم: از 250 تا 10000 گیگ\n"
    "✅ مقدار حجم دلخواه خود را ارسال کنید\n"
    "عدد آن را بفرستید — بین 250 و 10000."
)

PANEL_USERNAME_TEXT = (
    "مشخصات سفارش شما:\n"
    "حجم پنل: {vol} گیگ\n"
    "مبلغ: {price} تومان\n"
    "تنظیم نام کاربری\n"
    "لطفاً نام کاربری دلخواه خود را جهت ساخت پنل ارسال نمایید.\n"
    "شرایط نام کاربری:\n"
    "طول عبارت: بین ۳ تا ۳۲ کاراکتر\n"
    "کاراکترهای مجاز: فقط حروف انگلیسی، اعداد و آندرلاین ( _ )\n"
    "رمز عبور به‌صورت خودکار توسط ربات ساخته شده و پس از تکمیل پرداخت تحویل داده می‌شود."
)

MY_PANELS_EMPTY = (
    "⚡️ لیست پنل ها\n"
    "در حال حاضر هیچ پنلی برای حساب شما ثبت نشده است. جهت شروع، لطفاً یکی از پلنها را انتخاب کرده و خریداری نمایید ❤️."
)
MY_PANELS_TEXT = "⚡️ لیست پنل ها\nپنل مورد نظر خود را انتخاب کنید 👇"

PAYMENT_TEXT = (
    "🛫 مبلغ قابل پرداخت محصول: {final} تومان\n"
    "💰 موجودی کیف پول: {balance} تومان\n"
    "❤️ لطفاً روش پرداخت را انتخاب نمایید."
)

PAYMENT_DISCOUNT_SUFFIX = (
    "\n🎟 کد تخفیف {code} با موفقیت اعمال شد!\n"
    "🛍 درصد تخفیف: {percent}٪\n"
    "⚠️ قیمت اصلی: {amount} تومان\n"
    "🔥 قیمت با تخفیف: {final} تومان"
)

KYC_GATE_TEXT = (
    "🪪 بخش احراز هویت\n"
    "✔️ برای استفاده از این روش پرداخت، یک بار باید هویتتان توسط ادمین تأیید شود.\n"
    "⁉️ چه باید بفرستید:\n"
    "• عکس کارت بانکی به نام خودتان ( cvv2 و تاریخ انقضا کارت را پنهان کنید و فقط شماره کارت و اسم دارنده کارت خوانا باشد )\n"
    "• یک عکس از کارت بگیرید و در کنار یه دست نوشته قرار بدید:\n"
    "مبلغ ? تومان جهت خرید خدمات از این مجموعه به ایدی تلگرامی @AndyCoffin از کارت [ شماره کارت خودتان ] واریز شده.\n"
    "• میتوانید توضیح هم بنویسید. بعد از بررسی توسط پشتیبانی، نتیجه همینجا به شما اطلاع داده میشود.\n"
    "• فقط با کارتی که احراز هویت انجام دادید قادر به استفاده از این روش پرداخت هستید ، اکر با کارت دیگری پرداخت انجام بدید ، تراکنش شما رد میشود!\n"
    "این کار فقط یک بار لازم است."
)

KYC_DONE_TEXT = "✅ اطلاعات احراز هویت ثبت شد و برای بررسی به ادمین ارسال شد. بعد از تأیید، بهت اطلاع می‌دیم."
KYC_APPROVED_TEXT = "✅ احراز هویتت تأیید شد! حالا می‌تونی کارت به کارت پرداخت کنی."
KYC_REJECTED_TEXT = "❌ احراز هویتت رد شد. لطفاً دوباره با اطلاعات درست تلاش کن."

CARD_PAY_TEXT = (
    "💳 پرداخت کارت به کارت\n\n"
    "مبلغ {amount} تومان رو به شماره کارت زیر واریز کن:\n\n"
    "💳 <code>{card}</code>\n"
    "👤 به نام: {holder}\n\n"
    "بعد از واریز، عکس رسید رو همینجا بفرست."
)

RECEIPT_OK_TEXT = "📸 رسیدت ثبت شد و برای بررسی به ادمین ارسال شد. بعد از تأیید، سفارشت فعال می‌شه."
CRYPTO_OK_TEXT = "📸 اسکرین شات تراکنشت ثبت شد و برای بررسی به ادمین ارسال شد. بعد از تأیید، سفارشت فعال می‌شه."

CRYPTO_TEXT = (
    "✅ جهت افزایش موجودی مبلغ {amount} تومان را به یکی از ادرس ولت‌های زیر واریز کنید 👇🏻\n"
    "🪙 TRX (trc20): {trx}\n"
    "🪙 USDT (bep20): {usdt}\n"
    "🪙 TON (ton): {ton}\n"
    "✅ اسکرین شات تراکنش خود را ارسال کنید\n"
    "‼️ در پرداخت ارزی نیازی نیست مانند پرداخت ریالی مبلغ واریزی شما به صورت دقیق باشد.\n"
    "⚠️ در صورت داشتن هر گونه مشکل و یا سوال راجب نحوه‌ی پرداخت با ادمین بخش پرداخت در ارتباط باشید: @qim7ixo ( ادمین بخش پرداخت )"
)

WALLET_TEXT = (
    "👛 بخش کیف پول\n"
    "💰 موجودی فعلی: {balance} تومان\n"
    "❗️ با شارژ کیف پول, پردازش خرید های بعدی شما به صورت آنی و بدون نیاز به تایید انجام میشود."
)

CHARGE_METHOD_TEXT = (
    "➕ شارژ کیف پول\n"
    "انتخاب کنید با چه روشی می‌خواهید پرداخت کنید."
)

CHARGE_AMOUNT_CARD_TEXT = (
    "➕ شارژ کیف پول\n"
    "⚡️ روش پرداخت: کارت به کارت\n"
    "حالا مبلغ مورد نظر را به عدد بفرستید.\n"
    "• کمترین مبلغ: {min_charge} تومان"
)

CHARGE_AMOUNT_CRYPTO_TEXT = (
    "➕ شارژ کیف پول\n"
    "⚡️ روش پرداخت: ارز دیجیتال\n"
    "حالا مبلغ مورد نظر را به عدد بفرستید.\n"
    "• کمترین مبلغ: {min_charge} تومان\n"
    "🎁 هدیه‌ی شارژ با این روش\n"
    "• از 1,000,000 تومان به بالا → 3٪ هدیه\n"
    "• از 3,000,000 تومان به بالا → 5٪ هدیه\n"
    "• از 5,000,000 تومان به بالا → 7٪ هدیه\n"
    "• از 10,000,000 تومان به بالا → 10٪ هدیه"
)

GIFT_CODE_TEXT = (
    "🎁 کد هدیه\n"
    "✅ کد هدیه خود را ارسال کنید تا مبلغ آن به کیف پول شما اضافه شود."
)
GIFT_OK_TEXT = "🎉 تبریک! مبلغ {amount} تومان به کیف پولت اضافه شد."
GIFT_INVALID_TEXT = "❌ این کد هدیه معتبر نیست یا قبلاً استفاده شده."

PAY_HISTORY_EMPTY = "🧾 تاریخچه پرداخت‌ها\n\nهنوز پرداختی ثبت نشده."
PAY_HISTORY_TEXT = "🧾 تاریخچه پرداخت‌ها\n\n{lines}"

DICE_TEXT = (
    "🎲 بخش تاس شانس\n"
    "✔️ یک تاس بیندازید، اگر 4 یا بالاتر بیاید، یک کد تخفیف 10٪ برای همهی محصولات میگیرید.\n"
    "• کد فقط 6 ساعت اعتبار دارد\n"
    "• هر 7 روز یک بار میتوانید بیندازید\n"
    "⚡️ تاس را خود تلگرام میاندازد، نه ربات."
)
DICE_COOLDOWN_TEXT = "⏳ هنوز نمی‌تونی تاس بندازی! دفعهٔ بعد: {when}"
DICE_WIN_TEXT = (
    "🎉 عدد {value} آمد — بردید!\n"
    "• کد تخفیف 10٪ شما: <code>{code}</code>\n"
    "• فقط با همین حساب کار می‌کند\n"
    "• یک‌بار مصرف است\n"
    "• تا 6 ساعت دیگر معتبر است\n"
    "💎 موقع پرداخت روی «کد تخفیف دارم» بزنید."
)
DICE_LOSE_TEXT = "😔 عدد تاست {value} شد و این بار نبردی. 7 روز دیگه دوباره تلاش کن!"

TEST_TEXT = (
    "⚡️ سرویس تست\n"
    "✅ کیفیت و سرعت سرویس را قبل از خرید تست و بررسی کنید!\n"
    "ℹ️ مشخصات تست:\n"
    "🔄 حجم: 1 GB\n"
    "📅 مدت: 1 روز\n"
    "🔥 جهت دریافت تست، همین حللا روی دکمه دریافت کانفیگ تست کلیک کنید 👇"
)
TEST_USED_TEXT = "شما قبلاً سرویس تست رایگان را دریافت کرده‌اید 🌹"
TEST_DELIVERY_TEXT = (
    "⚡️ کانفیگ تست شما با موفقیت ساخته شد.\n"
    "<code>{link}</code>\n"
    "🔄 حجم: 1 GB\n"
    "📅 مدت: 1 روز\n"
    "📌 لینک بالا را کپی کرده و در نرم‌افزار خود وارد کنید. در صورت رضایت از کیفیت، می‌توانید از بخش خرید، سرویس مد نظر خود را تهیه نمایید ❤️"
)

CONFIG_LIST_TEXT = (
    "🛒 خرید کانفیگ\n"
    "یکی از پلن‌های زیر را انتخاب کنید 👇"
)

CONFIG_SUMMARY_TEXT = (
    "✅ مشخصات خرید سرویس شما:\n"
    "• {label}\n"
    "• حجم: {vol} گیگ\n"
    "• مدت: 30 روز\n"
    "• قیمت: {price} تومان\n"
    "• یادداشت: {note}"
)

CONFIG_CUSTOM_VOLUME_TEXT = (
    "🔥 حجم و زمان دلخواه\n"
    "تعیین کنید چقدر حجم و چند روز میخواهید\n"
    "• هر گیگ: 2,000 تومان\n"
    "• هر روز: 0 تومان\n"
    "• حجم: از 20 تا 500 گیگ\n"
    "• مدت: از 30 تا 180 روز\n"
    "✅ مقدار حجم دلخواه خود را ارسال کنید\n"
    "عدد آن را بفرستید — بین 20 و 500."
)
CONFIG_CUSTOM_DAYS_TEXT = (
    "✅ مقدار زمان دلخواه خود را ارسال کنید\n"
    "عدد آن را بفرستید — بین 30 و 180."
)
CONFIG_CUSTOM_SUMMARY_TEXT = (
    "✅ مشخصات سفارش شما:\n"
    "📤 حجم: {vol} گیگ\n"
    "⏱ مدت: {days} روز\n"
    "💵 مبلغ: {amount} تومان"
)

SUPPORT_TEXT = (
    "📞 بخش پشتیبانی و پاسخگویی\n"
    "✅ جهت مطرح کردن سوالات، گزارش مشکلات فنی یا پیگیری سفارش، میتوانید از طریق تیکت پشتیبانی و یا ارسال پیام به صورت مستقیم با پشتیبانی در ارتباط باشید.\n"
    "💡 لطفاً هنگام پیگیری، شماره سفارش خود را ارسال کنید تا روند پاسخگویی تسریع یابد."
)
SUPPORT2_ALERT = "این پشتیبانی در دسترس نیست"
TICKET_TEXT = (
    "🎫 ارسال تیکت\n"
    "✔️ مشکل یا سؤالتان را در یک پیام بنویسید و بفرستید. میتوانید عکس هم بفرستید. پاسخ در همین چت ربات به شما اطلاع داده میشود."
)
TICKET_OK_TEXT = "✅ تیکتت ثبت شد و برای پشتیبانی ارسال شد. منتظر پاسخ باش."

FAQ_TEXT = (
    "❓ تفاوت پنل مستقیم و پنل تانل چیست؟\n"
    "✅ پنل مستقیم در شرایط عادی فیلترینگ، بهترین کیفیت و پایداری را ارائه می‌دهد. اما در زمان اختلالات شدید اینترنت، فیلترینگ گسترده یا شرایط خاص، ممکن است با افت کیفیت و کاهش پایداری مواجه شود.\n"
    "✔️ پنل تانل با اکثر اپراتورها و اینترنت‌ها سازگاری بالایی دارد و حتی در شرایطی که پنل مستقیم روی برخی اینترنت‌ها با مشکل مواجه می‌شود، معمولاً عملکرد پایدارتر و قابل‌اعتمادتری ارائه می‌دهد.\n"
    "❓ آیا می‌توانم نوع پنل خود را تغییر دهم؟\n"
    "🔥 بله، در هر زمان می‌توانید از بخش «پنل های من» نوع پنل خود را تغییر دهید. برای مثال، اگر از پنل تانل استفاده می‌کنید، می‌توانید آن را به پنل مستقیم تغییر دهید و بالعکس.\n"
    "❓ اگر موجودی حساب من تمام شود چه اتفاقی می‌افتد؟\n"
    "‼️ در صورت اتمام موجودی، ربات به‌صورت خودکار تمامی پنل‌های شما را غیرفعال می‌کند. در این حالت دسترسی شما به پنل مسدود شده و تمامی کاربران فعال روی پنل نیز تا زمان شارژ مجدد موجودی، غیرفعال خواهند شد. پس از افزایش موجودی، پنل و کاربران شما مجدداً فعال خواهند شد.\n"
    "❓ آیا امکان بازگشت وجه وجود دارد؟\n"
    "🚩 در صورتی که پنل یا سرویس‌های ارائه‌شده فاقد هرگونه مشکل فنیِ غیرقابل‌رفع باشند، امکان بازگشت وجه وجود ندارد.\n"
    "❓ آیا می‌توانم کانفیگ‌های پنل را در کانال یا گروه منتشر کنم؟\n"
    "🚫 خیر. انتشار (پابلیک کردن) کانفیگ‌های پنل در کانال‌ها، گروه‌ها یا هر فضای عمومی دیگر ممنوع است.\n"
    "❓ در صورت انتشار کانفیگ‌ها چه اتفاقی می‌افتد؟\n"
    "⚠️ در صورت مشاهده، بدون هیچگونه تذکر قبلی پنل شما مسدود، موجودی حساب به 0 تغییر داده شده و دسترسی شما به‌طور کامل قطع خواهد شد. این قانون پیش از این بارها از طریق کانال اطلاع‌رسانی شده است.\n"
    "❓ آیا قبل از اتصال پنل به ربات‌های فروش کانفیگ باید کاری انجام دهم؟\n"
    "👍 بله، پیش از اتصال پنل به ربات‌هایی مانند میرزا، ویزویز و سایر ربات‌های فروش کانفیگ، حتماً از نصب صحیح و عملکرد درست ربات اطمینان حاصل کنید.\n"
    "❓ اگر ربات فروش کانفیگ من باعث ایجاد مشکل در پنل شود چه می‌شود؟\n"
    "❌ اگر به دلیل تنظیمات نادرست از سمت شما یا فروشنده ربات، اختلالی در عملکرد پنل ایجاد شود، ابتدا به شما تذکر داده خواهد شد و در صورت تکرار، پنل شما مسدود می‌شود."
)

TUTORIAL_TEXT = (
    "💡 بخش آموزش نحوه استفاده\n"
    "❌ هنوز چیزی اینجا ثبت نشده است."
)

BOTBUILDER_TEXT = (
    "🤖 ربات مخصوص خودتان\n"
    "می‌توانید ربات فروش خودتان را داشته باشید؛ با نام و برند دلخواه خودتان، و مشتری‌هایی که فقط مال شما هستند.\n"
    "شرایط: ‼️\n"
    "• هزینه‌ی ربات 500,000 تومان در ماه است و همین حالا از کیف پول شما کسر می‌شود.\n"
    "• سرویس‌هایی که از طریق بات خودتون به فروش می‌رسونید، روی بستر پنل ما ارائه میشن.\n"
    "• هزینه پایه هر گیگ 1,500 تومان میباشد که به ازای فروش هر سرویس ( پنل یا کانفیگ ) بسته به حجم سرویسی که میفروشید از موجودی کیف شما در این بات کسر میگردد.\n"
    "• هر دو بخش برایتان فعال است: هم فروش پنل، هم فروش کانفیگ.\n"
    "• شما دسترسی کامل به تمامی بخش های رباتی که برای شما فعال میگردد دارید، تغییر چیدمان دکمه ها ، حذف دکمه ها ، و تقریباً همه قابلیت هایی که ربات اصلی دارد به ربات شما انتقال پیدا میکند.\n"
    "• قابلیت کاستوم سازی همه موارد از جمله متن های ربات و یا مدیریت سرویس مشتریان خودتان برایتان فراهم میباشد.\n"
    "اگر با شرایط بالا موافق هستید، دکمه‌ی تأیید را بزنید. 👌"
)

REFERRAL_TEXT = (
    "🤝 دعوت از دوستان و کسب درآمد\n"
    "✅ شما می‌توانید با دعوت از دوستان خود به استفاده از ربات، درآمد کسب کنید\n"
    "🔥 برای این کار کافیست لینک خود را کپی کنید و با دوستان خود به اشتراک بگذارید.\n"
    "🔗 <code>{link}</code>\n"
    "• زیرمجموعه‌ها: {count}\n"
    "• درآمد شما تا امروز: {earned} تومان\n"
    "• سهم شما از هر خرید: 10٪\n"
    "• هدیه‌ی معرفی هر نفر: —"
)

DISCOUNT_ASK_TEXT = (
    "🛍 کد تخفیف\n"
    "✔️ کد تخفیف خود را بفرستید. اگر کد تخفیف ندارید، «انصراف» را بزنید."
)
DISCOUNT_OK_TEXT = "✅ کد تخفیف اعمال شد! مبلغ جدید: {final} تومان"
DISCOUNT_INVALID_TEXT = "❌ این کد تخفیف معتبر نیست یا منقضی شده."
DISCOUNT_REMOVED_TEXT = "🗑 کد تخفیف حذف شد."

ORDER_PAID_TEXT = "✅ پرداختت تأیید شد و سفارشت فعال شد! 🎉"
ORDER_REJECTED_TEXT = "❌ پرداختت رد شد. اگه مشکلی هست با پشتیبانی در تماس باش."
WALLET_PAID_TEXT = "✅ پرداخت از کیف پول انجام شد و سفارشت فعال شد! 🎉"
NO_BALANCE_TEXT = "❌ موجودی کیف پولت کافی نیست. اول کیف پولت رو شارژ کن."

PANEL_CREATED_TEXT = (
    "✅ پنلت ساخته شد! 🎉\n\n"
    "👤 یوزرنیم: <code>{username}</code>\n"
    "📦 حجم: {volume} گیگ\n\n"
    "🔗 لینک اشتراک پنل:\n<code>{link}</code>"
)

CONFIG_CREATED_TEXT = (
    "✅ کانفیگت آماده شد! 🎉\n\n"
    "📦 حجم: {volume} گیگ\n"
    "⏰ مدت: {days} روز\n\n"
    "🔗 لینک اشتراک:\n<code>{link}</code>"
)

BANNED_TEXT = "⛔️ حساب شما توسط ادمین مسدود شده است."
CANCEL_TEXT = "❌ عملیات لغو شد."
BACK_MAIN_TEXT = "💎 منوی اصلی"


# ---------------------------------------------------------------------------
# Keyboards — row layouts + Bot API styles EXACTLY as observed live.
# success = green, primary = blue, danger = orange/brown.
# ---------------------------------------------------------------------------

def kb_gate():
    """Forced-join gate — ALL buttons primary (blue), no emojis on labels."""
    return kb([
        [btn("کانال اطلاع رسانی 1", url=get_setting("gate_link_1"),
             style=STYLE_PRIMARY)],
        [btn("کانال اطلاع رسانی 2", url=get_setting("gate_link_2"),
             style=STYLE_PRIMARY)],
        [btn("بررسی عضویت", "gate:check", style=STYLE_PRIMARY)],
    ])


def kb_main_panel():
    """Main menu #1 — the panel-builder version shown after /start.
    ALL buttons success (green)."""
    return kb([
        [btn("⚡ خرید پنل", "menu:panel", style=STYLE_SUCCESS)],
        [btn("💻 پنل های من", "menu:mypanels", style=STYLE_SUCCESS),
         btn("💰 کیف پول", "menu:wallet", style=STYLE_SUCCESS)],
        [btn("🎲 تاس شانس", "menu:dice", style=STYLE_SUCCESS)],
        [btn("🛡️ سرویس تست", "menu:test", style=STYLE_SUCCESS),
         btn("👨‍💻 پشتیبانی", "menu:support", style=STYLE_SUCCESS)],
        [btn("بخش خرید کانفیگ", "menu:configs", style=STYLE_SUCCESS)],
        [btn("⁉️ سوالات متداول", "menu:faq", style=STYLE_SUCCESS),
         btn("💡 آموزش استفاده", "menu:tutorial", style=STYLE_SUCCESS)],
        [btn("🤖 بخش ربات ساز", "menu:botbuilder", style=STYLE_SUCCESS)],
    ])


def kb_main_evo():
    """Main menu #2 — the 'Evo' version. ALL buttons success (green).
    «سرویس های من» routes to the same my-panels handler."""
    return kb([
        [btn("⚡ خرید کانفیگ", "menu:configs", style=STYLE_SUCCESS)],
        [btn("💻 سرویس های من", "menu:mypanels", style=STYLE_SUCCESS),
         btn("💰 کیف پول", "menu:wallet", style=STYLE_SUCCESS)],
        [btn("🎲 تاس شانس", "menu:dice", style=STYLE_SUCCESS)],
        [btn("🛡️ سرویس تست", "menu:test", style=STYLE_SUCCESS),
         btn("👨‍💻 پشتیبانی", "menu:support", style=STYLE_SUCCESS)],
        [btn("بخش خرید پنل", "menu:panel", style=STYLE_SUCCESS)],
        [btn("⁉️ سوالات متداول", "menu:faq", style=STYLE_SUCCESS),
         btn("💡 آموزش استفاده", "menu:tutorial", style=STYLE_SUCCESS)],
        [btn("🤝 زیرمجموعه‌گیری", "menu:referral", style=STYLE_SUCCESS)],
    ])


def kb_main_btn(evo=False):
    """Generic user-facing main-menu button: «💎 منوی اصلی», success."""
    return kb([[btn("💎 منوی اصلی",
                    "menu:main_evo" if evo else "menu:main_panel",
                    style=STYLE_SUCCESS)]])


def kb_cancel_btn(target="menu:main_panel", label="‹ انصراف"):
    """Generic user-facing cancel button, success."""
    return kb([[btn(label, target, style=STYLE_SUCCESS)]])


def kb_back(cb="menu:main_panel"):
    """Back/cancel helper. User-facing targets render «‹ انصراف» (success)
    or «💎 منوی اصلی» for main-menu targets; admin targets keep a plain
    primary back button. The invented «↩️ بازگشت» user button is gone."""
    if cb.startswith("admin:"):
        return kb([[btn("↩️ بازگشت", cb, style=STYLE_PRIMARY,
                        emoji_key="back")]])
    if cb in ("menu:main_panel", "menu:main_evo"):
        return kb_main_btn(evo=(cb == "menu:main_evo"))
    return kb_cancel_btn(cb)


def kb_back_main(evo=False):
    return kb_main_btn(evo=evo)


PANEL_TARIFFS = [250, 500, 1000, 3000]


def kb_panel_tariff():
    per_gb = sget_int("panel_price_per_gb", 1500)
    rows = [
        [btn("=-=-= مشخصات سرویس‌های ما =-=-=", "noop",
             style=STYLE_SUCCESS)],
        [btn("📊 حجم", "noop", style=STYLE_PRIMARY),
         btn("💲 قیمت", "noop", style=STYLE_PRIMARY)],
        [btn("➕ حجم دلخواه", "panel:custom", style=STYLE_PRIMARY),
         btn(f"{fmt(per_gb)} تومان", "panel:custom",
             style=STYLE_PRIMARY)],
    ]
    for vol in PANEL_TARIFFS:
        rows.append([
            btn(f"{vol}GB", f"panel:tariff:{vol}", style=STYLE_SUCCESS),
            btn(f"{fmt(vol * per_gb)} تومان", f"panel:tariff:{vol}",
                style=STYLE_SUCCESS),
        ])
    rows.append([btn("💎 منوی اصلی", "menu:main_panel",
                     style=STYLE_SUCCESS)])
    return kb(rows)


def kb_my_panels(panels):
    rows = []
    for p in panels:
        rows.append([btn(
            f"🟢 {p['username']} · {fmt(p['volume_gb'])} گیگ",
            f"panel:view:{p['id']}", style=STYLE_SUCCESS)])
    rows.append([btn("خرید پنل", "menu:panel", style=STYLE_SUCCESS),
                 btn("منوی اصلی", "menu:main_panel", style=STYLE_SUCCESS)])
    return kb(rows)


def kb_my_panels_empty():
    return kb([[btn("خرید پنل", "menu:panel", style=STYLE_SUCCESS),
                btn("منوی اصلی", "menu:main_panel", style=STYLE_SUCCESS)]])


def kb_payment(order_id, balance=0, final_amount=0, has_discount=False):
    """Shared payment screen — layout/styles exactly as observed.
    Insufficient balance swaps the wallet-pay button for a primary
    top-up button showing the shortfall."""
    rows = [
        [btn("کارت به کارت", f"pay:card:{order_id}", style=STYLE_SUCCESS)],
        [btn("ارز دیجیتال", f"pay:crypto:{order_id}", style=STYLE_SUCCESS)],
    ]
    if balance < final_amount:
        shortfall = final_amount - balance
        rows.append([btn(f"شارژ کیف پول (کسری {fmt(shortfall)} تومان)",
                         "wallet:charge", style=STYLE_PRIMARY)])
    else:
        rows.append([btn("پرداخت با کیف پول", f"pay:wallet:{order_id}",
                         style=STYLE_SUCCESS)])
    if has_discount:
        rows.append([btn("حذف کد تخفیف", f"pay:rmdiscount:{order_id}",
                         style=STYLE_DANGER)])
    else:
        rows.append([btn("کد تخفیف دارم", f"pay:discount:{order_id}",
                         style=STYLE_SUCCESS)])
    rows.append([btn("💎 منو اصلی", "menu:main_panel", style=STYLE_SUCCESS)])
    return kb(rows)


def kb_crypto_cancel():
    """Crypto screen carries a single cancel button."""
    return kb([[btn("انصراف", "menu:main_panel", style=STYLE_SUCCESS)]])


def kb_kyc_cancel():
    return kb([[btn("انصراف", "menu:main_panel", style=STYLE_SUCCESS)]])


def kb_discount_cancel():
    return kb([[btn("💎 انصراف", "menu:main_panel", style=STYLE_SUCCESS)]])


def kb_wallet():
    miniapp = (get_setting("miniapp_url", "") or "").strip()
    if miniapp:
        history_btn = btn("🧾 تاریخچه پرداخت‌ها", style=STYLE_PRIMARY,
                          web_app_url=miniapp)
    else:
        history_btn = btn("🧾 تاریخچه پرداخت‌ها", "wallet:history",
                          style=STYLE_PRIMARY)
    return kb([
        [btn("💸 شارژ کیف پول", "wallet:charge", style=STYLE_SUCCESS)],
        [btn("🎁 کد هدیه", "wallet:gift", style=STYLE_PRIMARY),
         history_btn],
        [btn("💎 منوی اصلی", "menu:main_panel", style=STYLE_SUCCESS)],
    ])


def kb_charge_methods():
    """Charge step 1: pick the payment method (all success, own rows)."""
    return kb([
        [btn("کارت به کارت", "charge:method:card", style=STYLE_SUCCESS)],
        [btn("ارز دیجیتال", "charge:method:crypto", style=STYLE_SUCCESS)],
        [btn("‹ انصراف", "menu:wallet", style=STYLE_SUCCESS)],
    ])


def kb_charge_other_method():
    return kb([[btn("‹ روش دیگر", "wallet:charge", style=STYLE_SUCCESS)]])


def bonus_tiers_text():
    lines = []
    raw = get_setting("crypto_bonus_tiers", "")
    for part in raw.split(","):
        if ":" in part:
            mn, pc = part.split(":", 1)
            try:
                lines.append(
                    f"• از {fmt(int(mn))} تومان به بالا → {pc}٪ هدیه")
            except ValueError:
                pass
    return "\n".join(lines)


def crypto_bonus(amount):
    best = 0
    raw = get_setting("crypto_bonus_tiers", "")
    for part in raw.split(","):
        if ":" in part:
            mn, pc = part.split(":", 1)
            try:
                if amount >= int(mn):
                    best = max(best, int(pc))
            except ValueError:
                pass
    return amount * best // 100


CONFIG_PLANS = [  # (volume_gb, days, label, note)
    (30, 30, "۳۰ گیگ — یک ماهه", "مناسب استفادهی روزمره"),
    (60, 30, "۶۰ گیگ — یک ماهه", "برای پرمصرفها"),
    (100, 30, "۱۰۰ گیگ — یک ماهه", "بیشترین صرفه…"),
]


def kb_config_list():
    rows = []
    for vol, days, label, note in CONFIG_PLANS:
        rows.append([btn(label, f"config:plan:{vol}:{days}",
                         style=STYLE_SUCCESS)])
    rows.append([btn("➕ حجم و زمان دلخواه", "config:custom",
                     style=STYLE_PRIMARY)])
    rows.append([btn("💎 منوی اصلی", "menu:main_panel",
                     style=STYLE_SUCCESS)])
    return kb(rows)


def kb_config_summary(vol, days):
    """Summary screen buttons: both success, EXCEPT the 100 GB plan's
    «ادامه و پرداخت» which is primary in the original."""
    pay_style = STYLE_PRIMARY if vol == 100 else STYLE_SUCCESS
    return kb([[
        btn("ادامه و پرداخت", f"config:pay:{vol}:{days}", style=pay_style),
        btn("‹ خرید کانفیگ", "menu:configs", style=STYLE_SUCCESS),
    ]])


def kb_support():
    s1 = get_setting("support_1", "AndyCoffin")
    fin = get_setting("support_fin", "qim7ixo")
    return kb([
        [btn("پشتیبانی فنی 1", url=f"https://t.me/{s1}",
             style=STYLE_PRIMARY)],
        [btn("پشتیبانی فنی 2", "support:two", style=STYLE_PRIMARY)],
        [btn("پشتیبانی مالی", url=f"https://t.me/{fin}",
             style=STYLE_PRIMARY)],
        [btn("ارسال تیکت", "support:ticket", style=STYLE_SUCCESS)],
        [btn("💎 منوی اصلی", "menu:main_panel", style=STYLE_SUCCESS)],
    ])


def kb_faq():
    return kb([
        [btn("سوالم اینجا نبود - ارتباط با پشتیبانی", "menu:support",
             style=STYLE_SUCCESS)],
        [btn("💎 منوی اصلی", "menu:main_panel", style=STYLE_SUCCESS)],
    ])


def kb_test():
    return kb([
        [btn("دریافت کانفیگ تست", "test:get", style=STYLE_PRIMARY)],
        [btn("💎 منوی اصلی", "menu:main_panel", style=STYLE_SUCCESS)],
    ])


def kb_test_delivery():
    """After test delivery the main-menu button leads to the Evo menu."""
    return kb([[
        btn("⚡ خرید پنل", "menu:panel", style=STYLE_SUCCESS),
        btn("💎 منوی اصلی", "menu:main_evo", style=STYLE_SUCCESS),
    ]])


def kb_dice():
    return kb([
        [btn("بنداز!", "dice:roll", style=STYLE_PRIMARY)],
        [btn("💎 منوی اصلی", "menu:main_evo", style=STYLE_SUCCESS)],
    ])


def kb_dice_result():
    return kb([[
        btn("خرید پنل", "menu:panel", style=STYLE_SUCCESS),
        btn("منوی اصلی", "menu:main_evo", style=STYLE_SUCCESS),
    ]])


def kb_botbuilder():
    return kb([[
        btn("✅ تأیید و ادامه", "botbuilder:order", style=STYLE_PRIMARY),
        btn("انصراف", "menu:main_panel", style=STYLE_SUCCESS),
    ]])


def kb_referral(bot_username, uid):
    link = f"https://t.me/{bot_username}?start=ref_{uid}"
    share = f"https://t.me/share/url?url={link}"
    return kb([[
        btn("ارسال لینک برای دوستان", url=share, style=STYLE_SUCCESS),
        btn("منوی اصلی", "menu:main_evo", style=STYLE_SUCCESS),
    ]]), link


# ---------------------------------------------------------------------------
# FSM states
# ---------------------------------------------------------------------------

class St(StatesGroup):
    panel_custom_volume = State()
    panel_username = State()
    config_custom_volume = State()
    config_custom_days = State()
    charge_amount = State()
    gift_code = State()
    discount_code = State()
    kyc_photo = State()
    receipt_photo = State()
    crypto_photo = State()
    ticket_text = State()
    admin_setting = State()
    admin_code = State()
    admin_broadcast = State()
    admin_user_id = State()
    admin_adjust = State()
    admin_reply = State()


router = Router()

# ---------------------------------------------------------------------------
# Gate + access helpers
# ---------------------------------------------------------------------------

def gate_channel_ids():
    raw = get_setting("gate_channels", "")
    out = []
    for part in raw.replace(";", ",").split(","):
        part = part.strip()
        if part.lstrip("-").isdigit():
            out.append(int(part))
    return out


async def check_gate(bot, uid) -> bool:
    """True when the user may use the bot (member of every gate channel,
    admin, or gate off). On API errors: strict -> blocked, else allowed."""
    if uid in ADMIN_IDS:
        return True
    if get_setting("gate_enabled", "1") != "1":
        return True
    strict = get_setting("gate_strict", "0") == "1"
    for chat_id in gate_channel_ids():
        try:
            member = await bot.get_chat_member(chat_id, uid)
            if member.status in ("left", "kicked"):
                return False
        except Exception:
            if strict:
                return False
    return True


async def guard(message_or_cb) -> bool:
    """Ban/gate guard for handlers. Returns True when access is allowed."""
    user = message_or_cb.from_user
    bot = message_or_cb.bot
    row = ensure_user(user)
    if row["banned"]:
        if isinstance(message_or_cb, CallbackQuery):
            await message_or_cb.answer(BANNED_TEXT, show_alert=True)
        else:
            await message_or_cb.answer(BANNED_TEXT)
        return False
    if not await check_gate(bot, user.id):
        text = GATE_TEXT
        if isinstance(message_or_cb, CallbackQuery):
            await message_or_cb.answer("اول باید عضو کانال‌ها بشی!", show_alert=True)
            await message_or_cb.message.answer(text, reply_markup=kb_gate())
        else:
            await message_or_cb.answer(text, reply_markup=kb_gate())
        return False
    return True


async def edit_or_answer(cb: CallbackQuery, text, markup=None, **kw):
    try:
        await cb.message.edit_text(text, reply_markup=markup, **kw)
    except TelegramBadRequest:
        await cb.message.answer(text, reply_markup=markup, **kw)


def create_order(uid, kind, amount, meta=""):
    with closing(db()) as conn:
        cur = conn.execute(
            "INSERT INTO orders(user_id,kind,amount,final_amount,meta,created_at)"
            " VALUES(?,?,?,?,?,?)", (uid, kind, amount, amount, meta, now_ts()))
        conn.commit()
        return cur.lastrowid


def get_order(order_id):
    with closing(db()) as conn:
        return conn.execute(
            "SELECT * FROM orders WHERE id=?", (order_id,)).fetchone()


def set_order(order_id, **fields):
    if not fields:
        return
    cols = ", ".join(f"{k}=?" for k in fields)
    with closing(db()) as conn:
        conn.execute(f"UPDATE orders SET {cols} WHERE id=?",
                     (*fields.values(), order_id))
        conn.commit()


def order_title(order) -> str:
    kind = order["kind"]
    meta = order["meta"] or ""
    if kind == "panel":
        vol, _, uname = meta.partition(":")
        return f"ساخت پنل {vol} گیگ (یوزرنیم: {uname})"
    if kind == "config":
        vol, _, days = meta.partition(":")
        return f"کانفیگ {vol} گیگ — {days} روز"
    if kind == "charge":
        return "شارژ کیف پول"
    if kind == "botbuilder":
        return "ساخت ربات (یک ماه)"
    return kind


def crypto_text(amount) -> str:
    """The ONE crypto screen of the original: all three wallet addresses
    on a single screen; the user replies with a transaction screenshot."""
    return CRYPTO_TEXT.format(
        amount=fmt(amount), trx=get_setting("crypto_trx"),
        usdt=get_setting("crypto_usdt_bep20"),
        ton=get_setting("crypto_ton"))


def panel_username_text(vol):
    per_gb = sget_int("panel_price_per_gb", 1500)
    return PANEL_USERNAME_TEXT.format(vol=vol, price=fmt(vol * per_gb))


async def show_payment(bot, chat_id, order_id, edit_cb=None):
    order = get_order(order_id)
    user = get_user(order["user_id"])
    balance = user["balance"] if user else 0
    has_disc = bool(order["discount_code"])
    text = PAYMENT_TEXT.format(
        final=fmt(order["final_amount"]), balance=fmt(balance))
    if has_disc:
        percent = 0
        with closing(db()) as conn:
            crow = conn.execute("SELECT * FROM codes WHERE code=?",
                                (order["discount_code"],)).fetchone()
        if crow is not None:
            percent = crow["percent"]
        text += PAYMENT_DISCOUNT_SUFFIX.format(
            code=order["discount_code"], percent=percent,
            amount=fmt(order["amount"]), final=fmt(order["final_amount"]))
    markup = kb_payment(order_id, balance=balance,
                        final_amount=order["final_amount"],
                        has_discount=has_disc)
    if edit_cb is not None:
        await edit_or_answer(edit_cb, text, markup)
    else:
        await bot.send_message(chat_id, text, reply_markup=markup)


async def deliver_order(bot, order):
    """Called after an order is paid (wallet instantly, card/crypto after
    admin approval). Provisions via the TODO stubs + referral payout."""
    uid = order["user_id"]
    kind = order["kind"]
    meta = order["meta"] or ""
    if kind == "panel":
        vol_s, _, uname = meta.partition(":")
        vol = int(vol_s or 0)
        link = create_panel_stub(uname, vol)
        with closing(db()) as conn:
            conn.execute(
                "INSERT INTO panels(user_id,username,volume_gb,price,sub_link,created_at)"
                " VALUES(?,?,?,?,?,?)",
                (uid, uname, vol, order["final_amount"], link, now_ts()))
            conn.commit()
        await bot.send_message(uid, PANEL_CREATED_TEXT.format(
            username=uname, volume=fmt(vol), link=link))
    elif kind == "config":
        vol_s, _, days_s = meta.partition(":")
        vol, days = int(vol_s or 0), int(days_s or 30)
        link = create_config_stub(uid, vol, days)
        with closing(db()) as conn:
            conn.execute(
                "INSERT INTO configs(user_id,name,volume_gb,days,price,sub_link,created_at)"
                " VALUES(?,?,?,?,?,?,?)",
                (uid, f"cfg-{uid}-{order['id']}", vol, days,
                 order["final_amount"], link, now_ts()))
            conn.commit()
        await bot.send_message(uid, CONFIG_CREATED_TEXT.format(
            volume=fmt(vol), days=days, link=link))
    elif kind == "charge":
        bonus = 0
        if order["method"] == "crypto":
            bonus = crypto_bonus(order["final_amount"])
        total = order["final_amount"] + bonus
        add_balance(uid, total, f"شارژ کیف پول (سفارش #{order['id']})")
        msg = f"✅ کیف پولت به مبلغ {fmt(total)} تومان شارژ شد!"
        if bonus:
            msg += f"\n🎁 بونوس ارز دیجیتال: {fmt(bonus)} تومان"
        await bot.send_message(uid, msg)
    elif kind == "botbuilder":
        await bot.send_message(
            uid, "🤖 سفارش ساخت رباتت ثبت شد! پشتیبانی به‌زودی برای راه‌اندازی باهات در تماسه.")
    # referral payout: percent of the paid amount to the referrer
    user = get_user(uid)
    if user and user["ref_by"] and kind in ("panel", "config", "botbuilder"):
        pct = sget_int("ref_percent", 10)
        reward = order["final_amount"] * pct // 100
        if reward > 0:
            add_balance(user["ref_by"], reward,
                        f"پاداش زیرمجموعه‌گیری از کاربر {uid}")
            try:
                await bot.send_message(
                    user["ref_by"],
                    f"💰 مبلغ {fmt(reward)} تومان پاداش زیرمجموعه‌گیری به کیف پولت اضافه شد!")
            except Exception:
                pass


# ---------------------------------------------------------------------------
# /start, /cancel, gate check
# ---------------------------------------------------------------------------

@router.message(CommandStart())
async def cmd_start(message: Message, state: FSMContext):
    await state.clear()  # waiting-state rule: /start always resets
    ref_by = None
    parts = (message.text or "").split(maxsplit=1)
    if len(parts) > 1 and parts[1].startswith("ref_"):
        try:
            ref_by = int(parts[1][4:])
        except ValueError:
            ref_by = None
        if ref_by == message.from_user.id:
            ref_by = None
    ensure_user(message.from_user, ref_by=ref_by)
    if not await guard(message):
        return
    await message.answer(WELCOME_PANEL, reply_markup=kb_main_panel())


@router.message(Command("cancel"))
async def cmd_cancel(message: Message, state: FSMContext):
    await state.clear()  # waiting-state rule: /cancel always exits
    await message.answer(CANCEL_TEXT, reply_markup=kb_main_panel())


@router.callback_query(F.data == "gate:check")
async def cb_gate_check(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if await check_gate(cb.bot, cb.from_user.id):
        await cb.answer("✅ عضویت تأیید شد")
        await edit_or_answer(cb, WELCOME_PANEL, kb_main_panel())
    else:
        await cb.answer("❌ هنوز عضو همهٔ کانال‌ها نشدی!", show_alert=True)


# ---------------------------------------------------------------------------
# Main menus
# ---------------------------------------------------------------------------

@router.callback_query(F.data == "noop")
async def cb_noop(cb: CallbackQuery, state: FSMContext):
    """Header/label buttons on the tariff screen — they only look tappable."""
    await cb.answer()


@router.callback_query(F.data == "menu:main_panel")
async def cb_main_panel(cb: CallbackQuery, state: FSMContext):
    await state.clear()  # any new button press clears the waiting state
    if not await guard(cb):
        return
    await edit_or_answer(cb, WELCOME_PANEL, kb_main_panel())
    await cb.answer()


@router.callback_query(F.data == "menu:main_evo")
async def cb_main_evo(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, WELCOME_EVO, kb_main_evo())
    await cb.answer()


@router.message(Command("panel"))
async def cmd_panel(message: Message, state: FSMContext):
    await state.clear()
    if not await guard(message):
        return
    await message.answer(PANEL_TARIFF_TEXT, reply_markup=kb_panel_tariff())


@router.message(Command("wallet"))
async def cmd_wallet(message: Message, state: FSMContext):
    await state.clear()
    if not await guard(message):
        return
    user = get_user(message.from_user.id)
    await message.answer(WALLET_TEXT.format(balance=fmt(user["balance"])),
                         reply_markup=kb_wallet())


@router.message(Command("config"))
async def cmd_config(message: Message, state: FSMContext):
    await state.clear()
    if not await guard(message):
        return
    await message.answer(CONFIG_LIST_TEXT, reply_markup=kb_config_list())


@router.message(Command("test"))
async def cmd_test(message: Message, state: FSMContext):
    await state.clear()
    if not await guard(message):
        return
    await message.answer(TEST_TEXT, reply_markup=kb_test())


# ---------------------------------------------------------------------------
# Panel builder
# ---------------------------------------------------------------------------

async def _panel_start(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, PANEL_TARIFF_TEXT, kb_panel_tariff())
    await cb.answer()


@router.callback_query(F.data == "menu:panel")
async def cb_menu_panel(cb: CallbackQuery, state: FSMContext):
    await _panel_start(cb, state)


@router.callback_query(F.data.startswith("panel:tariff:"))
async def cb_panel_tariff(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    vol = int(cb.data.rsplit(":", 1)[1])
    await state.set_state(St.panel_username)
    await state.update_data(panel_volume=vol)
    await edit_or_answer(cb, panel_username_text(vol), kb_back("menu:panel"))
    await cb.answer()


@router.callback_query(F.data == "panel:custom")
async def cb_panel_custom(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await state.set_state(St.panel_custom_volume)
    await edit_or_answer(cb, PANEL_CUSTOM_VOLUME_TEXT, kb_back("menu:panel"))
    await cb.answer()


@router.message(StateFilter(St.panel_custom_volume), F.text)
async def msg_panel_custom_volume(message: Message, state: FSMContext):
    txt = (message.text or "").strip()
    if not txt.isdigit() or not (250 <= int(txt) <= 10000):
        await message.answer("❌ حجم باید عددی بین 250 تا 10,000 گیگ باشه. دوباره بفرست:")
        return
    await state.update_data(panel_volume=int(txt))
    await state.set_state(St.panel_username)
    await message.answer(panel_username_text(int(txt)), reply_markup=kb_back("menu:panel"))


@router.message(StateFilter(St.panel_username), F.text)
async def msg_panel_username(message: Message, state: FSMContext):
    uname = (message.text or "").strip()
    allowed = set("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_")
    if not (3 <= len(uname) <= 32) or any(c not in allowed for c in uname):
        await message.answer("❌ نام کاربری باید بین ۳ تا ۳۲ کاراکتر و فقط شامل حروف انگلیسی، اعداد و آندرلاین ( _ ) باشد. دوباره بفرست:")
        return
    data = await state.get_data()
    vol = int(data.get("panel_volume", 0))
    await state.clear()
    per_gb = sget_int("panel_price_per_gb", 1500)
    order_id = create_order(message.from_user.id, "panel",
                            vol * per_gb, meta=f"{vol}:{uname}")
    await show_payment(message.bot, message.chat.id, order_id)


# ---------------------------------------------------------------------------
# My panels
# ---------------------------------------------------------------------------

@router.callback_query(F.data == "menu:mypanels")
async def cb_my_panels(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    with closing(db()) as conn:
        panels = conn.execute(
            "SELECT * FROM panels WHERE user_id=? ORDER BY id DESC",
            (cb.from_user.id,)).fetchall()
    if not panels:
        await edit_or_answer(cb, MY_PANELS_EMPTY, kb_my_panels_empty())
    else:
        await edit_or_answer(cb, MY_PANELS_TEXT, kb_my_panels(panels))
    await cb.answer()


@router.callback_query(F.data.startswith("panel:view:"))
async def cb_panel_view(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    pid = int(cb.data.rsplit(":", 1)[1])
    with closing(db()) as conn:
        p = conn.execute("SELECT * FROM panels WHERE id=? AND user_id=?",
                         (pid, cb.from_user.id)).fetchone()
    if p is None:
        await cb.answer("پنل پیدا نشد.", show_alert=True)
        return
    text = (f"🖥 پنل {p['username']}\n\n"
            f"📦 حجم: {fmt(p['volume_gb'])} گیگ\n"
            f"💰 قیمت خرید: {fmt(p['price'])} تومان\n"
            f"🔗 لینک اشتراک:\n<code>{p['sub_link']}</code>")
    await edit_or_answer(cb, text, kb_back("menu:mypanels"))
    await cb.answer()


# ---------------------------------------------------------------------------
# Shared payment screen actions
# ---------------------------------------------------------------------------

@router.callback_query(F.data.startswith("pay:back:"))
async def cb_pay_back(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    await show_payment(cb.bot, cb.message.chat.id, order_id, edit_cb=cb)
    await cb.answer()


@router.callback_query(F.data.startswith("pay:discount:"))
async def cb_pay_discount(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    await state.set_state(St.discount_code)
    await state.update_data(order_id=order_id)
    await cb.message.answer(DISCOUNT_ASK_TEXT, reply_markup=kb_discount_cancel())
    await cb.answer()


@router.message(StateFilter(St.discount_code), F.text)
async def msg_discount_code(message: Message, state: FSMContext):
    data = await state.get_data()
    order_id = data.get("order_id")
    code = (message.text or "").strip().upper()
    with closing(db()) as conn:
        row = conn.execute("SELECT * FROM codes WHERE code=?", (code,)).fetchone()
    valid = (
        row is not None
        and row["kind"] in ("discount", "dice")
        and not row["used_by"]
        and (not row["expires_at"] or row["expires_at"] > now_ts())
        and row["percent"] > 0
    )
    await state.clear()
    if not valid or not order_id:
        await message.answer(DISCOUNT_INVALID_TEXT)
        return
    order = get_order(order_id)
    final = order["amount"] * (100 - row["percent"]) // 100
    set_order(order_id, discount_code=code, final_amount=final)
    with closing(db()) as conn:
        conn.execute("UPDATE codes SET used_by=?, used_at=? WHERE code=?",
                     (message.from_user.id, now_ts(), code))
        conn.commit()
    await message.answer(DISCOUNT_OK_TEXT.format(final=fmt(final)))
    await show_payment(message.bot, message.chat.id, order_id)


@router.callback_query(F.data.startswith("pay:rmdiscount:"))
async def cb_pay_rmdiscount(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    order = get_order(order_id)
    if order and order["discount_code"]:
        with closing(db()) as conn:
            conn.execute(
                "UPDATE codes SET used_by=NULL, used_at=0 WHERE code=?",
                (order["discount_code"],))
            conn.commit()
        set_order(order_id, discount_code=None, final_amount=order["amount"])
    await cb.answer(DISCOUNT_REMOVED_TEXT)
    await show_payment(cb.bot, cb.message.chat.id, order_id, edit_cb=cb)


@router.callback_query(F.data.startswith("pay:wallet:"))
async def cb_pay_wallet(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    order = get_order(order_id)
    user = get_user(cb.from_user.id)
    if not order or order["status"] == "paid":
        await cb.answer("این فاکتور قبلاً پرداخت شده.", show_alert=True)
        return
    if user["balance"] < order["final_amount"]:
        await cb.answer(NO_BALANCE_TEXT, show_alert=True)
        return
    add_balance(cb.from_user.id, -order["final_amount"],
                f"پرداخت سفارش #{order_id}")
    set_order(order_id, status="paid", method="wallet", paid_at=now_ts())
    await cb.answer("✅ پرداخت انجام شد")
    await edit_or_answer(cb, WALLET_PAID_TEXT, kb_main_btn())
    await deliver_order(cb.bot, get_order(order_id))


@router.callback_query(F.data.startswith("pay:card:"))
async def cb_pay_card(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    user = get_user(cb.from_user.id)
    # Card-to-card KYC gate (verbatim screen from the original)
    if user["kyc_status"] != "approved":
        if user["kyc_status"] == "pending":
            await cb.answer("⏳ احراز هویتت در حال بررسیه؛ منتظر تأیید ادمین باش.",
                            show_alert=True)
            return
        await state.set_state(St.kyc_photo)
        await state.update_data(kyc_next_order=order_id)
        await edit_or_answer(cb, KYC_GATE_TEXT, kb_kyc_cancel())
        await cb.answer()
        return
    order = get_order(order_id)
    set_order(order_id, method="card")
    await state.set_state(St.receipt_photo)
    await state.update_data(order_id=order_id)
    await edit_or_answer(cb, CARD_PAY_TEXT.format(
        amount=fmt(order["final_amount"]),
        card=get_setting("card_number"), holder=get_setting("card_holder")),
        kb_main_btn())
    await cb.answer()


@router.message(StateFilter(St.kyc_photo), F.photo)
async def msg_kyc_photo(message: Message, state: FSMContext):
    """KYC in the original is a SINGLE photo (card photo + handwritten
    note in one picture) — there is no separate card-number step."""
    photo_id = message.photo[-1].file_id
    await state.clear()
    with closing(db()) as conn:
        cur = conn.execute(
            "INSERT INTO kyc(user_id,card_number,photo_file,created_at)"
            " VALUES(?,?,?,?)",
            (message.from_user.id, "", photo_id, now_ts()))
        conn.commit()
        kyc_id = cur.lastrowid
    with closing(db()) as conn:
        conn.execute("UPDATE users SET kyc_status='pending' WHERE id=?",
                     (message.from_user.id,))
        conn.commit()
    await message.answer(KYC_DONE_TEXT)
    for admin in ADMIN_IDS:
        try:
            await message.bot.send_photo(
                admin, photo_id,
                caption=(f"🪪 احراز هویت جدید #{kyc_id}\n"
                         f"👤 کاربر: {message.from_user.id}"),
                reply_markup=kb([
                    [btn("✅ تأیید", f"admin:kyc_ok:{kyc_id}",
                         style=STYLE_SUCCESS),
                     btn("❌ رد", f"admin:kyc_no:{kyc_id}",
                         style=STYLE_DANGER)],
                ]))
        except Exception:
            pass


@router.message(StateFilter(St.receipt_photo), F.photo)
async def msg_receipt_photo(message: Message, state: FSMContext):
    data = await state.get_data()
    order_id = data.get("order_id")
    await state.clear()
    set_order(order_id, status="pending_review", method="card",
              receipt_file=message.photo[-1].file_id)
    await message.answer(RECEIPT_OK_TEXT)
    order = get_order(order_id)
    for admin in ADMIN_IDS:
        try:
            await message.bot.send_photo(
                admin, message.photo[-1].file_id,
                caption=(f"🧾 رسید کارت به کارت — سفارش #{order_id}\n"
                         f"👤 کاربر: {message.from_user.id}\n"
                         f"📦 {order_title(order)}\n"
                         f"💰 مبلغ: {fmt(order['final_amount'])} تومان"),
                reply_markup=kb([
                    [btn("✅ تأیید پرداخت", f"admin:pay_ok:{order_id}",
                         style=STYLE_SUCCESS),
                     btn("❌ رد پرداخت", f"admin:pay_no:{order_id}",
                         style=STYLE_DANGER)],
                ]))
        except Exception:
            pass


@router.callback_query(F.data.startswith("pay:crypto:"))
async def cb_pay_crypto(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    order = get_order(order_id)
    set_order(order_id, method="crypto")
    await state.set_state(St.crypto_photo)
    await state.update_data(order_id=order_id)
    await edit_or_answer(cb, crypto_text(order["final_amount"]),
                         kb_crypto_cancel())
    await cb.answer()


@router.message(StateFilter(St.crypto_photo), F.photo)
async def msg_crypto_photo(message: Message, state: FSMContext):
    """Crypto payment = ONE transaction screenshot -> pending -> admin
    approve/reject. Approval delivers the order: product orders are
    provisioned directly; wallet charges are credited (+ crypto bonus)."""
    data = await state.get_data()
    order_id = data.get("order_id")
    await state.clear()
    if not order_id:
        return
    set_order(order_id, status="pending_review", method="crypto",
              receipt_file=message.photo[-1].file_id)
    await message.answer(CRYPTO_OK_TEXT)
    order = get_order(order_id)
    for admin in ADMIN_IDS:
        try:
            await message.bot.send_photo(
                admin, message.photo[-1].file_id,
                caption=(f"🪙 پرداخت ارز دیجیتال — سفارش #{order_id}\n"
                         f"👤 کاربر: {message.from_user.id}\n"
                         f"📦 {order_title(order)}\n"
                         f"💰 مبلغ: {fmt(order['final_amount'])} تومان"),
                reply_markup=kb([
                    [btn("✅ تأیید پرداخت", f"admin:pay_ok:{order_id}",
                         style=STYLE_SUCCESS),
                     btn("❌ رد پرداخت", f"admin:pay_no:{order_id}",
                         style=STYLE_DANGER)],
                ]))
        except Exception:
            pass


# ---------------------------------------------------------------------------
# Wallet
# ---------------------------------------------------------------------------

async def _wallet_show(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    user = get_user(cb.from_user.id)
    await edit_or_answer(cb, WALLET_TEXT.format(balance=fmt(user["balance"])),
                         kb_wallet())
    await cb.answer()


@router.callback_query(F.data == "menu:wallet")
async def cb_menu_wallet(cb: CallbackQuery, state: FSMContext):
    await _wallet_show(cb, state)


@router.callback_query(F.data == "wallet:charge")
async def cb_wallet_charge(cb: CallbackQuery, state: FSMContext):
    """Charge step 1 (original order): choose the payment method first."""
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, CHARGE_METHOD_TEXT, kb_charge_methods())
    await cb.answer()


@router.callback_query(F.data.startswith("charge:method:"))
async def cb_charge_method(cb: CallbackQuery, state: FSMContext):
    """Charge step 2: amount prompt for the chosen method."""
    await state.clear()
    if not await guard(cb):
        return
    method = cb.data.rsplit(":", 1)[1]
    await state.set_state(St.charge_amount)
    await state.update_data(charge_method=method)
    min_charge = sget_int("min_charge", 100000)
    if method == "crypto":
        text = CHARGE_AMOUNT_CRYPTO_TEXT.format(min_charge=fmt(min_charge))
    else:
        text = CHARGE_AMOUNT_CARD_TEXT.format(min_charge=fmt(min_charge))
    await edit_or_answer(cb, text, kb_charge_other_method())
    await cb.answer()


@router.message(StateFilter(St.charge_amount), F.text)
async def msg_charge_amount(message: Message, state: FSMContext):
    txt = (message.text or "").strip().replace(",", "")
    min_charge = sget_int("min_charge", 100000)
    if not txt.isdigit() or int(txt) < min_charge:
        await message.answer(
            f"❌ مبلغ شارژ باید حداقل {fmt(min_charge)} تومان باشه. دوباره بفرست:")
        return
    amount = int(txt)
    data = await state.get_data()
    method = data.get("charge_method", "card")
    await state.clear()
    order_id = create_order(message.from_user.id, "charge", amount)
    if method == "crypto":
        set_order(order_id, method="crypto")
        await state.set_state(St.crypto_photo)
        await state.update_data(order_id=order_id)
        await message.answer(crypto_text(amount),
                             reply_markup=kb_crypto_cancel())
        return
    # card-to-card charges pass the KYC gate first when not approved
    user = get_user(message.from_user.id)
    if user["kyc_status"] != "approved":
        if user["kyc_status"] == "pending":
            await message.answer("⏳ احراز هویتت در حال بررسیه؛ منتظر تأیید ادمین باش.")
            return
        await state.set_state(St.kyc_photo)
        await state.update_data(kyc_next_order=None)
        await message.answer(KYC_GATE_TEXT, reply_markup=kb_kyc_cancel())
        return
    set_order(order_id, method="card")
    await state.set_state(St.receipt_photo)
    await state.update_data(order_id=order_id)
    await message.answer(CARD_PAY_TEXT.format(
        amount=fmt(amount), card=get_setting("card_number"),
        holder=get_setting("card_holder")), reply_markup=kb_main_btn())


@router.callback_query(F.data == "wallet:gift")
async def cb_wallet_gift(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await state.set_state(St.gift_code)
    await cb.message.answer(GIFT_CODE_TEXT, reply_markup=kb_cancel_btn("menu:wallet"))
    await cb.answer()


@router.message(StateFilter(St.gift_code), F.text)
async def msg_gift_code(message: Message, state: FSMContext):
    code = (message.text or "").strip().upper()
    await state.clear()
    with closing(db()) as conn:
        row = conn.execute("SELECT * FROM codes WHERE code=?", (code,)).fetchone()
        ok = (row is not None and row["kind"] == "gift" and not row["used_by"]
              and (not row["expires_at"] or row["expires_at"] > now_ts()))
        if ok:
            conn.execute("UPDATE codes SET used_by=?, used_at=? WHERE code=?",
                         (message.from_user.id, now_ts(), code))
            conn.commit()
    if not ok:
        # NOTE: the original stays silent on an invalid gift code; the
        # replica answers with an explicit error instead (see REPORT.md).
        await message.answer(GIFT_INVALID_TEXT)
        return
    add_balance(message.from_user.id, row["amount"], f"کد هدیه {code}")
    await message.answer(GIFT_OK_TEXT.format(amount=fmt(row["amount"])))


@router.callback_query(F.data == "wallet:history")
async def cb_wallet_history(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    with closing(db()) as conn:
        rows = conn.execute(
            "SELECT * FROM orders WHERE user_id=? AND status='paid'"
            " ORDER BY id DESC LIMIT 15", (cb.from_user.id,)).fetchall()
        txs = conn.execute(
            "SELECT * FROM wallet_tx WHERE user_id=? ORDER BY id DESC LIMIT 15",
            (cb.from_user.id,)).fetchall()
    if not rows and not txs:
        await edit_or_answer(cb, PAY_HISTORY_EMPTY, kb_back("menu:wallet"))
        await cb.answer()
        return
    lines = []
    for o in rows:
        dt = datetime.fromtimestamp(
            o["paid_at"] or o["created_at"], tz=timezone.utc).strftime("%Y/%m/%d")
        lines.append(f"▫️ #{o['id']} — {order_title(o)} — {fmt(o['final_amount'])} تومان — {dt}")
    for t in txs:
        sign = "+" if t["amount"] >= 0 else ""
        lines.append(f"▫️ کیف پول {sign}{fmt(t['amount'])} — {t['descr']}")
    await edit_or_answer(cb, PAY_HISTORY_TEXT.format(lines="\n".join(lines)),
                         kb_back("menu:wallet"))
    await cb.answer()


# ---------------------------------------------------------------------------
# Lucky dice
# ---------------------------------------------------------------------------

@router.callback_query(F.data == "menu:dice")
async def cb_menu_dice(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, DICE_TEXT, kb_dice())
    await cb.answer()


@router.callback_query(F.data == "dice:roll")
async def cb_dice_roll(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    user = get_user(cb.from_user.id)
    cooldown = sget_int("dice_cooldown_days", 7) * 86400
    last = user["last_dice_at"] or 0
    if last + cooldown > now_ts():
        when = datetime.fromtimestamp(
            last + cooldown, tz=timezone.utc).strftime("%Y/%m/%d %H:%M")
        await cb.answer(DICE_COOLDOWN_TEXT.format(when=when), show_alert=True)
        return
    with closing(db()) as conn:
        conn.execute("UPDATE users SET last_dice_at=? WHERE id=?",
                     (now_ts(), cb.from_user.id))
        conn.commit()
    await cb.answer()
    dice_msg = await cb.bot.send_dice(cb.message.chat.id, emoji="🎲")
    value = dice_msg.dice.value
    await asyncio.sleep(3)
    win_pct = sget_int("dice_win_percent", 10)
    if value >= 4:
        code = gen_code("DICE", 5)
        valid_h = sget_int("dice_code_valid_hours", 6)
        with closing(db()) as conn:
            conn.execute(
                "INSERT INTO codes(code,kind,percent,expires_at,created_by,created_at)"
                " VALUES(?,?,?,?,?,?)",
                (code, "dice", win_pct, now_ts() + valid_h * 3600,
                 cb.from_user.id, now_ts()))
            conn.commit()
        await cb.message.answer(DICE_WIN_TEXT.format(value=value, code=code),
                                reply_markup=kb_dice_result())
    else:
        await cb.message.answer(DICE_LOSE_TEXT.format(value=value),
                                reply_markup=kb_dice_result())


# ---------------------------------------------------------------------------
# Free test service
# ---------------------------------------------------------------------------

@router.callback_query(F.data == "menu:test")
async def cb_menu_test(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, TEST_TEXT, kb_test())
    await cb.answer()


@router.callback_query(F.data == "test:get")
async def cb_test_get(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    user = get_user(cb.from_user.id)
    if user["test_used"]:
        await cb.answer(TEST_USED_TEXT, show_alert=True)
        return
    with closing(db()) as conn:
        conn.execute("UPDATE users SET test_used=1 WHERE id=?",
                     (cb.from_user.id,))
        conn.commit()
    link = create_config_stub(cb.from_user.id, 1, 1)
    with closing(db()) as conn:
        conn.execute(
            "INSERT INTO configs(user_id,name,volume_gb,days,price,sub_link,created_at)"
            " VALUES(?,?,?,?,?,?,?)",
            (cb.from_user.id, f"test-{cb.from_user.id}", 1, 1, 0, link, now_ts()))
        conn.commit()
    await cb.answer("✅ سرویس تست ساخته شد")
    try:
        qr = make_qr_png(link)
        await cb.message.answer_photo(
            BufferedInputFile(qr, filename="test-qr.png"),
            caption=TEST_DELIVERY_TEXT.format(link=link),
            reply_markup=kb_test_delivery())
    except Exception:
        await cb.message.answer(TEST_DELIVERY_TEXT.format(link=link),
                                reply_markup=kb_test_delivery())


# ---------------------------------------------------------------------------
# Config shop
# ---------------------------------------------------------------------------

@router.callback_query(F.data == "menu:configs")
async def cb_menu_configs(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, CONFIG_LIST_TEXT, kb_config_list())
    await cb.answer()


@router.callback_query(F.data.startswith("config:plan:"))
async def cb_config_plan(cb: CallbackQuery, state: FSMContext):
    """Fixed plans first show the summary screen (original flow);
    «ادامه و پرداخت» on that screen creates the order."""
    await state.clear()
    if not await guard(cb):
        return
    _, _, vol_s, days_s = cb.data.split(":")
    vol, days = int(vol_s), int(days_s)
    plan = next((p for p in CONFIG_PLANS if p[0] == vol), None)
    label = plan[2] if plan else f"{vol} گیگ"
    note = plan[3] if plan else ""
    per_gb = sget_int("config_price_per_gb", 2000)
    text = CONFIG_SUMMARY_TEXT.format(
        label=label, vol=vol, price=fmt(vol * per_gb), note=note)
    await edit_or_answer(cb, text, kb_config_summary(vol, days))
    await cb.answer()


@router.callback_query(F.data.startswith("config:pay:"))
async def cb_config_pay(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    _, _, vol, days = cb.data.split(":")
    per_gb = sget_int("config_price_per_gb", 2000)
    order_id = create_order(cb.from_user.id, "config",
                            int(vol) * per_gb, meta=f"{vol}:{days}")
    await cb.answer()
    await show_payment(cb.bot, cb.message.chat.id, order_id)


@router.callback_query(F.data == "config:custom")
async def cb_config_custom(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await state.set_state(St.config_custom_volume)
    await edit_or_answer(cb, CONFIG_CUSTOM_VOLUME_TEXT,
                         kb_back("menu:configs"))
    await cb.answer()


@router.message(StateFilter(St.config_custom_volume), F.text)
async def msg_config_volume(message: Message, state: FSMContext):
    txt = (message.text or "").strip()
    if not txt.isdigit() or not (20 <= int(txt) <= 500):
        await message.answer("❌ حجم باید عددی بین 20 تا 500 گیگ باشه. دوباره بفرست:")
        return
    await state.update_data(config_volume=int(txt))
    await state.set_state(St.config_custom_days)
    await message.answer(CONFIG_CUSTOM_DAYS_TEXT,
                         reply_markup=kb_back("menu:configs"))


@router.message(StateFilter(St.config_custom_days), F.text)
async def msg_config_days(message: Message, state: FSMContext):
    txt = (message.text or "").strip()
    if not txt.isdigit() or not (30 <= int(txt) <= 180):
        await message.answer("❌ مدت باید عددی بین 30 تا 180 روز باشه. دوباره بفرست:")
        return
    data = await state.get_data()
    vol = int(data.get("config_volume", 0))
    days = int(txt)
    await state.clear()
    per_gb = sget_int("config_price_per_gb", 2000)
    amount = vol * per_gb
    await message.answer(CONFIG_CUSTOM_SUMMARY_TEXT.format(
        vol=vol, days=days, amount=fmt(amount)))
    order_id = create_order(message.from_user.id, "config",
                            amount, meta=f"{vol}:{days}")
    await show_payment(message.bot, message.chat.id, order_id)


# ---------------------------------------------------------------------------
# Support, FAQ, tutorial, bot builder, referral
# ---------------------------------------------------------------------------

@router.callback_query(F.data == "menu:support")
async def cb_menu_support(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, SUPPORT_TEXT, kb_support())
    await cb.answer()


@router.callback_query(F.data == "support:two")
async def cb_support_two(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    # In the original, support-2 is broken — replicated as a callback alert.
    await cb.answer(SUPPORT2_ALERT, show_alert=True)


@router.callback_query(F.data == "support:ticket")
async def cb_support_ticket(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await state.set_state(St.ticket_text)
    await cb.message.answer(TICKET_TEXT, reply_markup=kb_back("menu:support"))
    await cb.answer()


@router.message(StateFilter(St.ticket_text), F.text | F.photo)
async def msg_ticket(message: Message, state: FSMContext):
    text = message.text or message.caption or "📷 (عکس پیوست شد)"
    await state.clear()
    with closing(db()) as conn:
        cur = conn.execute(
            "INSERT INTO tickets(user_id,text,created_at) VALUES(?,?,?)",
            (message.from_user.id, text, now_ts()))
        conn.commit()
        tid = cur.lastrowid
    await message.answer(TICKET_OK_TEXT)
    for admin in ADMIN_IDS:
        try:
            await message.bot.send_message(
                admin,
                f"🎫 تیکت جدید #{tid}\n👤 کاربر: {message.from_user.id}\n\n{text}",
                reply_markup=kb([[btn("✍️ پاسخ", f"admin:ticket_reply:{tid}",
                                      style=STYLE_SUCCESS)]]))
        except Exception:
            pass


@router.callback_query(F.data == "menu:faq")
async def cb_menu_faq(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, FAQ_TEXT, kb_faq())
    await cb.answer()


@router.callback_query(F.data == "menu:tutorial")
async def cb_menu_tutorial(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    # The original's tutorial section is empty — kept empty in the replica.
    await edit_or_answer(cb, TUTORIAL_TEXT, kb_main_btn())
    await cb.answer()


@router.callback_query(F.data == "menu:botbuilder")
async def cb_menu_botbuilder(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    await edit_or_answer(cb, BOTBUILDER_TEXT, kb_botbuilder())
    await cb.answer()


@router.callback_query(F.data == "botbuilder:order")
async def cb_botbuilder_order(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    price = sget_int("botbuilder_price", 500000)
    order_id = create_order(cb.from_user.id, "botbuilder", price)
    await cb.answer()
    await show_payment(cb.bot, cb.message.chat.id, order_id)


@router.callback_query(F.data == "menu:referral")
async def cb_menu_referral(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not await guard(cb):
        return
    me = await cb.bot.me()
    markup, link = kb_referral(me.username, cb.from_user.id)
    with closing(db()) as conn:
        count = conn.execute(
            "SELECT COUNT(*) c FROM users WHERE ref_by=?",
            (cb.from_user.id,)).fetchone()["c"]
        earned = conn.execute(
            "SELECT COALESCE(SUM(amount),0) s FROM wallet_tx"
            " WHERE user_id=? AND descr LIKE 'پاداش زیرمجموعه‌گیری%'",
            (cb.from_user.id,)).fetchone()["s"]
    pct = sget_int("ref_percent", 10)
    await edit_or_answer(cb, REFERRAL_TEXT.format(
        percent=pct, link=link, count=count, earned=fmt(earned)), markup)
    await cb.answer()


# ---------------------------------------------------------------------------
# Admin panel
# ---------------------------------------------------------------------------

def kb_admin():
    return kb([
        [btn("📊 آمار", "admin:stats", style=STYLE_PRIMARY),
         btn("🪪 احراز هویت‌های در انتظار", "admin:kyc_list",
             style=STYLE_PRIMARY)],
        [btn("🧾 پرداخت‌های در انتظار", "admin:pay_list",
             style=STYLE_PRIMARY),
         btn("🎫 تیکت‌های باز", "admin:ticket_list", style=STYLE_PRIMARY)],
        [btn("⚙️ تنظیمات", "admin:settings", style=STYLE_PRIMARY),
         btn("🎟 ساخت کد", "admin:code_menu", style=STYLE_PRIMARY)],
        [btn("👥 کاربران", "admin:users", style=STYLE_PRIMARY),
         btn("📢 ارسال همگانی", "admin:broadcast", style=STYLE_PRIMARY)],
        [btn("🏠 منوی اصلی", "menu:main_panel", style=STYLE_PRIMARY)],
    ])


ADMIN_TEXT = "🛠 پنل ادمین\n\nیکی از بخش‌ها رو انتخاب کن:"


def _is_admin(uid):
    return uid in ADMIN_IDS


@router.message(Command("admin"))
async def cmd_admin(message: Message, state: FSMContext):
    await state.clear()
    if not _is_admin(message.from_user.id):
        return
    await message.answer(ADMIN_TEXT, reply_markup=kb_admin())


@router.callback_query(F.data == "admin:home")
async def cb_admin_home(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    await edit_or_answer(cb, ADMIN_TEXT, kb_admin())
    await cb.answer()


@router.callback_query(F.data == "admin:stats")
async def cb_admin_stats(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    with closing(db()) as conn:
        users = conn.execute("SELECT COUNT(*) c FROM users").fetchone()["c"]
        panels = conn.execute("SELECT COUNT(*) c FROM panels").fetchone()["c"]
        configs = conn.execute("SELECT COUNT(*) c FROM configs").fetchone()["c"]
        paid = conn.execute(
            "SELECT COUNT(*) c, COALESCE(SUM(final_amount),0) s FROM orders"
            " WHERE status='paid'").fetchone()
        pending = conn.execute(
            "SELECT COUNT(*) c FROM orders WHERE status='pending_review'"
        ).fetchone()["c"]
        balance = conn.execute(
            "SELECT COALESCE(SUM(balance),0) s FROM users").fetchone()["s"]
        tickets = conn.execute(
            "SELECT COUNT(*) c FROM tickets WHERE status='open'").fetchone()["c"]
    text = (f"📊 آمار ربات\n\n"
            f"👥 کاربران: {fmt(users)}\n"
            f"🖥 پنل‌ها: {fmt(panels)}\n"
            f"📦 کانفیگ‌ها: {fmt(configs)}\n"
            f"✅ سفارش‌های پرداخت‌شده: {fmt(paid['c'])} — درآمد: {fmt(paid['s'])} تومان\n"
            f"⏳ پرداخت‌های در انتظار بررسی: {fmt(pending)}\n"
            f"🎫 تیکت‌های باز: {fmt(tickets)}\n"
            f"👛 مجموع موجودی کیف پول‌ها: {fmt(balance)} تومان")
    await edit_or_answer(cb, text, kb_back("admin:home"))
    await cb.answer()


@router.callback_query(F.data == "admin:kyc_list")
async def cb_admin_kyc_list(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    with closing(db()) as conn:
        rows = conn.execute(
            "SELECT * FROM kyc WHERE status='pending' ORDER BY id DESC LIMIT 10"
        ).fetchall()
    if not rows:
        await edit_or_answer(cb, "🪪 احراز هویت در انتظاری وجود نداره.",
                             kb_back("admin:home"))
        await cb.answer()
        return
    await cb.answer()
    for r in rows:
        caption = f"🪪 احراز هویت #{r['id']}\n👤 کاربر: {r['user_id']}"
        if r["card_number"]:
            caption += f"\n💳 کارت: <code>{r['card_number']}</code>"
        await cb.message.answer_photo(
            r["photo_file"],
            caption=caption,
            reply_markup=kb([[btn("✅ تأیید", f"admin:kyc_ok:{r['id']}",
                                  style=STYLE_SUCCESS),
                              btn("❌ رد", f"admin:kyc_no:{r['id']}",
                                  style=STYLE_DANGER)]]))


@router.callback_query(F.data.startswith("admin:kyc_ok:"))
async def cb_admin_kyc_ok(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    kyc_id = int(cb.data.rsplit(":", 1)[1])
    with closing(db()) as conn:
        row = conn.execute("SELECT * FROM kyc WHERE id=?", (kyc_id,)).fetchone()
        if row:
            conn.execute("UPDATE kyc SET status='approved' WHERE id=?", (kyc_id,))
            conn.execute("UPDATE users SET kyc_status='approved' WHERE id=?",
                         (row["user_id"],))
            conn.commit()
    await cb.answer("✅ تأیید شد")
    if row:
        try:
            await cb.bot.send_message(row["user_id"], KYC_APPROVED_TEXT)
        except Exception:
            pass


@router.callback_query(F.data.startswith("admin:kyc_no:"))
async def cb_admin_kyc_no(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    kyc_id = int(cb.data.rsplit(":", 1)[1])
    with closing(db()) as conn:
        row = conn.execute("SELECT * FROM kyc WHERE id=?", (kyc_id,)).fetchone()
        if row:
            conn.execute("UPDATE kyc SET status='rejected' WHERE id=?", (kyc_id,))
            conn.execute("UPDATE users SET kyc_status='rejected' WHERE id=?",
                         (row["user_id"],))
            conn.commit()
    await cb.answer("❌ رد شد")
    if row:
        try:
            await cb.bot.send_message(row["user_id"], KYC_REJECTED_TEXT)
        except Exception:
            pass


@router.callback_query(F.data == "admin:pay_list")
async def cb_admin_pay_list(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    with closing(db()) as conn:
        rows = conn.execute(
            "SELECT * FROM orders WHERE status='pending_review'"
            " ORDER BY id DESC LIMIT 10").fetchall()
    if not rows:
        await edit_or_answer(cb, "🧾 پرداخت در انتظاری وجود نداره.",
                             kb_back("admin:home"))
        await cb.answer()
        return
    await cb.answer()
    for o in rows:
        text = (f"🧾 سفارش #{o['id']} — {order_title(o)}\n"
                f"👤 کاربر: {o['user_id']}\n"
                f"💰 مبلغ: {fmt(o['final_amount'])} تومان\n"
                f"💳 روش: {o['method'] or '—'}")
        if o["tx_hash"]:
            text += f"\n🔗 هش: <code>{o['tx_hash']}</code>"
        await cb.message.answer(
            text, reply_markup=kb([[btn("✅ تأیید پرداخت", f"admin:pay_ok:{o['id']}",
                                         style=STYLE_SUCCESS),
                                    btn("❌ رد پرداخت", f"admin:pay_no:{o['id']}",
                                        style=STYLE_DANGER)]]))


async def _admin_pay_decide(cb: CallbackQuery, approve: bool):
    if not _is_admin(cb.from_user.id):
        return
    order_id = int(cb.data.rsplit(":", 1)[1])
    order = get_order(order_id)
    if not order or order["status"] != "pending_review":
        await cb.answer("این سفارش قبلاً بررسی شده.", show_alert=True)
        return
    if approve:
        set_order(order_id, status="paid", paid_at=now_ts())
        await cb.answer("✅ پرداخت تأیید شد")
        try:
            await cb.bot.send_message(order["user_id"], ORDER_PAID_TEXT)
        except Exception:
            pass
        await deliver_order(cb.bot, get_order(order_id))
    else:
        set_order(order_id, status="rejected")
        await cb.answer("❌ پرداخت رد شد")
        try:
            await cb.bot.send_message(order["user_id"], ORDER_REJECTED_TEXT)
        except Exception:
            pass


@router.callback_query(F.data.startswith("admin:pay_ok:"))
async def cb_admin_pay_ok(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    await _admin_pay_decide(cb, True)


@router.callback_query(F.data.startswith("admin:pay_no:"))
async def cb_admin_pay_no(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    await _admin_pay_decide(cb, False)


@router.callback_query(F.data == "admin:ticket_list")
async def cb_admin_ticket_list(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    with closing(db()) as conn:
        rows = conn.execute(
            "SELECT * FROM tickets WHERE status='open' ORDER BY id DESC LIMIT 10"
        ).fetchall()
    if not rows:
        await edit_or_answer(cb, "🎫 تیکت بازی وجود نداره.", kb_back("admin:home"))
        await cb.answer()
        return
    await cb.answer()
    for t in rows:
        await cb.message.answer(
            f"🎫 تیکت #{t['id']}\n👤 کاربر: {t['user_id']}\n\n{t['text']}",
            reply_markup=kb([[btn("✍️ پاسخ", f"admin:ticket_reply:{t['id']}",
                                   style=STYLE_SUCCESS)]]))


@router.callback_query(F.data.startswith("admin:ticket_reply:"))
async def cb_admin_ticket_reply(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    tid = int(cb.data.rsplit(":", 1)[1])
    await state.set_state(St.admin_reply)
    await state.update_data(ticket_id=tid)
    await cb.message.answer(f"✍️ پاسخ تیکت #{tid} رو بنویس:")
    await cb.answer()


@router.message(StateFilter(St.admin_reply), F.text)
async def msg_admin_reply(message: Message, state: FSMContext):
    data = await state.get_data()
    tid = data.get("ticket_id")
    await state.clear()
    with closing(db()) as conn:
        row = conn.execute("SELECT * FROM tickets WHERE id=?", (tid,)).fetchone()
        if row:
            conn.execute(
                "UPDATE tickets SET status='answered', reply=? WHERE id=?",
                (message.text, tid))
            conn.commit()
    if row:
        try:
            await message.bot.send_message(
                row["user_id"],
                f"🎫 پاسخ پشتیبانی به تیکت #{tid}:\n\n{message.text}")
        except Exception:
            pass
    await message.answer("✅ پاسخ ارسال شد.")


SETTING_KEYS = [
    ("panel_price_per_gb", "قیمت هر گیگ پنل"),
    ("config_price_per_gb", "قیمت هر گیگ کانفیگ"),
    ("botbuilder_price", "قیمت ساخت ربات (ماهانه)"),
    ("min_charge", "حداقل شارژ کیف پول"),
    ("card_number", "شماره کارت"),
    ("card_holder", "نام صاحب کارت"),
    ("crypto_trx", "آدرس TRX (trc20)"),
    ("crypto_usdt_bep20", "آدرس USDT (bep20)"),
    ("crypto_ton", "آدرس TON"),
    ("crypto_bonus_tiers", "سطوح هدیه شارژ کریپتو (مبلغ:درصد، با کاما)"),
    ("gate_enabled", "گیت عضویت (1/0)"),
    ("gate_strict", "گیت سخت‌گیرانه (1/0)"),
    ("gate_channels", "کانال‌های گیت (آیدی عددی، با کاما)"),
    ("gate_link_1", "لینک کانال گیت ۱"),
    ("gate_link_2", "لینک کانال گیت ۲"),
    ("support_1", "یوزرنیم پشتیبانی ۱"),
    ("support_2", "یوزرنیم پشتیبانی ۲"),
    ("support_fin", "یوزرنیم پشتیبانی مالی"),
    ("miniapp_url", "آدرس مینی‌اپ تاریخچه پرداخت‌ها (خالی = تاریخچه چتی)"),
    ("sub_base_url", "آدرس پایهٔ لینک اشتراک"),
    ("ref_percent", "درصد زیرمجموعه‌گیری"),
]


@router.callback_query(F.data == "admin:settings")
async def cb_admin_settings(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    rows = []
    for key, label in SETTING_KEYS:
        rows.append([btn(f"{label}: {get_setting(key)}",
                         f"admin:set:{key}", style=STYLE_PRIMARY)])
    rows.append([btn("↩️ بازگشت", "admin:home", style=STYLE_PRIMARY,
                     emoji_key="back")])
    await edit_or_answer(cb, "⚙️ تنظیمات — برای ویرایش، روی هر مورد بزن:", kb(rows))
    await cb.answer()


@router.callback_query(F.data.startswith("admin:set:"))
async def cb_admin_set(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    key = cb.data[len("admin:set:"):]
    await state.set_state(St.admin_setting)
    await state.update_data(setting_key=key)
    await cb.message.answer(
        f"⚙️ مقدار جدید برای «{key}» رو بفرست:\nمقدار فعلی: {get_setting(key)}")
    await cb.answer()


@router.message(StateFilter(St.admin_setting), F.text)
async def msg_admin_setting(message: Message, state: FSMContext):
    data = await state.get_data()
    key = data.get("setting_key")
    await state.clear()
    set_setting(key, (message.text or "").strip())
    await message.answer(f"✅ تنظیم «{key}» ذخیره شد.",
                         reply_markup=kb_admin())


@router.callback_query(F.data == "admin:code_menu")
async def cb_admin_code_menu(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    await edit_or_answer(cb, "🎟 ساخت کد — نوع کد رو انتخاب کن:", kb([
        [btn("🎁 کد هدیه (مبلغی)", "admin:code:gift", style=STYLE_PRIMARY)],
        [btn("🎟 کد تخفیف (درصدی)", "admin:code:discount",
             style=STYLE_PRIMARY)],
        [btn("↩️ بازگشت", "admin:home", style=STYLE_PRIMARY,
             emoji_key="back")],
    ]))
    await cb.answer()


@router.callback_query(F.data.startswith("admin:code:"))
async def cb_admin_code(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    kind = cb.data.rsplit(":", 1)[1]
    await state.set_state(St.admin_code)
    await state.update_data(code_kind=kind)
    if kind == "gift":
        await cb.message.answer("🎁 مبلغ کد هدیه رو به تومان بفرست:")
    else:
        await cb.message.answer("🎟 درصد کد تخفیف رو بفرست (مثلاً 10):")
    await cb.answer()


@router.message(StateFilter(St.admin_code), F.text)
async def msg_admin_code(message: Message, state: FSMContext):
    data = await state.get_data()
    kind = data.get("code_kind")
    await state.clear()
    txt = (message.text or "").strip()
    if not txt.isdigit():
        await message.answer("❌ باید عدد بفرستی.")
        return
    if kind == "gift":
        code = gen_code("GIFT", 6)
        with closing(db()) as conn:
            conn.execute(
                "INSERT INTO codes(code,kind,amount,created_by,created_at)"
                " VALUES(?,?,?,?,?)",
                (code, "gift", int(txt), message.from_user.id, now_ts()))
            conn.commit()
        await message.answer(f"🎁 کد هدیه ساخته شد:\n<code>{code}</code>\n💰 مبلغ: {fmt(txt)} تومان")
    else:
        code = gen_code("OFF", 6)
        with closing(db()) as conn:
            conn.execute(
                "INSERT INTO codes(code,kind,percent,created_by,created_at)"
                " VALUES(?,?,?,?,?)",
                (code, "discount", int(txt), message.from_user.id, now_ts()))
            conn.commit()
        await message.answer(f"🎟 کد تخفیف ساخته شد:\n<code>{code}</code>\n💰 تخفیف: {txt}٪")


@router.callback_query(F.data == "admin:broadcast")
async def cb_admin_broadcast(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    await state.set_state(St.admin_broadcast)
    await cb.message.answer("📢 متن پیام همگانی رو بفرست:")
    await cb.answer()


@router.message(StateFilter(St.admin_broadcast), F.text)
async def msg_admin_broadcast(message: Message, state: FSMContext):
    await state.clear()
    with closing(db()) as conn:
        ids = [r["id"] for r in conn.execute("SELECT id FROM users").fetchall()]
    ok = fail = 0
    for uid in ids:
        try:
            await message.bot.send_message(uid, f"📢 {message.text}")
            ok += 1
        except Exception:
            fail += 1
    await message.answer(f"📢 ارسال همگانی تموم شد.\n✅ موفق: {ok}\n❌ ناموفق: {fail}")


@router.callback_query(F.data == "admin:users")
async def cb_admin_users(cb: CallbackQuery, state: FSMContext):
    await state.clear()
    if not _is_admin(cb.from_user.id):
        return
    await state.set_state(St.admin_user_id)
    await cb.message.answer("👥 آیدی عددی کاربر رو بفرست:")
    await cb.answer()


@router.message(StateFilter(St.admin_user_id), F.text)
async def msg_admin_user_id(message: Message, state: FSMContext):
    txt = (message.text or "").strip()
    if not txt.lstrip("-").isdigit():
        await state.clear()
        await message.answer("❌ آیدی معتبر نیست.")
        return
    uid = int(txt)
    user = get_user(uid)
    if not user:
        await state.clear()
        await message.answer("❌ کاربر پیدا نشد.")
        return
    await state.set_state(St.admin_adjust)
    await state.update_data(target_uid=uid)
    text = (f"👤 کاربر {uid}\n"
            f"💰 موجودی: {fmt(user['balance'])} تومان\n"
            f"🪪 احراز هویت: {user['kyc_status']}\n"
            f"🚫 بن: {'بله' if user['banned'] else 'خیر'}\n\n"
            "برای تغییر موجودی، مبلغ رو با علامت بفرست (مثلاً 50000 یا -50000).\n"
            "برای بن/آن‌بن کردن: ban یا unban")
    await message.answer(text)


@router.message(StateFilter(St.admin_adjust), F.text)
async def msg_admin_adjust(message: Message, state: FSMContext):
    data = await state.get_data()
    uid = data.get("target_uid")
    txt = (message.text or "").strip()
    await state.clear()
    if txt == "ban":
        with closing(db()) as conn:
            conn.execute("UPDATE users SET banned=1 WHERE id=?", (uid,))
            conn.commit()
        await message.answer(f"🚫 کاربر {uid} بن شد.")
    elif txt == "unban":
        with closing(db()) as conn:
            conn.execute("UPDATE users SET banned=0 WHERE id=?", (uid,))
            conn.commit()
        await message.answer(f"✅ کاربر {uid} آن‌بن شد.")
    elif txt.lstrip("+-").isdigit():
        add_balance(uid, int(txt), "تغییر موجودی توسط ادمین")
        await message.answer(f"✅ موجودی کاربر {uid} به مبلغ {fmt(int(txt))} تومان تغییر کرد.")
    else:
        await message.answer("❌ ورودی نامعتبر بود.")


# ---------------------------------------------------------------------------
# Main
# ---------------------------------------------------------------------------

async def main():
    init_db()
    if not BOT_TOKEN:
        raise SystemExit("BOT_TOKEN is not set (see .env.example)")
    bot = Bot(BOT_TOKEN, default=DefaultBotProperties(parse_mode=ParseMode.HTML))
    dp = Dispatcher()
    dp.include_router(router)
    await bot.set_my_commands([
        BotCommand(command="start", description="شروع / منوی اصلی"),
        BotCommand(command="wallet", description="کیف پول"),
        BotCommand(command="config", description="خرید کانفیگ"),
        BotCommand(command="panel", description="ساخت پنل"),
        BotCommand(command="test", description="سرویس تست رایگان"),
        BotCommand(command="admin", description="پنل ادمین"),
        BotCommand(command="cancel", description="لغو عملیات"),
    ])
    log.info("V2rey replica starting…")
    await dp.start_polling(bot)


if __name__ == "__main__":
    asyncio.run(main())
