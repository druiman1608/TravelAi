#!/bin/sh
set -e

echo "--- Iniciando Setup de TravelAI ---"

# 1. Esperar a la base de datos
echo "Esperando a MySQL..."
until php -r "new PDO('mysql:host=db;dbname=travelai', 'travelai', 'Travelai1234?');" >/dev/null 2>&1; do
  sleep 2
done

# 2. Instalar dependencias si no existen
if [ ! -d "/var/www/vendor" ]; then
    echo "Instalando dependencias de Composer..."
    composer install --no-interaction --prefer-dist
fi

# 3. Asegurar carpetas necesarias
mkdir -p /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true

# 4. Tareas de Laravel
php artisan key:generate --force || true
php artisan config:clear || true

echo "--- Todo listo, arrancando PHP-FPM ---"

exec "$@"