FROM php:7.4-apache

ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /work

RUN apt-get update && apt-get install -y libonig-dev git zip unzip && \
    docker-php-ext-install pdo_mysql mysqli mbstring

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./composer.json ./
RUN composer install
RUN composer dump-autoload
