<?php
session_start();

// Proteksi Halaman: Hanya bisa diakses jika sudah login
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'db.php';

// SELECT data dari database (Membaca/Tampil Data)
$projects = $conn->query("SELECT * FROM projects ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body { padding-left: 250px; font-family: 'Inter', sans-serif;}
        .content { padding: 40px; max-width: 1000px; }
        
        /* Tombol Aksi Kecil pada Tabel */
        .btn-small { 
            padding: 8px 12px; 
            border-radius: 6px; 
            text-decoration: none; 
            color: white; 
            display: inline-block; 
            font-size: 0.85rem; 
            margin: 2px;
            font-weight: 500;
            transition: opacity 0.3s;
        }
        .btn-small:hover { opacity: 0.8; }
        .btn-view { background-color: #3b82f6; } /* Biru */
        .btn-edit { background-color: #f59e0b; } /* Orange */
        .btn-delete { background-color: #ef4444; } /* Merah */

        /* Tabel Dashboard */
        .table-admin { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 30px; 
            background: rgba(15, 23, 42, 0.6); 
            backdrop-filter: blur(10px);
            border-radius: 12px; 
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: #e2e8f0;
        }
        .table-admin th, .table-admin td { 
            padding: 16px; 
            text-align: left; 
            border-bottom: 1px solid rgba(255,255,255,0.05); 
        }
        .table-admin th { 
            background: rgba(15, 23, 42, 0.9); 
            color: #0ea5e9;
            font-weight: 600;
        }
        .table-admin tr:hover {
            background: rgba(255,255,255,0.02);
        }
        
        .header-dash {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGASI KHUSUS ADMIN -->
    <header>
        <nav class="navbar">
            <div class="logo">Admin Panel</div>
            
            <div style="background: rgba(14, 165, 233, 0.1); padding: 15px; border-radius: 8px; width: 80%; text-align: center; margin-bottom: 30px; border: 1px solid rgba(14, 165, 233, 0.3);">
                <p style="margin:0; font-size:0.8rem; color: #94a3b8;">Logged in as:</p>
                <p style="margin:0; font-weight:700; color: #0ea5e9;"><?= htmlspecialchars($_SESSION['username']) ?></p>
            </div>

            <ul class="nav-links">
                <li><a href="dashboard.php" class="active">Dashboard CRUD</a></li>
                <li><a href="index.html" target="_blank">Lihat Website</a></li>
                <li><a href="logout.php" style="color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3);">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- MAIN CONTENT DASHBOARD -->
    <main class="content">
        <div class="header-dash">
            <h2>Manajemen Data Proyek (Portofolio)</h2>
            <a href="add.php" class="btn">➕ Tambah Data (Add)</a>
        </div>
        
        <table class="table-admin">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Tahun</th>
                    <th width="40%">Nama Proyek</th>
                    <th width="40%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1; 
                while($row = $projects->fetch_assoc()) : 
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= htmlspecialchars($row['year']) ?></td>
                    <td style="font-weight: 500;"><?= htmlspecialchars($row['title']) ?></td>
                    <td>
                        <a href="view.php?id=<?= $row['id'] ?>" class="btn-small btn-view">👀 View</a>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn-small btn-edit">✏️ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="btn-small btn-delete">🗑️ Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
                
                <?php if($projects->num_rows == 0): ?>
                <tr>
                    <td colspan="4" style="text-align:center; padding: 30px; color: #94a3b8;">
                        Data proyek masih kosong. Silahkan tambah data.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

</body>
</html>
