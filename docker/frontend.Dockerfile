FROM node:22-alpine

# Crear directorio de la app
WORKDIR /app

# Cache de npm en contenedor para evitar problemas de permisos
RUN mkdir -p /app/.npm \
    && chown -R node:node /app/.npm
ENV NPM_CONFIG_CACHE=/app/.npm

# Crear usuario no-root
RUN addgroup -g 1001 nodegroup && adduser -u 1001 -G nodegroup -S node
USER node

# Copiar solo package.json primero para aprovechar cache de Docker
COPY frontend/package*.json ./

# Instalar dependencias
RUN npm install

# Copiar toda la app
COPY frontend/ .

# Asegurar permisos
RUN chown -R node:node /app

# Comando por defecto
CMD ["sh", "-c", "npm run dev -- --port 8080 --host"]