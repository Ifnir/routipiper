# [Choice] PHP version (use -bullseye variants on local arm64/Apple Silicon): 8-apache-bullseye, 8.1-apache-bullseye, 8.0-apache-bullseye, 7-apache-bullseye, 7.4-apache-bullseye, 8-apache-buster, 8.1-apache-buster, 8.0-apache-buster, 7-apache-buster, 7.4-apache-buster
ARG VARIANT=8.1-apache-bullseye
FROM php:${VARIANT}

ARG USERNAME=php-apache
ARG USER_UID=1001
ARG USER_GID=$USER_UID

RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME \
    && apt-get update \
    && apt-get install -y sudo \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
    && chmod 0440 /etc/sudoers.d/$USERNAME

RUN apt-get update && apt-get install -y zip libzip-dev git inetutils-ping

RUN docker-php-ext-install \
    pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite headers
RUN a2dissite *
RUN a2ensite 000-default.conf



VOLUME [ "/var/www/html" ]
EXPOSE 8000
CMD [ "apache2-foreground" ]
