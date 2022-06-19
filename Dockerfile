FROM webdevops/php-nginx-dev:7.4
ENV WEB_DOCUMENT_ROOT=/app/public
COPY . /app
RUN composer install -d /app
