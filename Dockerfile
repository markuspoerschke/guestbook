FROM composer as composer

COPY ./ /var/www
WORKDIR /var/www
RUN composer install --no-dev

FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY ./ /var/www
COPY --from=composer /var/www/vendor /var/www/vendor
