# Используем официальный образ PHP 8.1 с Apache
FROM php:8.1-apache

# Устанавливаем необходимые зависимости
RUN apt-get update && \
    apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Активируем модуль rewrite
RUN a2enmod rewrite

RUN a2enmod ssl

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файл .env в контейнер
COPY .env /var/www/html

# Копируем файлы бекенда в контейнер
COPY ./ /var/www/html

# Экспонируем порты 80 и 443
EXPOSE 80 443

# Команда для запуска Apache
CMD ["apache2-foreground"]
