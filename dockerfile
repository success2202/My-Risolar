# -------------------------------
# Stage 1: Build Laravel App
# -------------------------------
FROM php:8.2-cli as build

WORKDIR /var/www/html

# Install dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy all files
COPY . .

# Disable Laravel post-scripts during build (prevents artisan failure)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# -------------------------------
# Stage 2: Production Runtime
# -------------------------------
FROM php:8.2-cli

WORKDIR /var/www/html

# Copy app from builder stage
COPY --from=build /var/www/html /var/www/html

# Copy Composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Expose port 8000
EXPOSE 8000

# Final startup commands
CMD composer run-script post-autoload-dump && \
    php artisan key:generate && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8000
