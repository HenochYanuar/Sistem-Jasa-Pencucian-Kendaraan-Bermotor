# Sistem Jasa Pencucian Kendaraan Bermotor

Ini adalah aplikasi **Sistem Jasa Pencucian Kendaraan Bermotor** yang dibangun menggunakan **Laravel 11** dengan **PHP versi 8.2.23**.

## Persyaratan Sistem

Pastikan kamu sudah menginstall:
- PHP 8.2.23
- Composer
- MySQL

## Langkah-langkah Penggunaan

Setelah repository diclone atau didownload, ikuti langkah-langkah berikut untuk menjalankan aplikasi:

1. **Clone Repository**
   
   Clone repository ini ke dalam direktori lokal:

   ```bash
   git clone https://github.com/username/repository-name.git
   ```

   Masuk ke dalam direktori project:

   ```bash
   cd repository-name
   ```

2. **Install Dependencies**

   Jalankan perintah berikut untuk menginstall semua dependencies yang diperlukan:

   ```bash
   composer install
   ```

3. **Buat Database**

   Buat sebuah database baru di MySQL dengan nama sistem_jasa_pencucian_kendaraan_bermotor. Kamu bisa menggunakan command line atau tools seperti phpMyAdmin.

   ```sql
   CREATE DATABASE sistem_jasa_pencucian_kendaraan_bermotor;
   ```

4. **Konfigurasi .env**

   Salin file .env.example menjadi .env dan atur konfigurasi database kamu di dalam file .env:

   ```bash
   cp .env.example .env
   ```

   Lalu, sesuaikan konfigurasi database di .env:

  ```dotenv
  DB_DATABASE=sistem_jasa_pencucian_kendaraan_bermotor
  DB_USERNAME=root
  DB_PASSWORD=yourpassword
  ```

5. **Migrasi Database**

   Jalankan perintah berikut untuk menjalankan migrasi database:

   ```bash
   php artisan migrate
   ```

6. **Seed Database**

   Untuk mengisi data awal pada database, jalankan perintah berikut:

   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Menjalankan Aplikasi**

   Jalankan perintah berikut untuk memulai server aplikasi:

   ```bash
   php artisan migrate:fresh --seed
   ```

   Akses aplikasi di browser melalui URL:

   ```text
   http://localhost:8000
   ```

## Catatan

  - Pastikan MySQL server sudah berjalan sebelum menjalankan migrasi.
  - Jika kamu mengubah nama database atau konfigurasi lainnya, jangan lupa memperbarui file .env.
