
import os
import sys
import time
import signal
import subprocess

PORT = os.environ.get("PORT", "8080")
processes = []
stopping = False


def stop_all(*_):
    global stopping

    if stopping:
        return

    stopping = True
    print("Stopping web app and Telegram bot...", flush=True)

    for process in processes:
        if process.poll() is None:
            process.terminate()

    for process in processes:
        if process.poll() is None:
            try:
                process.wait(timeout=10)
            except subprocess.TimeoutExpired:
                process.kill()

    sys.exit(0)


def main():
    for filename in ("main.py", "bot.py"):
        if not os.path.isfile(filename):
            raise FileNotFoundError(
                f"Required file not found: {filename}"
            )

    signal.signal(signal.SIGTERM, stop_all)
    signal.signal(signal.SIGINT, stop_all)

    print("Starting Flask web application...", flush=True)

    web = subprocess.Popen([
        sys.executable,
        "-m", "gunicorn",
        "--workers", "1",
        "--bind", f"0.0.0.0:{PORT}",
        "--access-logfile", "-",
        "--error-logfile", "-",
        "main:app",
    ])
    processes.append(web)

    time.sleep(3)

    if web.poll() is not None:
        raise RuntimeError(
            "Gunicorn failed. Check the web application logs."
        )

    print("Starting Telegram bot...", flush=True)

    bot = subprocess.Popen([
        sys.executable,
        "-u",
        "bot.py",
    ])
    processes.append(bot)

    print("Web app and Telegram bot have been started.", flush=True)

    while True:
        for process in processes:
            code = process.poll()

            if code is not None:
                print(
                    f"Process stopped unexpectedly: exit code {code}",
                    flush=True,
                )
                stop_all()

        time.sleep(2)


if __name__ == "__main__":
    main()
