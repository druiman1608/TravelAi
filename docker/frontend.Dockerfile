FROM node:22-alpine

# Crear directorio de la app
WORKDIR /app

# Asegurarse de que el directorio .npm tenga permisos correctos
RUN mkdir -p /app/.npm && chown -R node:node /app/.npm
ENV NPM_CONFIG_CACHE=/app/.npm

# Copiar solo package.json primero para aprovechar el cache de Docker
COPY frontend/package*.json ./

# Instalar dependencias
RUN npm install

# Copiar el resto de la aplicación
COPY frontend/ .

# Establecer el usuario node para evitar problemas de permisos
USER node

# Asegurar permisos finales en /app
RUN chown -R node:node /app

# Comando por defecto
CMD ["sh", "-c", "npm run dev -- --port 8080 --host"]