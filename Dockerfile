# Use the official PHP image with FPM
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . .

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www

# Expose port 8000 for Laravel's development server
EXPOSE 8000

# Default command (can be overridden)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
