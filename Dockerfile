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

# Stage 3: the web server
# Check composer.json for the PHP version you use. If php:8.5-apache is not
# available, use php:8.4-apache and make sure it meets composer.json's PHP requirement.
FROM php:8.5-apache
RUN docker-php-ext-install bcmath \
    && a2enmod rewrite

# Serve the public/ folder, as Laravel requires
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY --from=vendor /app ./
COPY --from=assets /app/public/build ./public/build
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

# Cache config and views at start, when the environment variables are available
CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && php artisan view:cache && apache2-foreground"]
