<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'db.php';

// Cek parameter ID
if(!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = (int)$_GET['id'];

// Ambil detail data
$result = $conn->query("SELECT * FROM projects WHERE id = $id");
if($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='dashboard.php';</script>";
}
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body { padding-left: 250px; font-family: 'Inter', sans-serif;}
        .view-container {
            background: rgba(15, 23, 42, 0.6); 
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 12px;
            margin-top: 20px;
            max-width: 700px;
        }
        .view-item { margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 15px;}
        .view-item label { display: block; margin-bottom: 8px; color: #94a3b8; font-size: 0.9rem; text-transform: uppercase;}
        .view-item .value { font-size: 1.2rem; color: #fff; }
    </style>
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="logo">Admin Panel</div>
            <ul class="nav-links">
                <li><a href="dashboard.php">Dashboard CRUD</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main style="padding: 40px;">
        <h2>Detail Proyek (View)</h2>
        
        <div class="view-container">
            
            <div class="view-item">
                <label>ID Data di Database</label>
                <div class="value">#<?= $data['id'] ?></div>
            </div>

            <div class="view-item">
                <label>Tahun Proyek</label>
                <div class="value"><?= htmlspecialchars($data['year']) ?></div>
            </div>
            
            <div class="view-item">
                <label>Judul/Nama Proyek</label>
                <div class="value" style="color: #0ea5e9; font-weight: bold;"><?= htmlspecialchars($data['title']) ?></div>
            </div>
            
            <div class="view-item" style="border:none;">
                <label>Deskripsi Proyek</label>
                <div class="value" style="font-size: 1rem; line-height: 1.6; background: rgba(0,0,0,0.2); padding: 15px; border-radius: 8px;">
                    <?= nl2br(htmlspecialchars($data['description'])) ?>
                </div>
            </div>
            
            <div style="margin-top:30px;">
                <a href="dashboard.php" class="btn">⬅ Kembali ke Dashboard</a>
            </div>
            
        </div>
    </main>

</body>
</html>
