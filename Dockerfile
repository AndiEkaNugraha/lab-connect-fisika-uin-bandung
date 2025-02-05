# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    sqlite3 \
    pkg-config \
    unzip \
    && docker-php-ext-configure pdo_sqlite --with-pdo-sqlite=/usr \
    && docker-php-ext-install pdo pdo_sqlite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin semua file ke dalam container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Install dependencies via Composer
RUN composer install

# Berikan permission ke database
RUN chown -R www-data:www-data /var/www/html/database && \
    chmod -R 755 /var/www/html/database

# Expose port 8002
EXPOSE 8002

# Perintah default untuk menjalankan server
CMD ["php", "-S", "0.0.0.0:8002", "-t", "public"]
