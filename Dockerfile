FROM php:8.2-apache

# Cài extension MySQLi và PDO MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Bật rewrite (nếu bạn dùng .htaccess)
RUN a2enmod rewrite

# Copy code vào thư mục web root
COPY . /var/www/html/

EXPOSE 80
