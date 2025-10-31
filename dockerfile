# ------------------------------------------
# Stage 1: Build Laravel app
# ------------------------------------------
FROM php:8.2-cli as build

WORKDIR /var/www/html

# Install system dependencies + PHP extensions (PDO MySQL + GD for images)
RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring tokenizer xml bcmath

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy all files
COPY . .

# Install dependencies (without running artisan)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# ------------------------------------------
# Stage 2: Production runtime
# ------------------------------------------
FROM php:8.2-cli

WORKDIR /var/www/html

# Copy app from builder
COPY --from=build /var/www/html /var/www/html
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Enable MySQL PDO extension
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 8000
EXPOSE 8000

# Start Laravel app
CMD php artisan key:generate && \
    php artisan migrate --force || true && \
    php artisan serve --host=0.0.0.0 --port=8000
