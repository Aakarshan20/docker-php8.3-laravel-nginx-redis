# Use the official PHP 8.3 image
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions
# RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        && docker-php-ext-install -j$(nproc) iconv pdo_mysql mysqli gd zip

RUN apt-get install -y vim

RUN apt-get install -y net-tools

RUN apt-get install -y iputils-ping 

RUN apt-get install -y git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clone Laravel repository
RUN composer create-project --prefer-dist laravel/laravel .

# Install Laravel dependencies
RUN composer install --no-scripts --no-autoloader

# Generate autoload files
RUN composer dump-autoload --optimize

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
