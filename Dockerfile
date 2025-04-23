# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install essential dependencies only
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    unzip \
    sqlite3 \
    && rm -rf /var/lib/apt/lists/*

# Install only required PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite mbstring

# Add Node.js 18.x (simplified installation)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Basic Laravel setup
RUN cp .env.example .env \
    && mkdir -p database \
    && touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache database \
    && composer install --no-dev --optimize-autoloader \
    && npm install && npm run build

# Apache configuration
RUN a2enmod rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Environment variables
ENV APP_ENV=local
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite

EXPOSE 80
CMD ["apache2-foreground"]
