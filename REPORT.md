# Exploration coverage report — @V2reyPanelBot replica

Replica built from live exploration of @V2reyPanelBot. After the first
build, a FIX PASS replaced every paraphrased/invented UI text, button
label, row layout and style with the REAL observed data; `smoke_test.py`
asserts the exact keyboards (39 checks, 0 failures).

## Identity / commands
- Persian V2Ray panel-selling bot. Commands set at startup:
  `/start /wallet /config /panel /test /admin /cancel`.

## Gate
- Forced join to two channels: `-1002251642309` and `-1003118300399`.
- Verbatim gate text («📢 عضویت در کانال الزامیست…»); keyboard ALL
  `primary`: [کانال اطلاع رسانی 1] / [کانال اطلاع رسانی 2] /
  [بررسی عضویت] — no emojis on labels.
- Admins bypass; `gate_strict` setting controls error behaviour.

## Main menus — TWO variants (both implemented, ALL buttons `success`)
1. **Panel-builder menu** — after `/start`: ⚡ خرید پنل /
   💻 پنل های من + 💰 کیف پول / 🎲 تاس شانس / 🛡️ سرویس تست +
   👨‍💻 پشتیبانی / بخش خرید کانفیگ / ⁉️ سوالات متداول + 💡 آموزش استفاده /
   🤖 بخش ربات ساز. Welcome text verbatim («👏 سلام به بخش خرید پنل…»).
2. **Evo menu** — shown when returning to the main menu from the
   test-config delivery / lucky-dice flows: ⚡ خرید کانفیگ /
   💻 سرویس های من + 💰 کیف پول / 🎲 تاس شانس / 🛡️ سرویس تست +
   👨‍💻 پشتیبانی / بخش خرید پنل / ⁉️ سوالات متداول + 💡 آموزش استفاده /
   🤝 زیرمجموعه‌گیری. «سرویس های من» routes to the my-panels handler.
   Welcome text verbatim («⚡️ به ربات مجموعه Evo خوش اومدی…»).

## Colours
- `success` = green: both main menus entirely, most CTAs, tariff plan
  rows, payment method rows.
- `primary` = blue: the whole gate, tariff header/custom rows, support
  URL buttons, «بنداز!» dice button, test-claim button, config custom
  entry, bot-builder confirm, payment top-up (insufficient balance).
- `danger` = orange/brown: only «حذف کد تخفیف» on the payment screen
  (plus admin reject buttons).

## Flows implemented
- **Panel builder:** tariffs 250/500/1000/3000 GB (two-button rows:
  volume + formatted price, both `success`); header rows are `noop`
  labels; custom volume 250–10,000 GB @ 1,500 T/GB; username step shows
  the verbatim order-summary text («مشخصات سفارش شما…», username rules
  3–32 chars `[A-Za-z0-9_]`) → shared payment screen. My panels: empty
  state verbatim with one row [خرید پنل | منوی اصلی].
- **Shared payment screen:** verbatim text (payable amount + wallet
  balance; discount block appended when a code is applied: code,
  percent, original and discounted prices). Rows: کارت به کارت /
  ارز دیجیتال (`success`); wallet-pay (`success`) OR top-up with
  shortfall (`primary`) when balance < final; کد تخفیف دارم
  (`success`) OR حذف کد تخفیف (`danger`); 💎 منو اصلی (`success`).
- **Card-to-card KYC gate:** verbatim gate text (typos kept). The user
  sends ONE photo → pending KYC → admin approve/reject. The separate
  16-digit-number step from the first build was REMOVED. After
  approval, the card-number setting is shown and a receipt photo is
  collected → admin approve/reject → delivery.
- **Crypto:** currency picker + TX-hash flow DELETED. One screen with
  TRX (trc20) / USDT (bep20) / TON addresses (explored public
  addresses as admin-editable defaults) + «اسکرین شات تراکنش خود را
  ارسال کنید»; screenshot photo → pending → admin approval delivers
  the order (wallet charges are credited + crypto bonus).
- **Wallet:** verbatim wallet text. Charge order REVERSED to match the
  original: method screen first (کارت به کارت / ارز دیجیتال /
  ‹ انصراف, all `success`), then the amount prompt (card variant, or
  crypto variant listing the bonus tiers 1M→3%, 3M→5%, 5M→7%,
  10M→10%). Bonus applies ONLY to crypto wallet top-ups. Gift codes
  (verbatim prompt); payment history in-chat, or web-app button when
  `miniapp_url` is set.
- **Lucky dice:** verbatim texts; native dice; ≥4 wins a freshly
  generated 10% discount code valid 6h; 7-day cooldown. Win screen
  buttons one row [خرید پنل | منوی اصلی].
- **Test service:** verbatim texts (typo «حللا» kept); 1 GB / 1 day;
  stub sub link on the configurable `sub_base_url` + QR image;
  delivery buttons one row [⚡ خرید پنل | 💎 منوی اصلی → Evo menu].
- **Config shop:** list labels in Persian digits, NO prices
  (۳۰/۶۰/۱۰۰ گیگ — یک ماهه; notes: روزمره / پرمصرفها / بیشترین صرفه…;
  prices 60,000/120,000/180,000 T). Fixed plans open a multi-line
  summary («✅ مشخصات خرید سرویس شما» with each • item on its own
  line) with [ادامه و پرداخت | ‹ خرید کانفیگ] — the 100 GB plan's pay
  button is `primary`, others `success`. Custom: verbatim volume text
  (20–500 GB @ 2,000 T/GB) → days prompt (30–180) → custom summary →
  payment screen.
- **Support:** verbatim text. فنی 1 URL → @AndyCoffin (`primary`);
  فنی 2 broken in the original → callback alert
  «این پشتیبانی در دسترس نیست»; مالی URL → @qim7ixo (`support_fin`
  setting); ارسال تیکت (`success`); ticket accepts text or photo.
- **FAQ:** the original's 8 Q&As verbatim, no header; buttons
  [سوالم اینجا نبود - ارتباط با پشتیبانی → support] / [💎 منوی اصلی].
  **Tutorials:** verbatim empty text.
- **Bot builder:** verbatim terms text (500,000 T/month, 1,500 T/GB
  base); one row [✅ تأیید و ادامه `primary` | انصراف `success`].
- **Evo referral:** verbatim text (10% share, link in `<code>`,
  counters); one row [ارسال لینک برای دوستان (share URL) | منوی اصلی].
- Generic user-facing back buttons are «💎 منوی اصلی» / «‹ انصراف»
  (`success`); the invented «↩️ بازگشت» user button was removed
  (admin screens keep their own back button).

## Admin panel
Stats; pending KYC list (single photo, approve/reject); pending
payments incl. crypto screenshots (approve → delivery, reject → user
notified); open tickets with replies; settings editor (prices per GB,
card number/holder, crypto TRX/USDT-bep20/TON addresses, crypto bonus
tiers, gate channels/on-off/strict, support usernames incl.
`support_fin`, `miniapp_url`, sub base URL); gift/discount code
creation; broadcast; user lookup with wallet adjust and ban/unban.

## Deviations
See README.md — payment-with-wallet button when balance suffices is
inferred; gift-code invalid reply added; test-config once-only is an
assumption; support-2 broken in original reproduced as alert;
truncated 100 GB note kept; custom-emoji IDs empty (not extractable);
provisioning/payment verification are marked TODO stubs.
