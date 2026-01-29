#!/bin/sh
set -e

echo "--- Iniciando Setup de TravelAI ---"

# 1. Asegurar permisos de las carpetas de Laravel
# Esto lo hace como root al arrancar
echo "Ajustando permisos de carpetas..."
chown -R www-data:www-data /var/www
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# 2. Esperar a la base de datos
echo "Esperando a MySQL..."
until php -r "new PDO('mysql:host=db;dbname=travelai', 'travelai', 'Travelai1234?');" >/dev/null 2>&1; do
  sleep 2
done

# 3. Instalacion de dependencias si no existen (como www-data)
if [ ! -d "/var/www/vendor" ]; then
    echo "Instalando dependencias de Composer..."
    su -s /bin/sh -c "composer install --no-interaction --prefer-dist" www-data
fi

# 4. Tareas de Laravel
su -s /bin/sh -c "php artisan config:clear" www-data

echo "--- Todo listo, arrancando PHP-FPM ---"

exec "$@"