FROM devakay/laravel-project-cse:latest

WORKDIR /var/www

# Copy your application code into the image
COPY . .

# Install PHP dependencies, set up environment, generate key, run migrations
RUN composer install && \
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan migrate

# Expose the port Laravel's built-in server will use
EXPOSE 8000

# Run Laravel's built-in server as the container's main process
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
