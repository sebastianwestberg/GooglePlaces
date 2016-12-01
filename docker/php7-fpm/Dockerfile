FROM php:7.0-fpm

RUN apt-get update && apt-get install -y \

    git \
    unzip

    # Type docker-php-ext-install to see available extensions

# Install Composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer --version

# Set timezone

RUN rm /etc/localtime && \
    ln -s /usr/share/zoneinfo/Europe/Stockholm /etc/localtime && \
    "date"