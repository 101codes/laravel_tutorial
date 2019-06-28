FROM php:7
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring
WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
# RUN composer install
# RUN composer update
RUN composer install --optimize-autoloader --no-dev
RUN composer require doctrine/dbal
CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080
