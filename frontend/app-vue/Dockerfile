# Используем официальный образ Node.js в качестве базового образа для сборки фронтенда
FROM node:latest AS builder

# Установка рабочей директории
WORKDIR /app

# Копирование файлов package.json и package-lock.json
COPY package*.json ./

# Установка зависимостей

# Копирование и сборка приложения
COPY . .
RUN npm run build

# Используем официальный образ Nginx в качестве основного образа
FROM nginx:latest

# Копирование статических файлов сборки Vue.js в директорию Nginx
COPY --from=builder /app/dist /usr/share/nginx/html

# Экспонирование порта 80
EXPOSE 80

# Команда для запуска Nginx в режиме демона
CMD ["nginx", "-g", "daemon off;"]
