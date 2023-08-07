# Use an official PHP 7.3 image with Alpine Linux
FROM php:7.3-fpm-alpine

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN apk add --update --no-cache libpng-dev libjpeg-turbo-dev freetype-dev zip unzip nginx

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install pdo pdo_mysql
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions imagick
RUN install-php-extensions zip

# Copy application code into the container
COPY . .

# Copy Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Set permissions for Laravel files and directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 for Nginx
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "nginx && php-fpm"]