<?php
$host = "localhost";
$user = "root";
$pass = "";

// Koneksi server MySQL (tanpa db) untuk buat db kalau belum ada
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// 1. Buat database otomatis jika belum ada
$conn->query("CREATE DATABASE IF NOT EXISTS portofolio_db");
$conn->select_db("portofolio_db");

// 2. Buat tabel users untuk sistem login
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)");

// 3. Masukkan default user admin / admin (jika belum ada)
$result = $conn->query("SELECT * FROM users WHERE username='admin'");
if($result->num_rows == 0) {
    $password = password_hash("admin", PASSWORD_DEFAULT); // password admin
    $conn->query("INSERT INTO users (username, password) VALUES ('admin', '$password')");
}

// 4. Buat tabel projects untuk CRUD
$conn->query("CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    year VARCHAR(10) NOT NULL
)");
?>
