FROM php:8.0-apache

ARG UID=1000
RUN useradd -G www-data -u ${UID} app

RUN apt-get update && apt-get install -y zip libzip-dev git inetutils-ping

RUN docker-php-ext-install \
    pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite headers
RUN a2dissite *
RUN a2ensite 000-default.conf

USER app

VOLUME [ "/var/www/html" ]
EXPOSE 8000
CMD [ "apache2-foreground" ]
