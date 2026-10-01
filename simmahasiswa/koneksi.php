<?php
/**
 * koneksi.php
 * Koneksi database MySQL/MariaDB
 * Sistem Informasi Manajemen Mahasiswa
 * PHP Native + MySQLi
 */

// Konfigurasi database lokal XAMPP/Laragon
$host     = "sql106.infinityfree.com";
$username = "if0_42987834";
$password = "Rian1234Rian";
$database = "if0_42987834_simmahasiswa2";
$port     = 3306;

// Membuat koneksi
$koneksi = mysqli_connect(
    $host,
    $username,
    $password,
    $database,
    $port
);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengatur charset agar mendukung UTF-8
mysqli_set_charset($koneksi, "utf8mb4");
?>
