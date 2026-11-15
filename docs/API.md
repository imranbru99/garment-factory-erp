# API

Base path `/api`. Authenticated routes use Sanctum and the `api` rate limiter (120 requests per minute).

## POST /api/v1/scans

Auth required.

```json
{ "barcode": "BND-0001", "direction": "in", "qty": 20 }
```

Send `Idempotency-Key`. The same key returns the original scan and does not insert a second row.

## GET /api/v1/orders

Auth required. Returns the latest 50 orders visible to the caller after the unit and portal scopes.

## POST /api/v1/issues

Auth required.

```json
{ "name": "Line 3 waiting for labels", "severity": "high", "line_id": 3 }
```

Creates a `floor_raise` issue through the issue engine.

## POST /api/v1/webhooks

No bearer token. Header `X-Signature` is hex HMAC-SHA256 of the raw body using `WEBHOOK_SECRET`. A wrong signature is HTTP 401. A valid call is stored in `notification_logs`.

## Floor offline queue

`/floor-pwa` keeps failed posts in `localStorage` under `padma-floor-queue` and retries when the browser is online. The idempotency key is a UUID created before the first attempt.
