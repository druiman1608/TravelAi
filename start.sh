#!/bin/bash
set -e

echo "Iniciando proyecto TravelAI"

# Detener y eliminar contenedores antiguos
echo "--- Deteniendo contenedores antiguos ---"
docker compose down

# Limpiar node_modules y volumenes de MySQL para evitar conflictos de permisos
echo "--- Limpiando node_modules y volumenes de MySQL ---"
rm -rf ./frontend/node_modules
rm -rf ./docker/mysql_data

# Construir y levantar todo
echo "--- Levantando Docker Compose ---"
docker compose up --build -d

# Esperar a que Laravel y MySQL esten listos
echo "--- Esperando a que Laravel y MySQL esten disponibles ---"
echo "Esto puede tardar 10-20 segundos..."
sleep 15

# Ajustar permisos de Laravel
echo "--- Corrigiendo permisos de Laravel ---"
docker compose exec app sh -c "chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && chmod -R 775 /var/www/storage /var/www/bootstrap/cache"

# Mensaje final
echo "Proyecto TravelAI levantado correctamente"
echo "Frontend: http://localhost:8081"
echo "Laravel: http://localhost:8082"
echo "phpMyAdmin: http://localhost:8083"
