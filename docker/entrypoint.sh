#!/bin/bash
set -e

echo "⏳ Waiting for MySQL to be ready..."
until php -r "new PDO('mysql:host=db;dbname=sivanadi', 'sivanadi', '?sOLht;-B&~k]c%=');" 2>/dev/null; do
    echo "  MySQL not ready yet, retrying in 3s..."
    sleep 3
done
echo "✅ MySQL is ready!"

cd /var/www

# Generate app key if not set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Run migrations (skip if tables already seeded from SQL dump)
echo "🗄️  Running migrations..."
php artisan migrate --force || echo "⚠️  Migration skipped or already applied"

# Cache config & routes for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "🚀 Starting PHP-FPM..."
exec php-fpm
