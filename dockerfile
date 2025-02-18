# Use an official PHP-Apache image
FROM php:8.2-apache 
# Copy project files into the web server directory
COPY . /var/www/html/ 
# Expose port 80
EXPOSE 80 
# Start Apache server
CMD ["apache2-foreground"]