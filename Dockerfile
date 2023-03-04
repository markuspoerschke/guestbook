FROM php:8.1-apache as base

WORKDIR /var/www

ENV APACHE_DOCUMENT_ROOT /var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN docker-php-ext-install pdo pdo_mysql

FROM base AS builder

RUN apt-get update && \
    apt-get install -y git unzip libzip-dev && \
    apt-get clean

RUN docker-php-ext-install zip

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

FROM builder AS build

COPY ./ /var/www
RUN composer install --no-dev

FROM base AS runtime

COPY --from=build /var/www /var/www
