#!/bin/sh
set -e

echo "Esperando a MySQL..."

# Esperar a que MySQL esté listo
until php -r "new PDO('mysql:host=db;dbname=travelai', 'travelai', 'Travelai1234?');" >/dev/null 2>&1; do
  sleep 2
done

echo "MySQL listo"

echo "Ajustando permisos de Laravel..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache || true
chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true

echo "Instalando dependencias si hace falta..."
if [ ! -d /var/www/vendor ]; then
    composer install --no-interaction --prefer-dist
else
    echo "Dependencias ya instaladas"
fi

# Generar APP_KEY si no existe
if ! php artisan key:generate --check >/dev/null 2>&1; then
    echo "Generando APP_KEY..."
    php artisan key:generate --force
else
    echo "APP_KEY ya existe"
fi

#echo "Ejecutando migraciones y seeders..."
#php artisan migrate --force --seed

echo "Arrancando PHP-FPM..."
exec "$@"