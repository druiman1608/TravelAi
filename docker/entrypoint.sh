#!/bin/sh

set -e

echo "Esperando a MySQL..."

# Esperar hasta que MySQL este listo
until php -r "new PDO('mysql:host=db;dbname=travelai', 'travelai', 'Travelai1234?');" >/dev/null 2>&1; do
  sleep 2
done

echo "MySQL listo"

echo "Ajustando permisos..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "Instalando dependencias..."
composer install --no-interaction --prefer-dist

# Generar APP_KEY si no existe
if [ ! -f /var/www/.env ] || ! grep -q "APP_KEY=base64" /var/www/.env; then
    echo "Generando APP_KEY..."
    php artisan key:generate --force
else
    echo "APP_KEY ya existe, no es necesario generar una nueva key."
fi

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Arrancando PHP-FPM..."    
exec "$@"