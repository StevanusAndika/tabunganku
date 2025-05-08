# Menggunakan image FrankenPHP resmi berbasis PHP 8.2
FROM dunglas/frankenphp:1.0-php8.2

# Set direktori kerja di container
WORKDIR /app

# Salin semua file dari host ke container
COPY . /app

# (Opsional) Install ekstensi tambahan PHP jika dibutuhkan, contoh:
# RUN docker-php-ext-install pdo pdo_mysql

# Ekspose port default
EXPOSE 80
