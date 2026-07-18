Catatan panduan CRUD API Laravel

### Repo

https://github.com/dauzkepow/crudlaravelapi.git
git@github.com:dauzkepow/crudlaravelapi.git

## install laravel

composer create-project --prefer-dist laravel/laravel:^12.0 laravel12-api

## Konfigurasi driver file system

-> agar bisa diakses dari public

buka file .env
cari kode berikut : FILESYSTEM_DISK=local
ubah menjadi : FILESYSTEM_DISK=public

## Jalankan storage link

php artisan storage:link
