# Use PHP image with Composer support
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install system dependencies and PostgreSQL dev libs
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy all files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install JS dependencies and build
RUN npm install && npm run build

# Expose port
EXPOSE 8000

# Run Laravel with built-in server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
