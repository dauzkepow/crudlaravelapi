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

## API Resource

-> fitur yang digunakan untuk mengubah data Model Eloquent menjadi format JSON terstruktur

Kenapa menggunakan API Resource ?

- pisahkan logika data dan presentasi = kontrol data dikirim ke client tanpa mengubah model dan controller
- kemananan data = cegah password dikirim ke client secata tidak sengaja
- konsistensi format reponse = mudahkan frontend untuk menerika data dengan format jelas

php artisan make:resource ProductResource

## Menampilkan data dari Database

- buat controller Product
  php artisan make:controller Api/ProductController
  buka lalu edit

- Buat Route Rest API
  php artisan install:api {otomatis download library sanctum}

- buka routes/api.php lalu edit

- lihat route yang dibuat
  php artisan route:list

- Uji Coba dengan postman
  http://localhost:8000/api/products
  Method = GET
  pastikan berhasil muncul respon tapi masih data: []

## Insert Data ke Database

- tambah method store pada ProductController.php

- uji coba
  http://localhost:8000/api/products
  POST
  Body, form-data, masukkan key-value
  image file dari PC
  title = isi text
  description = isi text
  price = isi angka
  stock = isi angka

    pastikan berhasil mendapat respon true
    tes juga jika price dikasih huruf

## Detail Data by ID

- tambah method show() pada ProductController.php

- Uji Coba
  http://localhost:8000/api/products/1
  GET

## Update Data

- tambah method update() pada ProductController.php

- Uji Coba
  http://localhost:8000/api/products/1
  Post
  Body, form-data, masukkan key-value
  image file dari PC (opsional)
  title = isi text
  description = isi text
  price = isi angka
  stock = isi angka
  \_method = PUT

## Delete Data

- tambah method destroy() pada ProductController.php

- Uji Coba
  http://localhost:8000/api/products/1
  DELETE
