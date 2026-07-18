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

## Agentic developer

composer require laravel/boost --dev

php artisan boost:install

## Buat Model dan Migration

- konfigurasi koneksi database
  buka file .env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=db_laravel12_api
  DB_USERNAME=root
  DB_PASSWORD=

- Buat Model dan migration
  php artisan make:model Product -m

- Tambahkan field di migration beserta tipe datanya
  file migration

- Konfiguration mass assigment
  menentukan kolom mana saja yang boleh diisi
  app/Models/Product.php

- jalankan migration
  php artisan migrate

- Menambahkan accessor di Model
  mengubah nilai saat field diakses
  app/Models/Product.php
