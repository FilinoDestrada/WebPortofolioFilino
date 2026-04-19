<?php
// Inisialisasi variabel untuk menyimpan data input dan pesan error
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$success = false;

// Fungsi untuk membersihkan input data dari karakter yang tidak diinginkan/berbahaya (Mencegah XSS)
function test_input($data) {
    $data = trim($data);            // Menghapus spasi berlebih di awal/akhir
    $data = stripslashes($data);    // Menghapus backslash
    $data = htmlspecialchars($data);// Konversi karakter khusus ke entitas HTML
    return $data;
}

// Cek apakah request HTTP yang dikirim adalah method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Validasi Nama
    if (empty($_POST["name"])) {
        $nameErr = "Nama lengkap wajib diisi.";
    } else {
        $name = test_input($_POST["name"]);
        // Cek apakah nama hanya mengandung huruf dan spasi (RegEx)
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Hanya huruf dan spasi yang diizinkan pada nama.";
        }
    }

    // 2. Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi.";
    } else {
        $email = test_input($_POST["email"]);
        // Cek apakah format email valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid.";
        }
    }

    // 3. Validasi Pesan
    if (empty($_POST["message"])) {
        $messageErr = "Pesan tidak boleh kosong.";
    } else {
        $message = test_input($_POST["message"]);
    }

    // Jika tidak ada error pada semua field, proses dianggap berhasil
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $success = true;
        
        // Simpan data ke dalam file teks (sebagai simulasi penyimpanan ke database)
        $logData = "Waktu : " . date("Y-m-d H:i:s") . "\n";
        $logData .= "Nama  : $name\n";
        $logData .= "Email : $email\n";
        $logData .= "Pesan :\n$message\n";
        $logData .= "----------------------------------------\n";
        
        // Menyimpan log ke file data_pesan.txt
        $file = fopen("data_pesan.txt", "a");
        if ($file) {
            fwrite($file, $logData);
            fclose($file);
        }
    }
} else {
    // Redirect kembali ke form contact jika halaman ini diakses langsung (bukan via submit)
    header("Location: contact.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengiriman | Portofolio</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- External CSS Bersama (Mempertahankan UI dari Style.css sebelumnya) -->
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            padding-left: 250px;
            background-image: url('BackgroundIno.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #ffffff;
        }

        .result-container {
            margin-top: 40px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            max-width: 700px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert {
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .alert-icon {
            font-size: 1.8rem;
            flex-shrink: 0;
        }

        .alert-content h2 {
            margin: 0 0 10px 0;
            font-size: 1.4rem;
        }

        .alert-content p {
            margin: 0;
            color: #e2e8f0;
            line-height: 1.5;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border-left: 4px solid #10b981;
        }
        .alert-success .alert-content h2 { color: #34d399; }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
        }
        .alert-error .alert-content h2 { color: #f87171; }

        .alert-error ul {
            margin: 10px 0 0 0;
            padding-left: 20px;
            color: #fca5a5;
        }

        .data-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
        }

        .data-card h3 {
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: #0ea5e9;
        }

        .data-item {
            margin-bottom: 15px;
        }

        .data-item label {
            display: block;
            color: #94a3b8;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 5px;
        }

        .data-item .value {
            font-size: 1.1rem;
            font-weight: 500;
            background: rgba(0, 0, 0, 0.2);
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            word-break: break-word; /* untuk mencegah text keluar kotak */
        }

        .action-btns {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: white;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.5);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Responsiveness untuk tampilan mobile */
        @media (max-width: 900px) {
            body { padding-left: 0; }
            .action-btns { flex-direction: column; }
            .btn { justify-content: center; width: 100%; box-sizing: border-box; }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGASI (Hanya merender ulang elemen yang sama) -->
    <header>
        <nav class="navbar">
            <div class="logo">MyPortofolio</div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- KONTEN UTAMA PHP -->
    <main style="max-width: 950px; padding: 40px;">
        <div class="result-container">
            
            <?php if ($success): ?>
                <!-- Notifikasi Sukses -->
                <div class="alert alert-success">
                    <div class="alert-icon">✅</div>
                    <div class="alert-content">
                        <h2>Berhasil Mengirim Pesan!</h2>
                        <p>Terima kasih <strong><?= $name ?></strong>. Pesan Anda telah dikirim dan disave secara lokal dalam file <code>data_pesan.txt</code>.</p>
                    </div>
                </div>

                <!-- Detail Data yang Dimasukkan -->
                <div class="data-card">
                    <h3>Detail Data Anda</h3>
                    
                    <div class="data-item">
                        <label>Nama Lengkap</label>
                        <div class="value"><?= $name ?></div>
                    </div>
                    
                    <div class="data-item">
                        <label>Alamat Email</label>
                        <div class="value"><?= $email ?></div>
                    </div>
                    
                    <div class="data-item">
                        <label>Isi Pesan</label>
                        <div class="value"><?= nl2br($message) ?></div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="action-btns">
                    <a href="contact.html" class="btn btn-primary">⬅ Kirim Pesan Lagi</a>
                    <a href="index.html" class="btn btn-secondary">Kembali ke Beranda</a>
                </div>

            <?php else: ?>
                <!-- Notifikasi Error -->
                <div class="alert alert-error">
                    <div class="alert-icon">❌</div>
                    <div class="alert-content">
                        <h2>Validasi Gagal</h2>
                        <p>Maaf, kami menemukan beberapa masalah pada data yang Anda input. Silakan perbaiki:</p>
                        <ul>
                            <?php if(!empty($nameErr)) echo "<li>$nameErr</li>"; ?>
                            <?php if(!empty($emailErr)) echo "<li>$emailErr</li>"; ?>
                            <?php if(!empty($messageErr)) echo "<li>$messageErr</li>"; ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Tombol Kembali -->
                <div class="action-btns">
                    <!-- Menggunakan history.back() agar user tidak perlu mengisi ulang field yang sudah benar -->
                    <a href="javascript:history.back()" class="btn btn-secondary">⬅ Kembali & Perbaiki Data</a>
                </div>
            <?php endif; ?>

        </div>
    </main>

</body>
</html>
