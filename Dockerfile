# Use official PHP Apache image
FROM php:8.2-apache

# Enable PDO and PostgreSQL extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Copy project files into the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Give permissions for uploads
RUN mkdir -p uploads && chmod -R 777 uploads

# Expose port 80
EXPOSE 80