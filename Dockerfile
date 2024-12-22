FROM php:8.2.12

# Menyalin file composer ke dalam kontainer
COPY composer.* /var/www/petshop_fix/

# Mengatur direktori kerja
WORKDIR /var/www/petshop_fix

# Memasang dependensi sistem yang diperlukan
RUN apt-get update && apt-get install -y\
    build-essential \
    libmcrypt-dev \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    libicu-dev  # Menambahkan libicu-dev untuk intl

# Menginstal ekstensi PHP yang diperlukan
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd zip intl  # Menambahkan intl di sini

# Membersihkan cache dan file yang tidak perlu
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Menginstal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Membuat grup dan pengguna
RUN groupadd -g 1000 www
RUN useradd -u 1000 -g www -s /bin/bash -m www

# Menyalin semua file aplikasi dan mengubah pemiliknya
COPY . .
COPY --chown=www:www . .

# Mengubah pengguna yang akan menjalankan aplikasi
USER www

# Mengekspos port untuk PHP-FPM
EXPOSE 9000

# Menjalankan PHP-FPM
CMD ["php-fpm"]


# Install system dependencies
# RUN apt-get update && apt-get install -y php 8.2.12-fpm \
#     build-essential \
#     libpng-dev \
#     libjpeg-dev \
#     libfreetype6-dev \
#     locales \
#     zip \
#     jpegoptim optipng pngquant gifsicle \
#     vim \
#     unzip \
#     git \
#     curl \
#     libzip-dev \
#     libpq-dev \
#     libonig-dev \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install -j$(nproc) gd





# # Install PHP extensions
# RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring zip exif pcntl

# # Clear cache
# RUN apt-get clean && rm -rf # COPY composer.* /var/www/petshop_fix/

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Copy the existing application directory contents to the working directory
# COPY . /var/www

# # Copy the existing application directory permissions to the working directory
# COPY --chown=www-data:www-data . /var/www

# # Change current user to www
# USER www-data

# # Expose port 9000 and start php-fpm server
# EXPOSE 9000
# CMD ["php-fpm"]