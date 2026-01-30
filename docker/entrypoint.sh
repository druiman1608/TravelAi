#!/bin/sh
set -e

echo "--- Iniciando Setup de TravelAI ---"

# 1. Esperar a la base de datos
echo "Esperando a MySQL..."
until php -r "new PDO('mysql:host=db;dbname=travelai', 'travelai', 'Travelai1234?');" >/dev/null 2>&1; do
  sleep 2
done

# 2. Instalar dependencias de Composer si no existen
if [ ! -d "/var/www/vendor" ]; then
    echo "Instalando dependencias de Composer..."
    composer install --no-interaction --prefer-dist
fi

# 3. Crear y dar permisos a carpetas necesarias de Laravel
echo "Asegurando carpetas de storage y cache..."
mkdir -p /var/www/storage/framework/views \
         /var/www/storage/framework/cache \
         /var/www/storage/framework/sessions \
         /var/www/storage/framework/testing \
         /var/www/bootstrap/cache

# Ajustar permisos al usuario del contenedor
if id "www-data" >/dev/null 2>&1; then
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
else
    # fallback a UID/GID 1001 (usuario no-root en Docker)
    chown -R 1001:1001 /var/www/storage /var/www/bootstrap/cache
fi
chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true

# 4. Tareas de Laravel
echo "Ejecutando tareas de Laravel..."
php artisan key:generate --force || true
php artisan config:clear || true
php artisan cache:clear || true
php artisan view:clear || true
php artisan route:clear || true

echo "--- Todo listo, arrancando PHP-FPM ---"

exec "$@"