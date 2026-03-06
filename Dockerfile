FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN cp .env.example .env || true

RUN php artisan key:generate || true

RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true

RUN chmod -R 777 storage bootstrap/cache

CMD php -S 0.0.0.0:${PORT:-10000} -t public

EXPOSE 10000
