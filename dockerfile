# -------------------------------
# Stage 1: Build Laravel App
# -------------------------------
FROM php:8.2-cli as build

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate application key
RUN php artisan key:generate

# -------------------------------
# Stage 2: Production Runtime
# -------------------------------
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Copy built app from previous stage
COPY --from=build /var/www/html /var/www/html

# Expose port 8000 for PHP built-in server
EXPOSE 8000

# Run Laravel migrations and start the PHP server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
