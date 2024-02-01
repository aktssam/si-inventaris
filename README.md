## About Project
### Ringkasan
Website untuk pengelolaan data aset/inventaris sederhana CRUD

### Features
- Menampilkan data aset dan gudang
- Tambah data, edit, hapus data aset
- Monitoring aset (status dan kondisi)
- History perubahan pada data aset (+timestamp dan user yang merubah)
- Otomatis generate QR code berdasarkan id barang saat berhasil tambah data
- scan QR code yang langsung redirect ke detail barang
- export to pdf

### Tech Stack 
- Laravel 10 (PHP 8.1)
- MySQL database
- Sneat Template (Bootstrap 5)

## Demo 

#### Comming soon

username & password: admin

#### Local development

- Download zip / clone repositori ini
- Masuk ke direktori project
  ```
  cd ./si-inventaris
  ```
- Install dependesi
  ```
  composer install
  ```
- Setup environment
  ```
  cp .env.example .env
  ```
- Generate app_key
  ```
  php artisan key:generate
  ```
- Jalankan server MySQL database dan buat database baru dengan nama `inventory`
- Migrate database
  ```
  php artisan migrate:fresh --seed
  ```
- Jalankan development server laravel
  ```
  php artisan serve
  ```
- username & password: admin
