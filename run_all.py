
import os
import sys
import signal
import subprocess
import time

PORT = os.environ.get("PORT", "8080")

processes = []

def shutdown(*args):
    print("در حال متوقف کردن سرویس‌ها...", flush=True)

    for process in processes:
        if process.poll() is None:
            process.terminate()

    for process in processes:
        try:
            process.wait(timeout=10)
        except subprocess.TimeoutExpired:
            process.kill()

    sys.exit(0)

signal.signal(signal.SIGTERM, shutdown)
signal.signal(signal.SIGINT, shutdown)

def main():
    if not os.path.isfile("main.py"):
        raise FileNotFoundError("فایل main.py پیدا نشد.")

    if not os.path.isfile("bot.py"):
        raise FileNotFoundError("فایل bot.py پیدا نشد.")

    web = subprocess.Popen([
        sys.executable, "-m", "gunicorn",
        "main:app",
        "--bind", f"0.0.0.0:{PORT}",
        "--workers", "1",
        "--access-logfile", "-"
    ])

    processes.append(web)

    time.sleep(2)

    if web.poll() is not None:
        raise RuntimeError(
            "وب‌اپ اجرا نشد؛ خطاهای Gunicorn و main.py را بررسی کن."
        )

    bot = subprocess.Popen([
        sys.executable, "-u", "bot.py"
    ])

    processes.append(bot)

    print("وب‌اپ و ربات شروع به اجرا کردند.", flush=True)

    while True:
        for process in processes:
            code = process.poll()

            if code is not None:
                print(
                    f"یکی از سرویس‌ها متوقف شد؛ کد خروج: {code}",
                    flush=True
                )
                shutdown()

        time.sleep(3)

if __name__ == "__main__":
    main()
