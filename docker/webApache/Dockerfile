FROM php:7.1-apache

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

RUN curl -k -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuration
RUN a2enmod rewrite headers
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Directory of the application
WORKDIR "/var/www/be"

CMD ["apache2-foreground"]