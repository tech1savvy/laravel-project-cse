# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions required by Laravel and SQLite
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    sqlite3 \
    npm \
    && docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Copy .env.example to .env (like your CI workflow)
RUN cp .env.example .env

# Ensure the SQLite database file exists and is writable
RUN mkdir -p database && touch database/database.sqlite && chmod -R 777 database

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend assets
RUN npm install && npm run build

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Environment variables (Render will override these if set in the dashboard)
ENV APP_ENV=production
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
