FROM php:8.2-apache

# Copy project files into Apache root
COPY . /var/www/html/

# Enable Apache mod_rewrite (useful for frameworks like Laravel)
RUN a2enmod rewrite

# Set recommended permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 3000