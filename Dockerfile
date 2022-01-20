FROM composer:1.9.3 as vendor

WORKDIR /tmp/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist


FROM php:7.4-apache
RUN a2enmod rewrite
#RUN service apache2 restart

COPY . /var/www/html
COPY --from=vendor /tmp/vendor/ /var/www/html/vendor/