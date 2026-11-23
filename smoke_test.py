# -*- coding: utf-8 -*-
"""Keyboard + text smoke test for the @V2reyPanelBot replica.

Asserts EXACT rows / labels / Bot API styles for the keyboards listed in
the fix brief, plus grep-style asserts on the source (required verbatim
strings present; removed crypto flow strings absent).

Run:  .venv/bin/python smoke_test.py   (uses a throwaway temp DB)
"""
import os
import sys
import tempfile

os.environ.setdefault("BOT_TOKEN", "123456:SMOKE-TEST")
os.environ["DB_PATH"] = os.path.join(tempfile.mkdtemp(), "smoke.db")

sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
import bot  # noqa: E402

bot.init_db()

PASS = 0
FAIL = 0
FAILURES = []


def check(name, cond, detail=""):
    global PASS, FAIL
    if cond:
        PASS += 1
    else:
        FAIL += 1
        FAILURES.append(f"{name} {detail}".strip())


def rows_of(markup):
    """[[(text, style, callback_data, url), ...], ...]"""
    out = []
    for row in markup.inline_keyboard:
        out.append([
            (b.text, getattr(b, "style", None), b.callback_data, b.url)
            for b in row
        ])
    return out


def expect(name, markup, expected):
    got = rows_of(markup)
    check(name, got == expected,
          f"\n  expected: {expected}\n  got:      {got}")


S, P, D = "success", "primary", "danger"

# --- gate: ALL primary, no emojis on labels -------------------------------
expect("gate", bot.kb_gate(), [
    [("کانال اطلاع رسانی 1", P, None, bot.get_setting("gate_link_1"))],
    [("کانال اطلاع رسانی 2", P, None, bot.get_setting("gate_link_2"))],
    [("بررسی عضویت", P, "gate:check", None)],
])

# --- main menu (panel variant): ALL success -------------------------------
expect("kb_main_panel", bot.kb_main_panel(), [
    [("⚡ خرید پنل", S, "menu:panel", None)],
    [("💻 پنل های من", S, "menu:mypanels", None),
     ("💰 کیف پول", S, "menu:wallet", None)],
    [("🎲 تاس شانس", S, "menu:dice", None)],
    [("🛡️ سرویس تست", S, "menu:test", None),
     ("👨‍💻 پشتیبانی", S, "menu:support", None)],
    [("بخش خرید کانفیگ", S, "menu:configs", None)],
    [("⁉️ سوالات متداول", S, "menu:faq", None),
     ("💡 آموزش استفاده", S, "menu:tutorial", None)],
    [("🤖 بخش ربات ساز", S, "menu:botbuilder", None)],
])

# --- main menu (Evo variant): ALL success ---------------------------------
expect("kb_main_evo", bot.kb_main_evo(), [
    [("⚡ خرید کانفیگ", S, "menu:configs", None)],
    [("💻 سرویس های من", S, "menu:mypanels", None),
     ("💰 کیف پول", S, "menu:wallet", None)],
    [("🎲 تاس شانس", S, "menu:dice", None)],
    [("🛡️ سرویس تست", S, "menu:test", None),
     ("👨‍💻 پشتیبانی", S, "menu:support", None)],
    [("بخش خرید پنل", S, "menu:panel", None)],
    [("⁉️ سوالات متداول", S, "menu:faq", None),
     ("💡 آموزش استفاده", S, "menu:tutorial", None)],
    [("🤝 زیرمجموعه‌گیری", S, "menu:referral", None)],
])

# --- panel tariffs (incl. the 3000 GB row) --------------------------------
expect("kb_panel_tariff", bot.kb_panel_tariff(), [
    [("=-=-= مشخصات سرویس‌های ما =-=-=", S, "noop", None)],
    [("📊 حجم", P, "noop", None), ("💲 قیمت", P, "noop", None)],
    [("➕ حجم دلخواه", P, "panel:custom", None),
     ("1,500 تومان", P, "panel:custom", None)],
    [("250GB", S, "panel:tariff:250", None),
     ("375,000 تومان", S, "panel:tariff:250", None)],
    [("500GB", S, "panel:tariff:500", None),
     ("750,000 تومان", S, "panel:tariff:500", None)],
    [("1000GB", S, "panel:tariff:1000", None),
     ("1,500,000 تومان", S, "panel:tariff:1000", None)],
    [("3000GB", S, "panel:tariff:3000", None),
     ("4,500,000 تومان", S, "panel:tariff:3000", None)],
    [("💎 منوی اصلی", S, "menu:main_panel", None)],
])
check("PANEL_TARIFFS", bot.PANEL_TARIFFS == [250, 500, 1000, 3000],
      f"got {bot.PANEL_TARIFFS}")

# --- wallet ----------------------------------------------------------------
expect("kb_wallet", bot.kb_wallet(), [
    [("💸 شارژ کیف پول", S, "wallet:charge", None)],
    [("🎁 کد هدیه", P, "wallet:gift", None),
     ("🧾 تاریخچه پرداخت‌ها", P, "wallet:history", None)],
    [("💎 منوی اصلی", S, "menu:main_panel", None)],
])

# --- payment: sufficient balance, no discount ------------------------------
expect("kb_payment[sufficient,no-discount]",
       bot.kb_payment(7, balance=900000, final_amount=500000,
                      has_discount=False), [
    [("کارت به کارت", S, "pay:card:7", None)],
    [("ارز دیجیتال", S, "pay:crypto:7", None)],
    [("پرداخت با کیف پول", S, "pay:wallet:7", None)],
    [("کد تخفیف دارم", S, "pay:discount:7", None)],
    [("💎 منو اصلی", S, "menu:main_panel", None)],
])

# --- payment: insufficient balance, with discount --------------------------
expect("kb_payment[insufficient,discount]",
       bot.kb_payment(7, balance=100000, final_amount=500000,
                      has_discount=True), [
    [("کارت به کارت", S, "pay:card:7", None)],
    [("ارز دیجیتال", S, "pay:crypto:7", None)],
    [("شارژ کیف پول (کسری 400,000 تومان)", P, "wallet:charge", None)],
    [("حذف کد تخفیف", D, "pay:rmdiscount:7", None)],
    [("💎 منو اصلی", S, "menu:main_panel", None)],
])

# --- payment: sufficient balance, with discount ----------------------------
expect("kb_payment[sufficient,discount]",
       bot.kb_payment(7, balance=900000, final_amount=500000,
                      has_discount=True), [
    [("کارت به کارت", S, "pay:card:7", None)],
    [("ارز دیجیتال", S, "pay:crypto:7", None)],
    [("پرداخت با کیف پول", S, "pay:wallet:7", None)],
    [("حذف کد تخفیف", D, "pay:rmdiscount:7", None)],
    [("💎 منو اصلی", S, "menu:main_panel", None)],
])

# --- payment: insufficient balance, no discount ----------------------------
expect("kb_payment[insufficient,no-discount]",
       bot.kb_payment(7, balance=0, final_amount=500000,
                      has_discount=False), [
    [("کارت به کارت", S, "pay:card:7", None)],
    [("ارز دیجیتال", S, "pay:crypto:7", None)],
    [("شارژ کیف پول (کسری 500,000 تومان)", P, "wallet:charge", None)],
    [("کد تخفیف دارم", S, "pay:discount:7", None)],
    [("💎 منو اصلی", S, "menu:main_panel", None)],
])

# --- config list: Persian-digit labels, NO prices ---------------------------
expect("kb_config_list", bot.kb_config_list(), [
    [("۳۰ گیگ — یک ماهه", S, "config:plan:30:30", None)],
    [("۶۰ گیگ — یک ماهه", S, "config:plan:60:30", None)],
    [("۱۰۰ گیگ — یک ماهه", S, "config:plan:100:30", None)],
    [("➕ حجم و زمان دلخواه", P, "config:custom", None)],
    [("💎 منوی اصلی", S, "menu:main_panel", None)],
])
cfg_labels = " ".join(
    b.text for row in bot.kb_config_list().inline_keyboard for b in row)
check("kb_config_list has no prices", "تومان" not in cfg_labels,
      f"labels: {cfg_labels}")

# --- config summary buttons: 100 GB pay button is primary -------------------
expect("kb_config_summary[60]", bot.kb_config_summary(60, 30), [
    [("ادامه و پرداخت", S, "config:pay:60:30", None),
     ("‹ خرید کانفیگ", S, "menu:configs", None)],
])
expect("kb_config_summary[100]", bot.kb_config_summary(100, 30), [
    [("ادامه و پرداخت", P, "config:pay:100:30", None),
     ("‹ خرید کانفیگ", S, "menu:configs", None)],
])

# --- support -----------------------------------------------------------------
expect("kb_support", bot.kb_support(), [
    [("پشتیبانی فنی 1", P, None, "https://t.me/AndyCoffin")],
    [("پشتیبانی فنی 2", P, "support:two", None)],
    [("پشتیبانی مالی", P, None, "https://t.me/qim7ixo")],
    [("ارسال تیکت", S, "support:ticket", None)],
    [("💎 منوی اصلی", S, "menu:main_panel", None)],
])

# --- dice ----------------------------------------------------------------------
expect("kb_dice", bot.kb_dice(), [
    [("بنداز!", P, "dice:roll", None)],
    [("💎 منوی اصلی", S, "menu:main_evo", None)],
])
expect("kb_dice_result", bot.kb_dice_result(), [
    [("خرید پنل", S, "menu:panel", None),
     ("منوی اصلی", S, "menu:main_evo", None)],
])

# --- test service ----------------------------------------------------------------
expect("kb_test", bot.kb_test(), [
    [("دریافت کانفیگ تست", P, "test:get", None)],
    [("💎 منوی اصلی", S, "menu:main_panel", None)],
])
expect("kb_test_delivery", bot.kb_test_delivery(), [
    [("⚡ خرید پنل", S, "menu:panel", None),
     ("💎 منوی اصلی", S, "menu:main_evo", None)],
])

# --- charge method screen -----------------------------------------------------------
expect("kb_charge_methods", bot.kb_charge_methods(), [
    [("کارت به کارت", S, "charge:method:card", None)],
    [("ارز دیجیتال", S, "charge:method:crypto", None)],
    [("‹ انصراف", S, "menu:wallet", None)],
])

# --- my-panels empty / faq / botbuilder ----------------------------------------------
expect("kb_my_panels_empty", bot.kb_my_panels_empty(), [
    [("خرید پنل", S, "menu:panel", None),
     ("منوی اصلی", S, "menu:main_panel", None)],
])
expect("kb_faq", bot.kb_faq(), [
    [("سوالم اینجا نبود - ارتباط با پشتیبانی", S, "menu:support", None)],
    [("💎 منوی اصلی", S, "menu:main_panel", None)],
])
expect("kb_botbuilder", bot.kb_botbuilder(), [
    [("✅ تأیید و ادامه", P, "botbuilder:order", None),
     ("انصراف", S, "menu:main_panel", None)],
])

# --- verbatim text spot checks ---------------------------------------------------------
check("GATE_TEXT verbatim", bot.GATE_TEXT.startswith("📢 عضویت در کانال الزامیست."))
check("TEST_TEXT keeps حللا", "حللا" in bot.TEST_TEXT)
check("username step header", "مشخصات سفارش شما" in bot.PANEL_USERNAME_TEXT)
check("FAQ has 8 questions", bot.FAQ_TEXT.count("❓") == 8,
      f"count={bot.FAQ_TEXT.count('❓')}")
check("crypto bonus tiers", bot.crypto_bonus(1000000) == 30000
      and bot.crypto_bonus(3000000) == 150000
      and bot.crypto_bonus(500000) == 0)
check("crypto addresses are settings",
      bot.crypto_text(1000).count("TTu1SwQkoQZkZCUt8EkzWddZZEtQJbagvA") == 1)

# --- source grep asserts ------------------------------------------------------------------
src = open(os.path.join(os.path.dirname(os.path.abspath(__file__)), "bot.py"),
           encoding="utf-8").read()
for needle in ("عضویت در کانال الزامیست", "حللا", "مشخصات سفارش شما",
               "TTu1SwQkoQZkZCUt8EkzWddZZEtQJbagvA",
               "0x8E56D00FcDcC52a60089a770B591B3Cb27129ee2",
               "1000000:3,3000000:5,5000000:7,10000000:10",
               "بنداز!", "کانال اطلاع رسانی 1"):
    check(f"source contains {needle!r}", needle in src)
for banned in ("BTC", "crypto:hash"):
    check(f"source lacks {banned!r}", banned not in src)

print(f"SMOKE: PASS={PASS} FAIL={FAIL}")
for f in FAILURES:
    print("FAIL:", f)
sys.exit(1 if FAIL else 0)
