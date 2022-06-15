FROM webdevops/php-nginx-dev:7.4
COPY . /app/..
COPY ./public /app
RUN composer install -d /app/..
