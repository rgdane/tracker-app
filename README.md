# Tracker App

Sistem manajemen proyek dan tugas internal berbasis Laravel dan Filament.

## 📦 Fitur Utama
- Manajemen Proyek dan Tugas
- Role-Based Access Control (Super Admin, Manager, Staff) menggunakan Laravel Spatie dan Filament Shield
- Filament Admin Panel
- Export Laporan Tugas
- Filter Proyek & Tugas sesuai Role

---

## 🛠️ Persyaratan Sistem

Pastikan anda memiliki hal-hal berikut sebelum menginstal:

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Git (opsional)
- Laravel 10.x
- Laravel Filament v3.x

## ⚙️ Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/rgdane/tracker-app.git
cd tracker-app
```

### 2. Install Dependensi
```bash
composer install
```

### 3. Konfigurasi Environment
Buat file `.env`:
```bash
cp .env.example .env
```

Edit `.env` sesuai koneksi database lokal anda:
```
DB_DATABASE=tracker_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Migrasi & Seeder
```bash
php artisan migrate --seed
```

> Seed akan menambahkan data awal termasuk super admin dan konfigurasi role & permission.

### 6. Jalankan Aplikasi
```bash
php artisan serve
```

Buka di browser:
```
http://localhost:8000/admin
```

---

## 🔐 Akses Awal

| Role       | Email                  | Password   |
|------------|------------------------|------------|
| Super Admin| regadane@email.com      | rahasia123   |
| Manager    | lulanajwa@email.com    | rahasia123   |
| Manager    | enricolombardo@email.com      | rahasia123   |
| Staff      | azharganendra@email.com      | rahasia123   |
| Staff      | aaronheldian@email.com      | rahasia123   |

---

## 📝 Lisensi

MIT License © 2025 Rega Dane Wijayanta
