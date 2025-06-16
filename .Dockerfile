FROM php:8.2-cli

# Install extensions (adjust if needed)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip pdo_mysql

# Set work directory
WORKDIR /app

# Copy project files
COPY . .

# Install composer dependencies
RUN curl -sS https://getcomposer.org/installer | php && \
    php composer.phar install --no-dev --optimize-autoloader

# Expose port
EXPOSE 8080

# Start Laravel with PHP built-in server
CMD php artisan migrate --force && php -S 0.0.0.0:8080 -t public
