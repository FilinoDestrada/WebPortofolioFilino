<?php
$host = "localhost";
// Ganti 3 data di bawah ini sesuai yang Anda buat di Langkah 2
$user = "web2c_ino_user"; 
$pass = "ONEPIECE_3";
$dbname = "web2c_ino_dbwebsite";

// Koneksi ke server MySQL sekaligus memilih database
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// KODE CREATE DATABASE DIHAPUS KARENA SUDAH TIDAK PERLU DAN DILARANG DI HOSTING
?>  