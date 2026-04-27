<?php
session_start();
// Cek Login
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'db.php';

// Pastikan ada parameter ID
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Proses DELETE
    $query = "DELETE FROM projects WHERE id = $id";
    
    if($conn->query($query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='dashboard.php';</script>";
    }
} else {
    header("Location: dashboard.php");
}
?>
