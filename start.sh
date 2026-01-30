#!/bin/bash
set -e

echo "Iniciando proyecto TravelAI"

# 1. Parar y eliminar contenedores antiguos
echo "--- Deteniendo contenedores antiguos ---"
docker compose down

# 2. Limpiar volúmenes de MySQL y Laravel/frontend si es necesario
echo "--- Limpiando volúmenes y node_modules ---"
rm -rf ./frontend/node_modules
rm -rf ./docker/mysql_data

# 3. Levantar todo
echo "--- Levantando Docker Compose ---"
docker compose up --build