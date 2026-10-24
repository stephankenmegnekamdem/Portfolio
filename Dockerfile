# Stage 1: build the CSS and JavaScript
FROM node:22-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: install PHP dependencies
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader
COPY . .
RUN composer dump-autoload --optimize --no-dev

# Stage 3: the web server (FrankenPHP)
FROM dunglas/frankenphp:php8.4
RUN install-php-extensions bcmath

WORKDIR /app
COPY --from=vendor /app ./
COPY --from=assets /app/public/build ./public/build
COPY Caddyfile /etc/caddy/Caddyfile
RUN chown -R www-data:www-data storage bootstrap/cache

CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && php artisan view:cache && frankenphp run --config /etc/caddy/Caddyfile"]
