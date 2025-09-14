FROM php:8.2-apache

# Cài extension kết nối MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copy toàn bộ project vào thư mục web server
COPY . /var/www/html/

# Bật mod_rewrite để hỗ trợ .htaccess
RUN a2enmod rewrite

EXPOSE 80
