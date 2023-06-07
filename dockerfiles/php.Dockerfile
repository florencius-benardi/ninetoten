FROM php

WORKDIR /var/www/clocking

COPY src .

RUN docker-php-ext-install php-common php-mysql php-xml php-curl php-gd php-imagick php-cli php-dev php-imap php-mbstring php-opcache php-soap php-zip php-pgsql php-imagick php-bcmath php-gd ext-zip php-soap php-gmp php-sodium php-intl -y

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

USER laravel
