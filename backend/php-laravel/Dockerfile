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

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файл .env в контейнер
COPY .env /var/www/html

# Копируем файлы бекенда в контейнер
COPY ./ /var/www/html

COPY backend-vhost-80.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем зависимости через Composer
RUN composer install --ignore-platform-req=ext-sockets

# Генерируем ключ приложения Laravel
RUN php artisan key:generate

# Устанавливаем правильные разрешения на директорию storage
RUN chown -R www-data:www-data storage
RUN chmod -R 775 storage

# Экспонируем порты 80 и 443
EXPOSE 80 443

# Команда для запуска Apache
CMD ["apache2-foreground"]
