# syntax=docker/dockerfile:1.7

FROM composer:2 AS vendor
ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-progress \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

FROM node:20-alpine AS frontend
WORKDIR /var/www/html
COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm install
RUN npm run build

FROM alpine:3.20 AS app_code
WORKDIR /var/www/html
COPY . .
COPY --from=vendor /var/www/html/vendor ./vendor
COPY --from=vendor /var/www/html/composer.json ./composer.json
COPY --from=vendor /var/www/html/composer.lock ./composer.lock
COPY --from=frontend /var/www/html/public/build ./public/build

FROM php:8.2-fpm AS php
ARG WWWGROUP=33
ARG WWWUSER=33
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
        curl \
        git \
        libpq-dev \
        libzip-dev \
        unzip \
        zip \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
COPY --from=app_code /var/www/html /var/www/html
RUN chown -R ${WWWUSER}:${WWWGROUP} storage bootstrap/cache
EXPOSE 9000
CMD ["php-fpm"]

FROM nginx:1.27-alpine AS nginx
WORKDIR /var/www/html
COPY --from=app_code /var/www/html/public /var/www/html/public
COPY nginx.conf /etc/nginx/conf.d/default.conf
EXPOSE 80
