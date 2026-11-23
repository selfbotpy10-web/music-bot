# V2rey Panel — Replica of @V2reyPanelBot

A clean-room, from-scratch re-implementation (aiogram 3.x + SQLite, single
file `bot.py`) of the user-visible behaviour of **@V2reyPanelBot**: panel
builder, config shop, wallet, card-to-card payments behind a KYC gate,
crypto payments, lucky dice, free test service, support/tickets, FAQ, bot
builder and the Evo referral program — plus a full admin panel.

All user-facing texts, button labels, row layouts and Bot API button
styles (`success` = green, `primary` = blue, `danger` = orange/brown) are
reproduced **verbatim from live exploration** of the original bot —
including its typos (e.g. «حللا» in the test-service text, «اکر» in the
KYC text). `smoke_test.py` asserts the exact rows/labels/styles of the
main keyboards.

## Setup

```bash
python3 -m venv .venv
.venv/bin/pip install -r requirements.txt
cp .env.example .env   # fill BOT_TOKEN and ADMIN_IDS (comma-separated)
.venv/bin/python bot.py
.venv/bin/python smoke_test.py   # keyboard/text smoke test (39 checks)
```

Commands set at startup: `/start /wallet /config /panel /test /admin /cancel`

## What works out of the box

- Forced-join gate with the two explored channel IDs
  (`-1002251642309`, `-1003118300399`); gate keyboard is ALL `primary`
  with the labels «کانال اطلاع رسانی 1/2» + «بررسی عضویت»; admins bypass;
  `gate_strict` setting decides whether API errors block or allow.
- BOTH main menus, every button `success` (green): the panel-builder
  menu after `/start` (⚡ خرید پنل … 🤖 بخش ربات ساز), and the Evo menu
  shown when returning from the test-config delivery / dice flows
  (⚡ خرید کانفیگ … 🤝 زیرمجموعه‌گیری).
- Panel tariffs 250/500/1000/3000 GB + custom volume 250–10,000 GB
  @ 1,500 T/GB, then the username step (order-summary text; username
  3–32 chars, `[A-Za-z0-9_]`); my-panels list/detail.
- Shared payment screen (verbatim layout): کارت به کارت / ارز دیجیتال
  (both `success`); with insufficient balance a `primary` top-up button
  «شارژ کیف پول (کسری … تومان)» replaces the wallet-pay button;
  «کد تخفیف دارم» (`success`) swaps to «حذف کد تخفیف» (`danger` — the
  only danger button) once a code is applied; «💎 منو اصلی» last.
- Card-to-card KYC gate: ONE photo (card + handwritten note in a single
  picture, per the verbatim KYC text) → admin approve/reject → card
  number shown → receipt photo → admin approve/reject → delivery.
  There is no separate card-number step.
- Crypto: ONE screen listing all three deposit addresses (TRX trc20 /
  USDT bep20 / TON, admin-editable settings with the explored public
  addresses as defaults) — the user replies with a transaction
  **screenshot** → admin approve/reject → delivery. No currency picker,
  no TX-hash step.
- Wallet: charge flow asks the **method first** (کارت به کارت / ارز
  دیجیتال), then the amount (min 100,000 T). Crypto top-ups earn a
  bonus by tier (≥1M +3%, ≥3M +5%, ≥5M +7%, ≥10M +10% — the
  `crypto_bonus_tiers` setting); the bonus applies ONLY to crypto
  wallet top-ups. Gift codes; payment history in-chat, or as a web-app
  button when the `miniapp_url` setting is set.
- Lucky dice: native Telegram dice; ≥4 wins a 10% code valid 6 hours;
  7-day cooldown; roll button «بنداز!» is `primary`.
- Test service: 1 GB / 1 day, sub link + QR image; the delivery
  screen's main-menu button leads to the Evo menu.
- Config shop: plans labelled in Persian digits with NO prices
  (۳۰/۶۰/۱۰۰ گیگ — یک ماهه; 60,000/120,000/180,000 T), each opening a
  summary screen («ادامه و پرداخت» — `primary` only on the 100 GB
  plan); custom 20–500 GB, 30–180 days @ 2,000 T/GB with its own
  summary before payment.
- Support: پشتیبانی فنی 1 = URL button to @AndyCoffin; پشتیبانی فنی 2
  replicates the original's broken behaviour (callback alert
  «این پشتیبانی در دسترس نیست»); پشتیبانی مالی = URL to @qim7ixo
  (`support_fin` setting); ticket flow (text or photo) to admins with
  admin replies.
- FAQ: the original's 8 Q&As verbatim. Tutorials: empty in the
  original, kept empty («❌ هنوز چیزی اینجا ثبت نشده است.»).
- Bot builder: verbatim terms text, 500,000 T/month, confirm button
  `primary` / cancel `success` in one row.
- Evo referral: verbatim text, 10% of referred users' purchases,
  referral link in `<code>` + share-URL button.
- Waiting-state rule: any new button press, `/start` or `/cancel`
  clears the previous FSM waiting state.
- Full `/admin`: stats, pending KYC/payments/tickets with
  approve/reject, settings editing, gift/discount code creation,
  broadcast, user wallet adjust / ban.

## What is stubbed (TODO)

- **Panel provisioning** — `create_panel_stub()` / `create_config_stub()`
  return placeholder subscription links built on the `sub_base_url`
  setting. Wire them to a real Marzban / 3x-ui API for production.
- **Crypto verification** — there is no on-chain check; admins approve
  crypto payments manually from the screenshot.
- **Gate invite links** (`gate_link_1/2`) are placeholders — set real
  invite links in settings.

## Deviations from the original

1. The payment screen's «پرداخت با کیف پول» button (shown when the
   balance suffices) is **inferred**: only the insufficient-balance
   variant («شارژ کیف پول (کسری … تومان)») was directly observed.
2. The original stays silent on an invalid gift code; the replica
   replies «❌ این کد هدیه معتبر نیست یا قبلاً استفاده شده.» so users
   get feedback (gift-code invalid reply added).
3. Test-config **once-only** delivery is an assumption: the replica
   allows one free test config per user (`test_used` flag).
4. Support-2 is broken in the original; the replica reproduces that
   as a callback alert instead of a working support link.
5. The 100 GB config plan's note was truncated during exploration
   («بیشترین صرفه…»); the label keeps the truncated note.
6. Premium/custom emoji IDs are not extractable — `CUSTOM_EMOJI_IDS`
   ships empty with standard-emoji fallbacks; fill IDs in `bot.py` and
   `btn()` wires `icon_custom_emoji_id` automatically.
