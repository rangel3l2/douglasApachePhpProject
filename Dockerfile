FROM php:apache

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql

COPY ./app /var/www/html/
