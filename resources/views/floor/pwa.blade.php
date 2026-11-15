<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Floor scan</title>
    <link rel="manifest" href="/floor.webmanifest">
    <style>
        body { font-family: sans-serif; margin: 0; padding: 16px; background: #111; color: #fff; }
        button, input { font-size: 24px; padding: 16px; width: 100%; margin: 8px 0; }
        button { background: #16a34a; color: #fff; border: 0; }
    </style>
</head>
<body>
    <h1>Floor scan</h1>
    <input id="barcode" placeholder="Barcode" inputmode="text">
    <input id="token" placeholder="API token" type="password">
    <button type="button" onclick="sendScan('in')">Receive</button>
    <button type="button" onclick="sendScan('out')">Issue</button>
    <button type="button" onclick="raiseIssue()">Raise issue</button>
    <pre id="log"></pre>
    <script>
        const queueKey = 'padma-floor-queue';
        function queue() { return JSON.parse(localStorage.getItem(queueKey) || '[]'); }
        function save(items) { localStorage.setItem(queueKey, JSON.stringify(items)); }
        async function flush() {
            const items = queue();
            const left = [];
            for (const item of items) {
                try {
                    const response = await fetch(item.url, { method: 'POST', headers: item.headers, body: item.body });
                    if (!response.ok && response.status !== 401) left.push(item);
                    document.getElementById('log').textContent = await response.text();
                } catch (error) {
                    left.push(item);
                }
            }
            save(left);
        }
        function enqueue(path, payload) {
            const key = crypto.randomUUID();
            const item = {
                url: '/api/v1' + path,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + document.getElementById('token').value,
                    'Idempotency-Key': key
                },
                body: JSON.stringify(payload)
            };
            const items = queue();
            items.push(item);
            save(items);
            flush();
        }
        function sendScan(direction) {
            enqueue('/scans', { barcode: document.getElementById('barcode').value, direction: direction, qty: 1 });
        }
        function raiseIssue() {
            enqueue('/issues', { name: 'Floor issue ' + document.getElementById('barcode').value, severity: 'high' });
        }
        window.addEventListener('online', flush);
        flush();
    </script>
</body>
</html>
