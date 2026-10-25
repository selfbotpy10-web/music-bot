import os, json, hmac, hashlib, time
from urllib.parse import parse_qsl
from flask import Flask, render_template, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import text
from sqlalchemy.exc import SQLAlchemyError

app = Flask(__name__)
app.config["SECRET_KEY"] = os.getenv("SECRET_KEY", "change-this-secret-before-deploy")
database_url = os.getenv("DATABASE_URL", "sqlite:///nitro_self.db")
if database_url.startswith("postgres://"):
    database_url = database_url.replace("postgres://", "postgresql://", 1)
app.config["SQLALCHEMY_DATABASE_URI"] = database_url
app.config["SQLALCHEMY_TRACK_MODIFICATIONS"] = False
db = SQLAlchemy(app)

BOT_TOKEN = os.getenv("BOT_TOKEN", "").strip()
BOT_USERNAME = os.getenv("BOT_USERNAME", "").strip().lstrip("@")
ADMIN_IDS = {x.strip() for x in os.getenv("ADMIN_IDS", "").split(",") if x.strip()}
WEBAPP_AUTH_REQUIRED = os.getenv("WEBAPP_AUTH_REQUIRED", "true").lower() == "true"

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    telegram_id = db.Column(db.String(32), unique=True, nullable=False, index=True)
    username = db.Column(db.String(80), default="")
    first_name = db.Column(db.String(100), default="کاربر")
    diamonds = db.Column(db.Integer, nullable=False, default=0)
    created_at = db.Column(db.DateTime, server_default=db.func.now())

class Ledger(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    telegram_id = db.Column(db.String(32), nullable=False, index=True)
    amount = db.Column(db.Integer, nullable=False)
    note = db.Column(db.String(240), nullable=False, default="")
    created_at = db.Column(db.DateTime, server_default=db.func.now())

class Selfbot(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    owner_telegram_id = db.Column(db.String(32), nullable=False, index=True)
    title = db.Column(db.String(100), nullable=False, default="سلف من")
    status = db.Column(db.String(20), nullable=False, default="inactive")
    created_at = db.Column(db.DateTime, server_default=db.func.now())

with app.app_context():
    db.create_all()

def validate_webapp_init_data(init_data: str):
    """Validate Telegram Mini App initData using the bot token."""
    if not BOT_TOKEN or not init_data:
        return None
    try:
        pairs = dict(parse_qsl(init_data, keep_blank_values=True))
        received_hash = pairs.pop("hash", None)
        if not received_hash:
            return None
        auth_date = int(pairs.get("auth_date", "0"))
        if abs(time.time() - auth_date) > 86400:
            return None
        data_check_string = "\n".join(f"{k}={v}" for k, v in sorted(pairs.items()))
        secret_key = hmac.new(b"WebAppData", BOT_TOKEN.encode(), hashlib.sha256).digest()
        calculated_hash = hmac.new(secret_key, data_check_string.encode(), hashlib.sha256).hexdigest()
        if not hmac.compare_digest(calculated_hash, received_hash):
            return None
        user = json.loads(pairs.get("user", "{}"))
        if not user.get("id"):
            return None
        return user
    except (ValueError, TypeError, json.JSONDecodeError):
        return None

def get_current_user():
    init_data = request.headers.get("X-Telegram-Init-Data", "")
    tg_user = validate_webapp_init_data(init_data)
    if tg_user:
        tid = str(tg_user["id"])
        user = User.query.filter_by(telegram_id=tid).first()
        if not user:
            user = User(telegram_id=tid)
            db.session.add(user)
        user.username = tg_user.get("username", "")[:80]
        user.first_name = tg_user.get("first_name", "کاربر")[:100]
        db.session.commit()
        return user, tg_user
    if not WEBAPP_AUTH_REQUIRED and request.args.get("demo") == "1":
        tid = "demo-user"
        user = User.query.filter_by(telegram_id=tid).first()
        if not user:
            user = User(telegram_id=tid, first_name="کاربر آزمایشی")
            db.session.add(user)
            db.session.commit()
        return user, {"id": tid, "first_name": user.first_name}
    return None, None

@app.get("/")
def index():
    return render_template("index.html", bot_username=BOT_USERNAME)

@app.get("/health")
def health():
    try:
        db.session.execute(text("SELECT 1"))
        return jsonify(ok=True, database="connected")
    except SQLAlchemyError:
        return jsonify(ok=False, database="error"), 503

@app.get("/api/me")
def me():
    user, tg = get_current_user()
    if not user:
        return jsonify(ok=False, error="سایت را از داخل ربات تلگرام باز کنید تا ورود امن انجام شود."), 401
    bots = Selfbot.query.filter_by(owner_telegram_id=user.telegram_id).order_by(Selfbot.id.desc()).all()
    ledger = Ledger.query.filter_by(telegram_id=user.telegram_id).order_by(Ledger.id.desc()).limit(8).all()
    return jsonify(ok=True, user={"id": tg["id"], "name": user.first_name,
        "username": user.username, "diamonds": user.diamonds,
        "is_admin": str(tg["id"]) in ADMIN_IDS},
        bots=[{"id": b.id, "title": b.title, "status": b.status} for b in bots],
        ledger=[{"amount": x.amount, "note": x.note,
                   "date": x.created_at.strftime("%Y-%m-%d %H:%M") if x.created_at else ""} for x in ledger])

@app.post("/api/selfbots")
def create_selfbot():
    user, tg = get_current_user()
    if not user:
        return jsonify(ok=False, error="ورود تلگرام تأیید نشد."), 401
    data = request.get_json(silent=True) or {}
    title = str(data.get("title", "سلف من")).strip()[:100] or "سلف من"
    # This creates a database record only. It does not start a Telegram user session.
    bot = Selfbot(owner_telegram_id=user.telegram_id, title=title, status="inactive")
    db.session.add(bot)
    db.session.commit()
    return jsonify(ok=True, bot={"id": bot.id, "title": bot.title, "status": bot.status},
                   message="ثبت شد؛ برای اجرای واقعی سلف باید به ماژول موجود سلف‌ساز متصل شود.")

@app.post("/api/admin/diamonds")
def admin_diamonds():
    user, tg = get_current_user()
    if not user or str(tg["id"]) not in ADMIN_IDS:
        return jsonify(ok=False, error="دسترسی ادمین لازم است."), 403
    data = request.get_json(silent=True) or {}
    target = str(data.get("telegram_id", "")).strip()
    try:
        amount = int(data.get("amount", 0))
    except (TypeError, ValueError):
        amount = 0
    note = str(data.get("note", "شارژ توسط مدیریت"))[:240]
    if not target or amount == 0 or abs(amount) > 1000000:
        return jsonify(ok=False, error="شناسه و مقدار معتبر وارد کنید."), 400
    target_user = User.query.filter_by(telegram_id=target).first()
    if not target_user:
        return jsonify(ok=False, error="کاربر پیدا نشد؛ کاربر باید یک بار سایت را از ربات باز کند."), 404
    if target_user.diamonds + amount < 0:
        return jsonify(ok=False, error="موجودی نمی‌تواند منفی شود."), 400
    target_user.diamonds += amount
    db.session.add(Ledger(telegram_id=target, amount=amount, note=note))
    db.session.commit()
    return jsonify(ok=True, diamonds=target_user.diamonds)

@app.errorhandler(500)
def server_error(_):
    db.session.rollback()
    return jsonify(ok=False, error="خطای داخلی؛ لاگ Railway را بررسی کنید."), 500

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=int(os.getenv("PORT", "8080")))
