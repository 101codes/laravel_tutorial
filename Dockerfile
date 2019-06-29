FROM php:7
WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache
CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080
