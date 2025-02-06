# Use PHP with Apache as the base image
FROM php:8.1-apache

# Copy all files from the current directory to Apache's root directory
COPY . /var/www/html

# Set file permissions (important for security)
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expose port 80 (Apache default port)
EXPOSE 80

# Start Apache when the container starts
CMD ["apache2-foreground"]