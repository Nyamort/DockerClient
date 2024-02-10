FROM composer:latest as setup

WORKDIR /app

COPY . /app

RUN composer install

FROM php:8.2-alpine

WORKDIR /app

COPY --from=setup /app/vendor /setup/vendor

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

CMD ["php", "vendor/bin/phpunit"]

