# Используем официальный образ Node.js в качестве базового образа для сборки фронтенда
FROM node:latest AS builder

# Установка рабочей директории
WORKDIR /app

# Копирование файлов package.json и package-lock.json
COPY package*.json ./

# Установка зависимостей
RUN npm install

# Копирование и сборка приложения
COPY . .
RUN npm run build

# Экспонирование порта 80
EXPOSE 80

CMD [ "node", ".output/server/index.mjs" ]
