# Production image: PHP-FPM 8.3, Phalcon 5.22, OPcache with the preload script of `php quark optimize`.
FROM php:8.3-fpm

ARG PHALCON_VERSION=5.22.1

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions phalcon-${PHALCON_VERSION} opcache pdo_mysql redis apcu intl @composer

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini

WORKDIR /var/www/app

COPY composer.json ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction

COPY . .

ENV APP_ENV=production

# A first autoloader to boot the console, then `optimize`: authoritative classmap, compiled constants,
# configuration, routes and views, and bootstrap/compile/preload.php.
RUN composer dump-autoload --no-dev --no-scripts --no-interaction \
    && php quark optimize --no-dev \
    && chown -R www-data:www-data storage bootstrap/compile
