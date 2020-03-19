FROM php:7.4-fpm
RUN apt-get update \
    && docker-php-ext-install pdo_mysql mysqli
 COPY --from=composer:latest /usr/bin/composer /usr/bin/composer