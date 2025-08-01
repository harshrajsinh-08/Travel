# Use PHP with Apache
FROM php:8.2-apache

# Install PostgreSQL client libraries and SSL certs
RUN apt-get update && apt-get install -y \
    libpq-dev \
    ca-certificates \
    && update-ca-certificates \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copy project files into container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Give permissions for uploads
RUN mkdir -p uploads && chmod -R 777 uploads

# Enable Apache mod_rewrite
RUN a2enmod rewrite

EXPOSE 80