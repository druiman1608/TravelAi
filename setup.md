# TravelAI - Sistema de Gestión de Viajes con IA

Este es el proyecto de TFG para la gestión de vuelos y hoteles. La aplicación utiliza **Laravel 11** para el Backend, **React** para el Frontend y **MySQL** como base de datos, todo levantado con **Docker**.

## Requisitos Previos

Antes de empezar, tener instalado:

- Docker

## Configuración Inicial (Solo la primera vez)

### 1. Variables de Entorno

Crea el archivo de configuración del Backend:

- Copia el archivo "backend/.env.example" y renombrarlo como "backend/.env".
- Pegar los datos de la DB, tienen que coincidir con los del "docker-compose.yml":

  DB_CONNECTION=mysql
  DB_HOST=mysql
  DB_PORT=3306
  DB_DATABASE=travelai
  DB_USERNAME=root
  DB_PASSWORD=root

- Tambien puedes copiar el contenido de .env.setup y pegarlo en .env (.env.setup es una copia del .env ya funcionando).

### 2. Levantar los Contenedores

Desde la raíz del proyecto (TravelAI):
docker-compose up -d --build

### 3. Instalar dependencias para laravel

docker exec -it travelai-app composer install
docker exec -it travelai-app php artisan key:generate
docker exec -it travelai-app php artisan migrate --seed

## Direcciones de acceso:

Frontend (React): http://localhost:3001
Backend API (Laravel): http://localhost:8081
phpMyAdmin: http://localhost:8082

## Comandos utiles:

Ver Logs del Frontend (para errores): docker logs -f travelai-frontend
Limpiar caché de Laravel: docker exec -it travelai-app php artisan config:clear
Refrescar Base de Datos: docker exec -it travelai-app php artisan migrate:fresh --seed
