FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable mod_rewrite (if needed)
RUN a2enmod rewrite

# Set default DirectoryIndex
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf

# Copy your PHP app into Apache's root
COPY . /var/www/html/

# Fix file permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
