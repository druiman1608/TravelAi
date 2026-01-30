FROM node:22-alpine

WORKDIR /app

USER root

CMD ["sh", "-c", "npm install && npm run dev -- --port 8080 --host"]