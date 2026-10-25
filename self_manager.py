
import os
import asyncio
import threading
from concurrent.futures import TimeoutError as FutureTimeout
from flask import Blueprint, request, jsonify
from cryptography.fernet import Fernet, InvalidToken
from telethon import TelegramClient
from telethon.sessions import StringSession
from telethon.errors import (
    SessionPasswordNeededError,
    PhoneCodeInvalidError,
    PhoneCodeExpiredError,
    PasswordHashInvalidError,
    FloodWaitError,
)

from main import app, db, get_current_user

self_api = Blueprint("self_api", __name__, url_prefix="/api/self")

API_ID = int(os.getenv("API_ID", "0"))
API_HASH = os.getenv("API_HASH", "").strip()
ENCRYPTION_KEY = os.getenv("SESSION_ENCRYPTION_KEY", "").strip()

if ENCRYPTION_KEY:
    cipher = Fernet(ENCRYPTION_KEY.encode())
else:
    cipher = None


class SavedSession(db.Model):
    __tablename__ = "saved_telethon_sessions"

    id = db.Column(db.Integer, primary_key=True)
    owner_telegram_id = db.Column(
        db.String(32), unique=True, nullable=False, index=True
    )
    encrypted_session = db.Column(db.LargeBinary, nullable=False)
    phone_hint = db.Column(db.String(40), nullable=False, default="")
    created_at = db.Column(db.DateTime, server_default=db.func.now())


class TelethonManager:
    def __init__(self):
        self.loop = asyncio.new_event_loop()
        self.thread = threading.Thread(
            target=self._run_loop, daemon=True, name="telethon-manager"
        )
        self.clients = {}
        self.pending = {}
        self.lock = threading.RLock()
        self.thread.start()

    def _run_loop(self):
        asyncio.set_event_loop(self.loop)
        self.loop.run_forever()

    def call(self, coroutine, timeout=35):
        future = asyncio.run_coroutine_threadsafe(coroutine, self.loop)
        try:
            return future.result(timeout=timeout)
        except FutureTimeout:
            future.cancel()
            raise TimeoutError("عملیات تلگرام بیش از حد طول کشید.")

    def check_config(self):
        if not API_ID or not API_HASH or not cipher:
            raise RuntimeError(
                "متغیرهای API_ID، API_HASH و SESSION_ENCRYPTION_KEY "
                "در Railway تنظیم نشده‌اند."
            )

    async def request_code(self, owner_id, phone):
        self.check_config()

        old = self.pending.pop(owner_id, None)
        if old:
            try:
                await old["client"].disconnect()
            except Exception:
                pass

        saved = SavedSession.query.filter_by(
            owner_telegram_id=owner_id
        ).first()

        if saved:
            raise ValueError(
                "برای این کاربر نشست ذخیره‌شده وجود دارد؛ "
                "ابتدا وضعیت یا قطع اتصال را بررسی کنید."
            )

        client = TelegramClient(StringSession(), API_ID, API_HASH)
        await client.connect()

        try:
            sent = await client.send_code_request(phone)
        except Exception:
            await client.disconnect()
            raise

        self.pending[owner_id] = {
            "client": client,
            "phone": phone,
            "phone_code_hash": sent.phone_code_hash,
        }

        return {"ok": True, "message": "کد تأیید به تلگرام ارسال شد."}

    async def submit_code(self, owner_id, code, password):
        self.check_config()

        pending = self.pending.get(owner_id)
        if not pending:
            raise ValueError(
                "درخواست کد فعال نیست؛ شماره را دوباره وارد کنید."
            )

        client = pending["client"]

        try:
            try:
                await client.sign_in(
                    phone=pending["phone"],
                    code=code,
                    phone_code_hash=pending["phone_code_hash"],
                )
            except SessionPasswordNeededError:
                if not password:
                    return {
                        "ok": False,
                        "need_password": True,
                        "message": "رمز دومرحله‌ای تلگرام لازم است.",
                    }
                await client.sign_in(password=password)

            if not await client.is_user_authorized():
                raise ValueError("ورود حساب تأیید نشد.")

            me = await client.get_me()
            session_string = client.session.save()
            encrypted = cipher.encrypt(session_string.encode())

            saved = SavedSession.query.filter_by(
                owner_telegram_id=owner_id
            ).first()

            if saved:
                saved.encrypted_session = encrypted
                saved.phone_hint = pending["phone"][-4:]
            else:
                saved = SavedSession(
                    owner_telegram_id=owner_id,
                    encrypted_session=encrypted,
                    phone_hint=pending["phone"][-4:],
                )
                db.session.add(saved)

            db.session.commit()
            self.clients[owner_id] = client
            self.pending.pop(owner_id, None)

            return {
                "ok": True,
                "message": "حساب با موفقیت متصل شد.",
                "account": {
                    "id": me.id,
                    "username": me.username or "",
                    "phone_hint": pending["phone"][-4:],
                },
            }

        except (PhoneCodeInvalidError, PhoneCodeExpiredError):
            raise ValueError("کد اشتباه است یا اعتبار آن تمام شده است.")
        except PasswordHashInvalidError:
            raise ValueError("رمز دومرحله‌ای نادرست است.")
        except Exception:
            if not client.is_connected():
                self.pending.pop(owner_id, None)
            raise

    async def status(self, owner_id):
        saved = SavedSession.query.filter_by(
            owner_telegram_id=owner_id
        ).first()

        if not saved:
            return {"connected": False, "running": False}

        client = self.clients.get(owner_id)
        connected = bool(client and client.is_connected())

        authorized = False
        if connected:
            try:
                authorized = await client.is_user_authorized()
            except Exception:
                authorized = False

        return {
            "connected": authorized,
            "running": authorized,
            "phone_hint": saved.phone_hint,
        }

    async def disconnect(self, owner_id):
        pending = self.pending.pop(owner_id, None)
        if pending:
            try:
                await pending["client"].disconnect()
            except Exception:
                pass

        client = self.clients.pop(owner_id, None)
        if client:
            try:
                await client.log_out()
            except Exception:
                try:
                    await client.disconnect()
                except Exception:
                    pass

        saved = SavedSession.query.filter_by(
            owner_telegram_id=owner_id
        ).first()

        if saved:
            db.session.delete(saved)
            db.session.commit()

        return {"ok": True, "message": "نشست ذخیره‌شده حذف شد."}


manager = TelethonManager()


def authenticated_owner():
    user, tg = get_current_user()
    if not user or not tg:
        return None, (
            jsonify(ok=False, error="ورود امن تلگرام تأیید نشد."),
            401,
        )
    return str(tg["id"]), None


def run_operation(coro, timeout=35):
    try:
        return manager.call(coro, timeout=timeout)
    except ValueError as exc:
        return {"ok": False, "error": str(exc)}, 400
    except FloodWaitError as exc:
        return {
            "ok": False,
            "error": f"تلگرام محدودیت زمانی گذاشته است؛ {exc.seconds} ثانیه صبر کنید.",
        }, 429
    except RuntimeError as exc:
        return {"ok": False, "error": str(exc)}, 500
    except TimeoutError as exc:
        return {"ok": False, "error": str(exc)}, 504
    except Exception:
        app.logger.exception("Self manager operation failed")
        return {"ok": False, "error": "عملیات ناموفق بود؛ تنظیمات سرور را بررسی کنید."}, 500


@self_api.get("/status")
def self_status():
    owner, error = authenticated_owner()
    if error:
        return error

    result = run_operation(manager.status(owner))
    if isinstance(result, tuple):
        return jsonify(result[0]), result[1]
    return jsonify(ok=True, **result)


@self_api.post("/request-code")
def request_code():
    owner, error = authenticated_owner()
    if error:
        return error

    data = request.get_json(silent=True) or {}
    phone = str(data.get("phone", "")).strip()

    if not phone or len(phone) > 32:
        return jsonify(ok=False, error="شماره تلفن معتبر وارد کنید."), 400

    result = run_operation(manager.request_code(owner, phone), timeout=45)
    if isinstance(result, tuple):
        return jsonify(result[0]), result[1]
    return jsonify(result)


@self_api.post("/verify-code")
def verify_code():
    owner, error = authenticated_owner()
    if error:
        return error

    data = request.get_json(silent=True) or {}
    code = str(data.get("code", "")).strip()
    password = str(data.get("password", ""))

    if not code or len(code) > 20 or len(password) > 256:
        return jsonify(ok=False, error="کد یا رمز واردشده معتبر نیست."), 400

    result = run_operation(
        manager.submit_code(owner, code, password),
        timeout=45,
    )
    if isinstance(result, tuple):
        return jsonify(result[0]), result[1]
    return jsonify(result)


@self_api.post("/disconnect")
def disconnect():
    owner, error = authenticated_owner()
    if error:
        return error

    result = run_operation(manager.disconnect(owner), timeout=45)
    if isinstance(result, tuple):
        return jsonify(result[0]), result[1]
    return jsonify(result)


app.register_blueprint(self_api)
