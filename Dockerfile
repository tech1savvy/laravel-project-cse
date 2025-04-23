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
    && composer install --no-dev --optimize-autoloader \
    && npm install && npm run build

# Apache configuration
RUN a2enmod rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]
