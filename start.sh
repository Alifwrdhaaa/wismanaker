#!/bin/bash

# Menyembunyikan error dan melanjutkan eksekusi jika terjadi kesalahan
set -e

echo "Mengoptimalkan cache konfigurasi dan rute Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Menjalankan migrasi database otomatis..."
# Menggunakan --force karena sedang berada di environment production
php artisan migrate --force

echo "Membuat storage link jika belum ada..."
php artisan storage:link || true

echo "Menyalakan peladen (server) Apache..."
# Perintah wajib untuk Docker image php:apache
apache2-foreground
