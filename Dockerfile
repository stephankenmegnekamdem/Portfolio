# Stage 1: build the frontend assets with Vite
FROM node:22 AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: the PHP app that runs on Render
FROM php:8.5-cli
RUN apt-get update && apt-get install -y git unzip libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

COPY . .
COPY --from=assets /app/public/build ./public/build
RUN composer dump-autoload --optimize \
    && mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# No database yet, so sessions and cache are stored in files
ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=file

# Render provides the PORT variable
CMD sh -c "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"
