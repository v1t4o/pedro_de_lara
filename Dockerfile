FROM php:8.3.3
RUN apt update -y && apt install -y openssl zip unzip git postgresql-client libpq-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . /app
RUN docker-php-ext-install pdo pdo_pgsql
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080