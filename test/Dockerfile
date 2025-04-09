# Use the official PHP image with Apache
FROM php:8.2-apache

# Install MySQLi (for database connection)
RUN docker-php-ext-install mysqli

# Copy your source code into the container
COPY ./src /var/www/html/

# Set permissions to allow Apache to access files
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Ensure Apache runs in the foreground
CMD ["apache2-foreground"]

# Expose port 80
EXPOSE 80
