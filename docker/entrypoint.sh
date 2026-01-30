#!/bin/sh
set -e

echo "--- Esperando a MySQL ---"
until php -r "new PDO('mysql:host=db;port=3306', 'travelai', 'Travelai1234?');" > /dev/null 2>&1; do
  sleep 2
done

echo "--- MySQL detectado! ---"

# Permisos
chmod -R 777 /var/www/storage /var/www/bootstrap/cache

echo "--- Arrancando PHP-FPM ---"
exec php-fpm