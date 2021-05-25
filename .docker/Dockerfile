FROM php:8.0-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        gcc \
        g++ \
        make \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install soap \
    && pecl install xdebug \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug \
    && echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = 172.17.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-source delete

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Config XDEBUG
COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN mv "/usr/local/etc/php/php.ini-production" "/usr/local/etc/php/php.ini"


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

ARG uid
RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser
