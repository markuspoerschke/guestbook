FROM php:7.0.8-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY ./ /var/www/html
