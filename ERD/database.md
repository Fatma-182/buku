| Tabel              | Fungsi                                                     |
| ------------------ | ---------------------------------------------------------- |
| `users`            | Menyimpan akun satpam/admin untuk login.                   |
| `tamu`             | Menyimpan data tamu harian.                                |
| `lokasi`           | Menyimpan ruangan yang bisa dikunjungi tamu.               |
| `tujuan_kunjungan` | Jenis-jenis keperluan kunjungan.                           |
| `tamu_ke_lokasi`   | Mencatat tamu ke lokasi mana saja (many-to-many).          |
| `tamu_keperluan`   | Mencatat jenis keperluan yang dipilih tamu (many-to-many). |
| `log_akses`        | Mencatat waktu login dan logout pengguna.                  |
| `pengaturan`       | Menyimpan konfigurasi sistem global seperti sistem,logo dll|
| `perusahaan`       | Menyimpan daftar instansi yang sering datang.              |
| `tamu_perusahaan`  | Menghubungkan tamu dengan perusahaan (opsional).           |