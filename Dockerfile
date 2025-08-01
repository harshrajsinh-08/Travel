# Use PHP with Apache
FROM php:8.2-apache

# Install required packages for PostgreSQL extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copy project files into container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Give permissions for uploads
RUN mkdir -p uploads && chmod -R 777 uploads

# Enable Apache mod_rewrite (optional but useful)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80