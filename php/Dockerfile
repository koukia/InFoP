FROM php:7.4-fpm
# FROM php:7.4-fpm-alpine
RUN apt-get update \
    && docker-php-ext-install pdo_mysql
#   libonig-dev docker-php-ext-install \
    # pdo_mysql mysqli mbstring
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
