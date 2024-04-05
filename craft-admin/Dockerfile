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

RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

COPY .env /var/www/html

COPY ./ /var/www/html

EXPOSE 80 443

CMD ["apache2-foreground"]
