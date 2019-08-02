FROM php:7.3-apache
MAINTAINER Jimmy Dixon <jamesalandixon@gmail.com>

LABEL Description = "A light weight CMS web application built with Symfony flex libraries."

RUN apt-get update \
    && apt-get install --assume-yes -yqq apt-utils libzip-dev ca-certificates vim curl git-core \
    zlib1g-dev wget unzip nodejs npm \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#S6
RUN curl -sL "https://github.com/just-containers/s6-overlay/releases/download/v1.16.0.0/s6-overlay-amd64.tar.gz" \
    | tar xz -C /

#Services
COPY docker/s6/services.d /etc/services.d
COPY docker/s6/init.sh /etc/cont-init.d/init.sh

WORKDIR /var/www/boxer-ratings-admin/
COPY . /var/www/boxer-ratings-admin/

#PHP
COPY docker/php/php.ini /usr/local/etc/php/
RUN touch /var/log/boxer-ratings-admin.log && chown www-data:www-data /var/log/boxer-ratings-admin.log

#Composer
RUN composer install --no-interaction

#Webpack
RUN npm i -g yarn
RUN yarn install
RUN yarn encore dev

#Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN usermod -aG root www-data
RUN a2enmod rewrite

EXPOSE 80

CMD ["/init"]