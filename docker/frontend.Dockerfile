FROM node:22-alpine

# Crear directorio de la app y cache de npm
WORKDIR /app
RUN mkdir -p /app/.npm
ENV NPM_CONFIG_CACHE=/app/.npm

# Crear usuario no-root
RUN addgroup -g 1001 nodegroup && adduser -u 1001 -G nodegroup -S nodeuser

# Dar permisos a /app
RUN chown -R nodeuser:nodegroup /app

# Cambiar a usuario no-root
USER nodeuser

# Copiar package.json y package-lock.json primero (para cache de docker)
COPY frontend/package*.json ./

# Instalar dependencias
RUN npm install

# Copiar toda la app
COPY frontend/ .

CMD ["npm", "run", "dev", "--", "--port", "8080", "--host"]