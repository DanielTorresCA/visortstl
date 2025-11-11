FROM php:8.2.12-fpm-alpine
WORKDIR /var/www/html

RUN apk add --no-cache \
      bash git curl icu-dev oniguruma-dev libzip-dev \
      libpng-dev libjpeg-turbo-dev libwebp-dev \
  && docker-php-ext-configure gd --with-jpeg --with-webp \
  && docker-php-ext-install pdo_mysql bcmath intl zip gd opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
CMD ["php-fpm"]