# Dockerfile for Laravel on Railway with PHP 8.3 and Node 20

FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    nodejs \
    npm

# Install Node 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files
COPY composer.* ./

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev --prefer-dist --no-scripts

# Copy application code
COPY . .

# Remove local node_modules to ensure fresh install
RUN rm -rf node_modules

# Install Node dependencies
RUN npm install

# Build assets
RUN npm run build

# Generate application key if not exists
RUN php artisan key:generate --show | grep -o 'base64:[^"]*' > /tmp/app_key

# Cache configuration and routes
RUN php artisan config:cache
RUN php artisan route:cache

# Optimize autoload
RUN composer dump-autoload --optimize

# Set permissions
RUN chown -R www-data:www-data /var/www/storage
RUN chown -R www-data:www-data /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage
RUN chmod -R 775 /var/www/bootstrap/cache

# Expose port 9000 and start php-fpm server (Railway will override with start command)
EXPOSE 9000
CMD ["php-fpm"]
