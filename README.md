# 📋 Aplikasi Buku Tamu Satpam

Aplikasi ini dirancang untuk mencatat tamu yang datang ke sebuah institusi atau perusahaan, dikelola oleh petugas keamanan. Dibangun menggunakan PHP Native dan MySQL.

---

## 🛠️ 1. Cara Instalasi Aplikasi

### 📌 Persyaratan Sistem
- PHP 7.4 atau lebih baru
- MySQL 5.7 atau lebih baru
- Web Server: Apache / Nginx
- Browser modern (Chrome/Firefox)

### 📥 Langkah Instalasi

1. Clone atau ekstrak folder ke dalam direktori web server (contoh: `htdocs` di XAMPP).
2. Buat database baru, contoh: `buku_tamu`.
3. Import file SQL berikut dari folder `sql/` secara berurutan:
   - `users.sql`
   - `log_akses.sql`
   - `lokasi.sql`
   - `pengaturan.sql`
   - `perusahaaan.sql`
   - `tamu.sql`
   - `tamu_keperluan.sql`
   - `tamu_ke_lokasi.sql`
   - `tamu_perusahaan.sql`
   - `tujuan_kunjungan.sql`

4. Buka file `config/database.php` (buat jika belum ada) dan sesuaikan koneksi:
```php
<?php
$conn = new mysqli("localhost", "root", "", "buku_tamu");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
```

5. Akses aplikasi melalui browser:
```
http://localhost/oi/public/index.php
```

---

## 🗂️ 2. Struktur Database dan ERD

### Tabel-Tabel Utama:

| Tabel                  | Fungsi                                                  |
|------------------------|----------------------------------------------------------|
| `users`                | Data pengguna/admin sistem                               |
| `tamu`                 | Menyimpan data tamu yang berkunjung                      |
| `tamu_perusahaan`      | Relasi tamu dengan perusahaan tertentu                   |
| `perusahaaan`          | Data perusahaan asal tamu                                |
| `tujuan_kunjungan`     | Menyimpan tujuan kedatangan tamu                         |
| `tamu_ke_lokasi`       | Log kunjungan ke lokasi tertentu                         |
| `lokasi`               | Menyimpan daftar lokasi yang bisa dikunjungi             |
| `log_akses`            | Mencatat aktivitas login dan logout                      |
| `pengaturan`           | Konfigurasi sistem                                       |

### Relasi Penting:
- `tamu_perusahaan.tamu_id` → `tamu.id`
- `tamu_perusahaan.perusahaan_id` → `perusahaaan.id`
- `tamu_ke_lokasi.tamu_id` → `tamu.id`
- `tamu_ke_lokasi.lokasi_id` → `lokasi.id`

📌 **Diagram ERD**: Lihat gambar `docs/ERD.jpg` (bisa dibuat jika belum tersedia)

---

## 🧭 3. Cara Menggunakan Aplikasi

### 🔐 Login
- Akses halaman `public/auth.php`
- Masukkan username dan password dari tabel `users`

### 📌 Modul Utama

#### Dashboard (`admin/dashboard.php`)
- Statistik total tamu
- Ringkasan aktivitas harian

#### Daftar Tamu (`admin/daftar.php`)
- Melihat dan mengelola data tamu
- Hapus/Edit data jika diperlukan

#### Tambah Admin (`admin/insert_user.php`)
- Menambahkan pengguna baru ke sistem

#### Laporan Kunjungan (`admin/laporan.php`)
- Lihat riwayat tamu berdasarkan tanggal, lokasi, dan keperluan

#### Logout (`admin/keluar.php`)
- Keluar dari sistem dan kembali ke halaman login

---

## 📂 Struktur Proyek

```
oi/
├── admin/                 # Halaman admin dan backend
├── public/                # Halaman publik dan login
├── sql/                   # Skrip SQL struktur database
├── docs/                  # Dokumentasi dan diagram (jika ada)
```

---
