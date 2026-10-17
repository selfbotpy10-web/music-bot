"""Security helpers for the base project."""
import re

def mask_token(token: str) -> str:
    if not token or ":" not in token:
        return "[masked]"
    prefix, secret = token.split(":", 1)
    return f"{prefix}:***"

def valid_token_shape(token: str) -> bool:
    return bool(re.fullmatch(r"\d{5,15}:[A-Za-z0-9_-]{20,}", token.strip()))
