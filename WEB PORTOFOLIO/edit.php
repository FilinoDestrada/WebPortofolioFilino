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

// Ambil data yang akan diedit
$result = $conn->query("SELECT * FROM projects WHERE id = $id");
if($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='dashboard.php';</script>";
}
$data = $result->fetch_assoc();


// Proses UPDATE Data
if(isset($_POST['update'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $year = $conn->real_escape_string($_POST['year']);

    $query = "UPDATE projects SET title='$title', description='$desc', year='$year' WHERE id=$id";
    
    if($conn->query($query)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body { padding-left: 250px; font-family: 'Inter', sans-serif;}
        .form-container {
            background: rgba(15, 23, 42, 0.6); 
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 12px;
            margin-top: 20px;
            max-width: 700px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #94a3b8; }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 6px;
            color: white;
            font-family: inherit;
        }
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
        <h2>Edit Proyek (Update)</h2>
        
        <div class="form-container">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Tahun Proyek</label>
                    <input type="text" name="year" required value="<?= htmlspecialchars($data['year']) ?>">
                </div>
                <div class="form-group">
                    <label>Judul/Nama Proyek</label>
                    <input type="text" name="title" required value="<?= htmlspecialchars($data['title']) ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi Proyek</label>
                    <textarea name="description" rows="5" required><?= htmlspecialchars($data['description']) ?></textarea>
                </div>
                
                <button type="submit" name="update" class="btn" style="background: linear-gradient(135deg, #f59e0b, #d97706);">Update Data</button>
                <a href="dashboard.php" class="btn" style="background: rgba(255,255,255,0.1);">Batal</a>
            </form>
        </div>
    </main>

</body>
</html>
