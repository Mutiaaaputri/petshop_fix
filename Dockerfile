# Gunakan image PHP 8 resmi sebagai basis
FROM php:8.2.12-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.json dan composer.lock
COPY composer.json composer.lock ./

# Copy seluruh isi proyek ke dalam container
COPY . .

# Set permission
RUN chown -R www-data:www-data .
RUN docker-php-ext-install pdo pdo_mysql

# Expose port untuk aplikasi
EXPOSE 9000

# Command untuk menjalankan aplikasi
CMD ["php", "-S", "0.0.0.0:9000", "-t", "public"]
