FROM docker.io/bitnami/laravel:7

# RUN php install mcrypt-1.0.3 \
#     && docker-php-ext-enable mcrypt
# RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl git 
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# WORKDIR /app
COPY . /var/www
# RUN composer update
# RUN composer install
# RUN chmod +x artisan

# CMD php artisan serve --host=0.0.0.0 --port=8000
# EXPOSE 8000