# Dokumentasi Sistem Manajemen Proyek dan Tugas

## 1. Pendahuluan
Sistem manajemen proyek dan tugas internal berbasis Laravel dan Filament.

## 2. Fitur Utama

### a. 🔐 Autentikasi & Hak Akses (RBAC)
- **Deskripsi:** Sistem login berbasis peran (role) seperti Super Admin, Manager, dan Staff.
- **Teknologi:** Menggunakan Filament Shield untuk manajemen permission.
- **Akses:**
  - **Super Admin:** Mengakses semua fitur tanpa batas.
  - **Manager:** Mengakses proyek dan tugas yang mereka ikuti.
  - **Staff:** Mengakses tugas pribadi dan proyek terkait yang diikutinya.

### b. 📁 Manajemen Proyek
- **Deskripsi:** Fitur CRUD (Create, Read, Update, Delete) proyek.
- **Relasi:** Proyek memiliki banyak user dan banyak tugas.
- **Akses:** Super Admin dan Manager memiliki akses penuh terhadap fitur ini.

### c. 📌 Manajemen Tugas
- **Deskripsi:** Fitur CRUD tugas dengan atribut penting seperti:
  - Judul
  - Deskripsi
  - Status (To Do, In Progress, Done)
  - Deadline
  - User yang bertanggung jawab (`user_id`)
- **Akses:**
  - **Super Admin:** Akses penuh.
  - **Manager:** Melihat semua tugas anggota proyek yang diikutinya.
  - **Staff:** Melihat dan mengubah hanya tugas miliknya sendiri.

### d. 📊 Laporan Tugas
- **Deskripsi:** Menyediakan rekap jumlah tugas berdasarkan proyek dan user.
- **Fungsi:**
  - Menampilkan jumlah tugas berdasarkan status (`To Do`, `In Progress`, `Done`).
  - Fitur ekspor laporan ke Excel.
- **Akses:** Hanya untuk Super Admin dan Manager.

### e. 👤 Manajemen Pengguna
- **Deskripsi:** CRUD pengguna dalam sistem.
- **Akses:**
  - **Super Admin:** Akses penuh.
  - **Manager dan Staff:** Dapat melihat dan mengubah profil mereka sendiri.
- **Validasi:** Password minimal 8 karakter.

### f. 🏢 Manajemen Departemen
- **Deskripsi:** CRUD departemen dalam organisasi.
- **Akses:** Hanya Super Admin yang memiliki akses penuh.

## 3. Filter & Navigasi

- **Filter Dinamis Berdasarkan Role:**
  - **Staff:** Hanya dapat melihat proyek yang diikutinya.
  - **Manager:** Dapat melihat proyek yang diikutinya dan user dalam proyek tersebut.

- **Navigasi:**
  - Menu yang ditampilkan disesuaikan berdasarkan permission yang dimiliki pengguna.

## 4. Seeder & Permission
- Fitur otomatisasi generate permission dan data tabel menggunakan perintah `shield:generate` dari Filament Shield.
