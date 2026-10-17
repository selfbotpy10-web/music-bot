import aiosqlite
from datetime import datetime, timezone

def now():
    return datetime.now(timezone.utc).isoformat(timespec="seconds")

class Database:
    def __init__(self, path):
        self.path = path
        self.conn = None

    async def initialize(self):
        self.conn = await aiosqlite.connect(self.path)
        self.conn.row_factory = aiosqlite.Row
        await self.conn.execute("PRAGMA journal_mode=WAL")
        await self.conn.execute("PRAGMA foreign_keys=ON")
        await self.conn.executescript("""
        CREATE TABLE IF NOT EXISTS users(
          user_id INTEGER PRIMARY KEY, username TEXT NOT NULL DEFAULT '', full_name TEXT NOT NULL DEFAULT '',
          balance INTEGER NOT NULL DEFAULT 0, joined TEXT NOT NULL, blocked INTEGER NOT NULL DEFAULT 0
        );
        CREATE TABLE IF NOT EXISTS transactions(
          id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER NOT NULL, amount INTEGER NOT NULL,
          kind TEXT NOT NULL, reason TEXT NOT NULL, admin_id INTEGER, created TEXT NOT NULL
        );
        CREATE TABLE IF NOT EXISTS bots(
          id INTEGER PRIMARY KEY AUTOINCREMENT, owner_id INTEGER NOT NULL, token TEXT NOT NULL,
          bot_id INTEGER NOT NULL, username TEXT NOT NULL, name TEXT NOT NULL, status TEXT NOT NULL,
          created TEXT NOT NULL, UNIQUE(bot_id)
        );
        CREATE TABLE IF NOT EXISTS settings(key TEXT PRIMARY KEY, value TEXT NOT NULL);
        CREATE TABLE IF NOT EXISTS searches(
          id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER NOT NULL, query TEXT NOT NULL,
          results INTEGER NOT NULL, created TEXT NOT NULL
        );
        """)
        await self.conn.execute("INSERT OR IGNORE INTO settings(key,value) VALUES('build_price','500')")
        await self.conn.commit()

    async def close(self):
        if self.conn:
            await self.conn.close()
            self.conn = None

    async def ensure_user(self, uid, username, full_name):
        await self.conn.execute(
            "INSERT INTO users(user_id,username,full_name,joined) VALUES(?,?,?,?) "
            "ON CONFLICT(user_id) DO UPDATE SET username=excluded.username, full_name=excluded.full_name",
            (uid, username, full_name, now()))
        await self.conn.commit()

    async def balance(self, uid):
        cur = await self.conn.execute("SELECT balance FROM users WHERE user_id=?", (uid,))
        row = await cur.fetchone()
        return int(row["balance"]) if row else 0

    async def get_price(self):
        cur = await self.conn.execute("SELECT value FROM settings WHERE key='build_price'")
        row = await cur.fetchone()
        return int(row["value"]) if row else 500

    async def set_price(self, value, admin_id):
        await self.conn.execute("INSERT INTO settings(key,value) VALUES('build_price',?) ON CONFLICT(key) DO UPDATE SET value=excluded.value", (str(value),))
        await self.conn.execute("INSERT INTO transactions(user_id,amount,kind,reason,admin_id,created) VALUES(0,0,'price_change',?,?,?)", (f"قیمت جدید: {value}", admin_id, now()))
        await self.conn.commit()

    async def reserve_build(self, uid, price):
        # BEGIN IMMEDIATE makes balance check + debit atomic against competing requests.
        await self.conn.execute("BEGIN IMMEDIATE")
        try:
            cur = await self.conn.execute("SELECT balance FROM users WHERE user_id=?", (uid,))
            row = await cur.fetchone()
            if not row or int(row["balance"]) < price:
                await self.conn.rollback()
                return False
            await self.conn.execute("UPDATE users SET balance=balance-? WHERE user_id=?", (price, uid))
            await self.conn.execute("INSERT INTO transactions(user_id,amount,kind,reason,created) VALUES(?,?,'build_reserve','رزرو هزینه ساخت ربات',?)", (uid, -price, now()))
            await self.conn.commit()
            return True
        except:
            await self.conn.rollback()
            raise

    async def refund(self, uid, price, reason):
        await self.conn.execute("BEGIN IMMEDIATE")
        try:
            await self.conn.execute("UPDATE users SET balance=balance+? WHERE user_id=?", (price, uid))
            await self.conn.execute("INSERT INTO transactions(user_id,amount,kind,reason,created) VALUES(?,?,'refund',?,?)", (uid, price, reason, now()))
            await self.conn.commit()
        except:
            await self.conn.rollback()
            raise

    async def register_bot(self, owner_id, token, bot_id, username, name, price):
        await self.conn.execute("BEGIN IMMEDIATE")
        try:
            await self.conn.execute("INSERT INTO bots(owner_id,token,bot_id,username,name,status,created) VALUES(?,?,?,?,?,'active',?)",
                                    (owner_id, token, bot_id, username, name, now()))
            # Convert the existing reservation into a completed build transaction;
            # do not debit or count the same build twice.
            await self.conn.execute(
                "UPDATE transactions SET kind='build', reason='هزینه ساخت ربات موسیقی' "
                "WHERE id=(SELECT MAX(id) FROM transactions WHERE user_id=? AND kind='build_reserve')",
                (owner_id,))
            await self.conn.commit()
            cur = await self.conn.execute("SELECT last_insert_rowid()")
            return int((await cur.fetchone())[0])
        except:
            await self.conn.rollback()
            raise

    async def user_bots(self, uid):
        cur = await self.conn.execute("SELECT id,username,name,status,owner_id FROM bots WHERE owner_id=? ORDER BY id DESC", (uid,))
        return [dict(r) for r in await cur.fetchall()]

    async def get_bot(self, bot_id):
        cur = await self.conn.execute("SELECT * FROM bots WHERE id=?", (bot_id,))
        row = await cur.fetchone()
        return dict(row) if row else None

    async def all_bots(self):
        cur = await self.conn.execute("SELECT id,owner_id,username,name,status,created FROM bots ORDER BY id DESC LIMIT 100")
        return [dict(r) for r in await cur.fetchall()]

    async def set_bot_status(self, bot_id, status):
        await self.conn.execute("UPDATE bots SET status=? WHERE id=?", (status, bot_id))
        await self.conn.commit()

    async def user_stats(self, uid):
        cur = await self.conn.execute("SELECT balance,joined FROM users WHERE user_id=?", (uid,))
        row = await cur.fetchone()
        bots = await self.conn.execute("SELECT COUNT(*) FROM bots WHERE owner_id=?", (uid,))
        count = (await bots.fetchone())[0]
        return {"balance": row["balance"] if row else 0, "joined": row["joined"][:10] if row else "-", "bots": count}

    async def record_search(self, uid, query, count):
        await self.conn.execute("INSERT INTO searches(user_id,query,results,created) VALUES(?,?,?,?)", (uid, query[:250], count, now()))
        await self.conn.commit()

    async def system_stats(self):
        async def scalar(sql):
            c = await self.conn.execute(sql); r = await c.fetchone(); return r[0]
        return {
            "users": await scalar("SELECT COUNT(*) FROM users"),
            "bots": await scalar("SELECT COUNT(*) FROM bots"),
            "diamonds": await scalar("SELECT COALESCE(SUM(balance),0) FROM users"),
            "spent": await scalar("SELECT COALESCE(-SUM(amount),0) FROM transactions WHERE amount<0 AND kind IN ('build','build_reserve')"),
            "searches": await scalar("SELECT COUNT(*) FROM searches"),
        }

    async def adjust_diamonds(self, uid, amount, admin_id, reason):
        await self.conn.execute("BEGIN IMMEDIATE")
        try:
            cur = await self.conn.execute("SELECT balance FROM users WHERE user_id=?", (uid,))
            row = await cur.fetchone()
            if not row:
                await self.conn.rollback()
                raise ValueError("user not found")
            if int(row["balance"]) + amount < 0:
                await self.conn.rollback()
                raise ValueError("insufficient balance")
            await self.conn.execute("UPDATE users SET balance=balance+? WHERE user_id=?", (amount, uid))
            await self.conn.execute("INSERT INTO transactions(user_id,amount,kind,reason,admin_id,created) VALUES(?,?,'admin_adjust',?,?,?)", (uid, amount, reason[:250], admin_id, now()))
            await self.conn.commit()
        except:
            if self.conn.in_transaction: await self.conn.rollback()
            raise

    async def recent_transactions(self):
        cur = await self.conn.execute("SELECT id,user_id,amount,kind,reason,created FROM transactions ORDER BY id DESC LIMIT 20")
        rows = await cur.fetchall()
        return [f"#{r['id']} | کاربر {r['user_id']} | {r['amount']} 💎 | {r['kind']} | {r['reason'][:45]} | {r['created'][:16]}" for r in rows]
