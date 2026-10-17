import os
from dotenv import load_dotenv
load_dotenv()

BUILDER_BOT_TOKEN = os.getenv("BUILDER_BOT_TOKEN", "").strip()
ADMIN_IDS = {int(x.strip()) for x in os.getenv("ADMIN_IDS", "").split(",") if x.strip().isdigit()}
DATABASE_PATH = os.getenv("DATABASE_PATH", "music_builder.sqlite3")
DEFAULT_BUILD_PRICE = 500
MAX_RESULTS = 10
