FROM php:7.3-apache

RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y
RUN apt-get install -y libicu-dev

# Install useful tools
RUN apt-get -y install apt-utils nano wget dialog

# Install xdebug
RUN pecl install xdebug-beta
RUN docker-php-ext-enable xdebug



# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Other PHP7 Extensions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install json
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Enable apache modules
RUN a2enmod rewrite