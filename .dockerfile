FROM php:7-fpm

RUN apt-get update -y && apt-get install -y libmcrypt-dev zlib1g-dev git
RUN docker-php-ext-install pdo zip mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
