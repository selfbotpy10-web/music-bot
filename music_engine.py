import aiohttp
import asyncio
import time

_CACHE = {}
_CACHE_TTL = 300

async def search_tracks(query: str, limit: int = 10):
    query = query.strip()
    if not query:
        return []
    key = query.casefold()
    now = time.time()
    cached = _CACHE.get(key)
    if cached and now - cached[0] < _CACHE_TTL:
        return cached[1][:limit]
    url = "https://itunes.apple.com/search"
    params = {"term": query, "media": "music", "entity": "song", "limit": min(max(limit, 1), 10)}
    timeout = aiohttp.ClientTimeout(total=12)
    async with aiohttp.ClientSession(timeout=timeout) as session:
        async with session.get(url, params=params, headers={"User-Agent": "MusicBotBuilder/1.0"}) as resp:
            resp.raise_for_status()
            data = await resp.json(content_type=None)
    results = data.get("results", [])
    tracks = []
    seen = set()
    for item in results:
        if not item.get("trackName") or not item.get("artistName"):
            continue
        ident = item.get("trackId") or item.get("trackViewUrl")
        if ident in seen:
            continue
        seen.add(ident)
        tracks.append({
            "trackName": item.get("trackName"),
            "artistName": item.get("artistName"),
            "albumName": item.get("collectionName", "نامشخص"),
            "previewUrl": item.get("previewUrl"),
            "trackViewUrl": item.get("trackViewUrl"),
            "artworkUrl": item.get("artworkUrl100"),
            "durationMs": item.get("trackTimeMillis"),
            "genre": item.get("primaryGenreName", "نامشخص"),
            "source": "Apple iTunes Search API"
        })
    _CACHE[key] = (now, tracks)
    return tracks[:limit]

def track_text(track):
    duration = track.get("durationMs")
    duration_text = f"{int(duration)//60000}:{(int(duration)//1000)%60:02d}" if duration else "نامشخص"
    preview = "موجود" if track.get("previewUrl") else "در دسترس نیست"
    return (
        "🎵 اطلاعات آهنگ\n\n"
        f"🎧 عنوان: {track.get('trackName','نامشخص')}\n"
        f"🎤 هنرمند: {track.get('artistName','نامشخص')}\n"
        f"💿 آلبوم: {track.get('albumName','نامشخص')}\n"
        f"⏱ مدت: {duration_text}\n"
        f"🎼 سبک: {track.get('genre','نامشخص')}\n"
        f"▶️ پیش‌نمایش رسمی: {preview}\n"
        f"🌐 منبع: {track.get('source','نامشخص')}\n\n"
        "برای پخش یا اطلاعات کامل، از دکمه‌های رسمی زیر استفاده کنید."
    )
