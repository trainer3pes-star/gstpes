# PHP-FPM for this CodeIgniter 3 app. CI3 runs fine on 8.1 (later 8.x versions
# raise deprecation noise CI3 wasn't written against); config.php already sets
# error_reporting(0) so those don't surface as fatal errors either way.
FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
        libzip-dev \
        freetype-dev \
        libjpeg-turbo-dev \
        libpng-dev \
        oniguruma-dev \
        curl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        gd \
        mbstring \
        zip \
        curl \
        mysqli \
        opcache

RUN { \
        echo 'memory_limit = 256M'; \
        echo 'upload_max_filesize = 50M'; \
        echo 'post_max_size = 50M'; \
    } > /usr/local/etc/php/conf.d/gstportal.ini

WORKDIR /var/www/html
