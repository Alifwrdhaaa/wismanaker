FROM php:8.2-apache

# Menginstal ekstensi sistem dan pustaka PHP yang diperlukan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Menginstal Node.js & npm (untuk build aset TailwindCSS/Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Mengaktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# Menginstal Composer (Manajer paket PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Menetapkan direktori kerja
WORKDIR /var/www/html

# Menyalin seluruh kode aplikasi
COPY . /var/www/html

# Mengubah konfigurasi titik akses Apache ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Mengatur izin folder (Permission)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Menginstal dependensi PHP
RUN composer install --no-dev --optimize-autoloader

# Menginstal dependensi NPM dan melakukan build aset
RUN npm install && npm run build

# Menjadikan script startup dapat dieksekusi
RUN chmod +x start.sh

# Mengeksekusi script startup saat server menyala
CMD ["./start.sh"]
