FROM php:7.2-fpm

RUN apt-get update

RUN apt-get install -y --no-install-recommends \
    apt-utils \
    curl \
    zip \
    nano \
    git \
    wget \
    vim \
    zlib1g-dev \
    libcurl3-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql zip curl

WORKDIR "/var/www/be"