# SIM Mahasiswa PHP Native — Versi Siap Dipelajari

## Struktur yang digunakan

Program utama berada di folder `sim_mahasiswa_rbac_role_crud/`. Folder `sim_mahasiswa_rbac_v2/` dipertahankan sebagai versi lama/backup dan tidak perlu digunakan untuk pengembangan berikutnya.

## Urutan belajar dan pengerjaan

1. Import `sim_mahasiswa2.sql` ke MySQL/MariaDB (misalnya melalui phpMyAdmin).
2. Pastikan database bernama `sim_mahasiswa` sudah dibuat.
3. Periksa `koneksi.php` dan sesuaikan host, username, password, port jika diperlukan.
4. Jalankan aplikasi dari `sim_mahasiswa_rbac_role_crud/index.php`.
5. Buka `setupadmin.php` hanya jika membutuhkan akun ADMIN baru dan database belum mempunyai ADMIN. Setelah selesai, hapus file tersebut dari server.
6. Login → Dashboard.
7. Pelajari RBAC: ADMIN, OPERATOR_PRODI, DEKANAT, REKTORAT, MAHASISWA.
8. Pelajari CRUD Role yang sudah ada.
9. Pelajari CRUD Mahasiswa: tampil, cari/filter, tambah, detail, edit, hapus.
10. Pelajari CRUD Fakultas.
11. Pelajari CRUD Program Studi.
12. Pelajari CRUD Pengguna dan password hash.
13. Pelajari Audit Log.
14. Pelajari Laporan dan tombol cetak.
15. Pelajari `style.css` untuk tampilan dan animasi.
16. Pelajari `script.js` untuk animasi tombol, sidebar, notifikasi, dan konfirmasi.

## File utama

- `index.php` — halaman awal
- `login.php` — form login
- `auth.php` — proses autentikasi
- `auth_check.php` — proteksi halaman
- `csrf.php` — perlindungan CSRF
- `dashboard.php` — dashboard
- `sideleftbar.php` — menu sidebar sesuai role
- `topbar.php` — header aplikasi
- `style.css` — seluruh CSS utama dan animasi
- `script.js` — interaksi/animasi sederhana
- `mahasiswa*.php` — CRUD mahasiswa
- `fakultas*.php` — CRUD fakultas
- `prodi*.php` — CRUD program studi
- `pengguna*.php` — CRUD pengguna
- `role*.php` — CRUD role
- `audit.php` — audit log
- `laporan.php` — rekap dan cetak

## Catatan penting

Aplikasi ini tetap PHP Native + MySQLi. Tidak memakai Laravel atau framework lain. Query input pengguna menggunakan prepared statement pada fitur yang ditambahkan. Password menggunakan `password_hash()`/`password_verify()`.

## Login awal

Database bawaan sudah mempunyai akun ADMIN dengan username `Admin`, tetapi password plaintext tidak disimpan di file SQL. Jika password akun tersebut tidak diketahui, gunakan `setupadmin.php` pada database yang belum mempunyai ADMIN, atau ubah password melalui phpMyAdmin dengan hash yang dibuat menggunakan PHP.

## Animasi yang ditambahkan

- Hover tombol naik sedikit
- Efek tekan tombol
- Ripple sederhana saat klik
- Hover card dashboard
- Hover menu sidebar
- Fade-in halaman
- Auto-hide notifikasi
- Responsive sidebar


## Akun Login Admin

Setelah `sim_mahasiswa2.sql` di-import ke MySQL, gunakan:

- Username: `Admin`
- Password: `admin123`
- Role: `ADMIN`

Password sudah disimpan dalam bentuk hash dan diverifikasi menggunakan `password_verify()`.

Jika Anda mengubah password langsung melalui database, jangan memasukkan password biasa ke kolom `password_hash`; gunakan `password_hash()` dari PHP.
