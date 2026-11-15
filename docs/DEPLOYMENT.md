# Deployment

Target is a FastPanel or nginx host with PHP 8.3+, MySQL 8, Redis, and a queue supervisor.

## First boot

```bash
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Set `DB_CONNECTION=mysql`. Keep `APP_TIMEZONE=UTC`. Set `APP_URL`, `WEBHOOK_SECRET`, and mail. Leave `AI_FEATURES_ENABLED=false` until a provider key is stored through laravel-ai-hub.

## Processes

- php-fpm or `php artisan serve` only for a local demo
- cron: `* * * * * php /path/artisan schedule:run`
- supervisor program: `php /path/artisan queue:work --sleep=1 --tries=3 --timeout=120`
- Redis for cache, session and queue when more than one app server is used. Horizon is installed for that layout (`php artisan horizon`)

## nginx

```nginx
root /var/www/garment/public;
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## Backup

Copy the MySQL database with `mysqldump` and the `storage/app` tree. `audit_logs` is part of the dump. Do not edit those rows; the model rejects updates and deletes.

## Fonts

Bangla PDFs need a Unicode font in `storage/fonts`. Point `laravel-unicode-pdf` at that directory. The package default still mentions a Windows path on the author's computer. See `docs/PACKAGE_GAPS.md`.

## Demo on SQLite

`DB_CONNECTION=sqlite` and `database/database.sqlite` are enough for a review. Foreign keys are indexed columns rather than database constraints. Use MySQL before go-live.
