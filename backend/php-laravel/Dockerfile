FROM php:8.1-apache

RUN apt-get update && \
    apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

RUN a2enmod ssl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY .env /var/www/html

COPY ./ /var/www/html

COPY backend-vhost-80.conf /etc/apache2/sites-available/000-default.conf

RUN composer install --ignore-platform-req=ext-gd --ignore-platform-req=ext-exif

RUN php artisan key:generate

RUN chown -R www-data:www-data storage
RUN chmod -R 775 storage

EXPOSE 80 443

CMD ["apache2-foreground"]
