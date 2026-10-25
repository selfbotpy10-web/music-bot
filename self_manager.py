
import os
import asyncio
import threading
import logging

from flask import Blueprint, jsonify
from flask import current_app
from flask_sqlalchemy import SQLAlchemy
from cryptography.fernet import Fernet
from telethon import TelegramClient
from telethon.sessions import StringSession

log = logging.getLogger("nitro-self-manager")

# این ماژول به main.py وابسته نیست تا Import چرخه‌ای ایجاد نشود.
self_api = Blueprint("self_api", __name__, url_prefix="/api/self")

_clients = {}
_pending = {}
_lock = threading.RLock()
_loop = asyncio.new_event_loop()


def _loop_worker():
    asyncio.set_event_loop(_loop)
    _loop.run_forever()


threading.Thread(
    target=_loop_worker,
    daemon=True,
    name="nitro-telethon-loop",
).start()


def _run(coro, timeout=30):
    future = asyncio.run_coroutine_threadsafe(coro, _loop)
    return future.result(timeout=timeout)


def _config():
    api_id = os.getenv("API_ID", "").strip()
    api_hash = os.getenv("API_HASH", "").strip()
    key = os.getenv("SESSION_ENCRYPTION_KEY", "").strip()

    if not api_id or not api_hash or not key:
        raise RuntimeError(
            "در Railway متغیرهای API_ID، API_HASH و "
            "SESSION_ENCRYPTION_KEY را تنظیم کنید."
        )

    return int(api_id), api_hash, Fernet(key.encode())


def _get_owner():
    # Import داخل تابع انجام می‌شود؛ نه هنگام بارگذاری main.py.
    from main import get_current_user

    user, tg = get_current_user()
    if not user or not tg:
        return None
    return str(tg["id"])


def _get_saved_model():
    # این ماژول مدل جدیدی به دیتابیس اصلی اضافه نمی‌کند.
    from main import db

    class SavedSession(db.Model):
        __tablename__ = "nitro_telethon_sessions"

        id = db.Column(db.Integer, primary_key=True)
        owner_telegram_id = db.Column(
            db.String(32), unique=True, nullable=False, index=True
        )
        encrypted_session = db.Column(db.LargeBinary, nullable=False)
        phone_hint = db.Column(db.String(40), nullable=False, default="")
        created_at = db.Column(db.DateTime, server_default=db.func.now())

    return SavedSession


async def _status(owner):
    SavedSession = _get_saved_model()
    row = SavedSession.query.filter_by(owner_telegram_id=owner).first()

    with _lock:
        client = _clients.get(owner)

    connected = False
    if client is not None:
        try:
            connected = (
                client.is_connected()
                and await client.is_user_authorized()
            )
        except Exception:
            connected = False

    return {
        "ok": True,
        "connected": bool(connected),
        "running": bool(connected),
        "has_saved_session": row is not None,
        "phone_hint": row.phone_hint if row else "",
    }


@self_api.get("/status")
def status():
    owner = _get_owner()
    if owner is None:
        return jsonify(ok=False, error="ورود امن تلگرام تأیید نشد."), 401

    try:
        return jsonify(_run(_status(owner)))
    except Exception:
        log.exception("Unable to get self status")
        return jsonify(ok=False, error="دریافت وضعیت ناموفق بود."), 500


async def _disconnect(owner):
    SavedSession = _get_saved_model()

    with _lock:
        client = _clients.pop(owner, None)
        pending = _pending.pop(owner, None)

    for item in (client, pending):
        if item is not None:
            try:
                await item.disconnect()
            except Exception:
                pass

    row = SavedSession.query.filter_by(owner_telegram_id=owner).first()
    if row:
        # فقط نشست ذخیره‌شدهٔ همین کاربر حذف می‌شود.
        from main import db
        db.session.delete(row)
        db.session.commit()

    return {"ok": True, "message": "نشست محلی حذف شد."}


@self_api.post("/disconnect")
def disconnect():
    owner = _get_owner()
    if owner is None:
        return jsonify(ok=False, error="ورود امن تلگرام تأیید نشد."), 401

    try:
        return jsonify(_run(_disconnect(owner)))
    except Exception:
        log.exception("Unable to disconnect self")
        return jsonify(ok=False, error="قطع اتصال ناموفق بود."), 500


def register(app):
    if not app.blueprints.get(self_api.name):
        app.register_blueprint(self_api)


def get_manager_status():
    return {
        "ok": True,
        "message": (
            "ماژول وضعیت آماده است؛ ورود و اجرای خودکار نشست هنوز "
            "در این فایل پیاده‌سازی نشده است."
        ),
    }
