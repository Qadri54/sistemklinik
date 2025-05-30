# Sistem Klinik

Sistem Klinik adalah aplikasi manajemen klinik berbasis web yang dibangun menggunakan Laravel. Sistem ini mencakup manajemen pengguna (admin, dokter, pasien, dll), serta fitur-fitur penting lainnya untuk operasional klinik.

## Fitur Utama
- Autentikasi pengguna dengan peran: admin, dokter, pasien, resepsionis
- Manajemen data pasien dan dokter
- Penjadwalan dan pencatatan kunjungan
- CRUD data klinik

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

### 1. Clone Repository
```bash
git clone https://github.com/Qadri54/sistemklinik.git
cd sistemklinik.
```

### 2. Install Dependency
``` bash
composer install
```

### 3. Salin File Environment
``` bash
cp .env.example .env
```

### 4. Atur Konfigurasi Database
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=sistemklinik  
DB_USERNAME=root  
DB_PASSWORD=  

### 5. buat database sistemklinik di phpmyadmin

### 6. Generate Key dan Migrate Database
```bash
php artisan key:generate  
php artisan migrate --seed
```

### 7. buat storage link untuk menghubungkan gambar
```bash
php artisan storage:link
```

### 8. jalankan aplikasi
```bash 
php artisan serve
```

# akses aplikasi melalui
http://127.0.0.1:8000

### Login default
| Role        | Email                                                 | Password |
| ----------- | ----------------------------------------------------- | -------- |
| Admin       | [admin@gmail.com](mailto:admin@gmail.com)             | 123456   |
| Resepsionis | [resepsionis@gmail.com](mailto:resepsionis@gmail.com) | 123456   |
| Dokter      | [dokter@gmail.com](mailto:resepsionis@gmail.com)      | 123456   |
| pasien      | [ujang@gmail.com](mailto:resepsionis@gmail.com)       | 123456   |

### sekarang pasien dan dokter sudah tersedia

# selamat menikmati sistemnya 😊 #

