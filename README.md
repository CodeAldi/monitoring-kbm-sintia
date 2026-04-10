# 📚 Monitoring KBM - Sintia

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-%5E8.1-blue)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-orange)](https://www.mysql.com/)
![Status](https://img.shields.io/badge/Status-Freelance%20Project-green)
[![License](https://img.shields.io/badge/License-Private-lightgrey)](#)

Sistem Informasi **Monitoring Kegiatan Belajar Mengajar (KBM)** berbasis web, dibangun menggunakan **Laravel 10**.  
Project ini dirancang untuk membantu sekolah dalam memantau status KBM secara real-time, mendukung proses pencatatan absensi, pengelolaan jadwal, hingga pembuatan laporan rekapitulasi.

## ✨ Fitur Utama
- **Monitoring KBM**
  - Status KBM dapat diperbarui dari: *Belum Dimulai → Sedang Berlangsung → Selesai*.  
  - Monitoring dilakukan secara berlapis oleh **Guru Mapel**, **Guru Piket**, hingga **Kepala Sekolah**.

- **Multi-User (5 Role Pengguna)**
  1. **Admin** → menambahkan data guru, mata pelajaran, kelas, siswa, rombongan belajar, baik satu per satu maupun melalui *import Excel* (dengan template khusus dari sistem).  
  2. **Kepala Sekolah** → memonitoring KBM semua kelas, melihat rekap absensi guru, serta mengunduh laporan ke format Excel.  
  3. **Wakil Kurikulum** → membuat kalender akademik, menyusun jadwal piket, dengan tampilan kalender berbasis [Calendar.io](https://calendar.io).  
  4. **Guru Mata Pelajaran** → 
     - Mengisi absensi dengan upload foto (hanya saat jam mengajar berlangsung).  
     - Absen pulang di akhir jam pelajaran.  
     - Menginputkan data pembelajaran.  
     - Mengubah status KBM dari *belum dimulai* hingga *selesai*.  
     - Beralih ke mode **Guru Piket** apabila sesuai jadwal piket.  
  5. **Guru Piket** → 
     - Meneruskan surat masuk (contoh: izin sakit guru maupun siswa).  
     - Memantau kondisi kelas secara langsung.  
     - Mengonfirmasi status KBM agar sesuai dengan kondisi nyata di kelas.

## 🛠️ Teknologi
- **Framework**: Laravel 10  
- **Database**: MySQL / MariaDB  
- **UI Kalender**: Calendar.io  
- **Ekspor Laporan**: Excel (import & export)

## 📂 Struktur Database
- Migrasi sudah tersedia di folder `database/migrations`.  
- Seeder disediakan untuk akun **Admin**.  
- Role pengguna lain dapat ditambahkan melalui sistem.

## ⚙️ Instalasi & Menjalankan Project

> Pastikan sudah menginstall **PHP >= 8.1**, **Composer**, dan **MySQL/MariaDB** di komputer Anda.

### 1. Clone repository
```bash
git clone https://github.com/username/monitoring-kbm-sintia.git
cd monitoring-kbm-sintia
```

### 2. Install dependency
```bash
composer install
```

### 3. Konfigurasi file `.env`
```bash
cp .env.example .env
```

Sesuaikan konfigurasi database:
```env
APP_NAME="Monitoring KBM"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=monitoring_kbm
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Migrasi & seeder database
```bash
php artisan migrate --seed
```

### 6. Jalankan server lokal
```bash
php artisan serve
```

Akses di:  
👉 `http://localhost:8000`

## 👤 Akun Default
- **Admin** sudah tersedia dari seeder.  
- Role pengguna lain dapat ditambahkan setelah login sebagai Admin.

---

## 📄 Lisensi
Project ini merupakan **freelance project** dan digunakan untuk kebutuhan internal client.
