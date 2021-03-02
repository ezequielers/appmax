FROM php:7.4-fpm
MAINTAINER C.E.C. <comercial@empresaconsumidor.com.br>

RUN echo 'deb http://httpredir.debian.org/debian jessie contrib' >> /etc/apt/sources.list

RUN apt-get update && apt-get install -y \
     libfreetype6-dev \
     libjpeg62-turbo-dev \
     libpng-dev \
     libpq-dev \
     g++ \
     libicu-dev \
     libxml2-dev \
     git \
     vim \
     libfreetype6-dev \
     libjpeg62-turbo-dev \
     libmcrypt-dev \
     zlib1g-dev \
     libmagickwand-dev --no-install-recommends \
     libzip-dev \
     libonig-dev \
     procps \
     curl \
     wget

RUN apt-get install -y --no-install-recommends git zip

#####################################
# composer:
#####################################
ARG INSTALL_COMPOSER=false
RUN echo "Instalar o composer: $INSTALL_COMPOSER"
RUN if [ $INSTALL_COMPOSER = true ]; then \
    # Install the composer
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
;fi

RUN docker-php-ext-configure intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install soap \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install opcache \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install pcntl \
    && pecl install imagick  \
    && docker-php-ext-enable imagick \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-install gettext

RUN docker-php-ext-enable intl

RUN echo "date.timezone=\"America/Sao_Paulo\"" >> /usr/local/etc/php/conf.d/timezone.ini

EXPOSE 9000
CMD ["php-fpm"]
