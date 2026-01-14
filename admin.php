<?php
session_start();
include "koneksi.php";

// Cek jika belum login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
    exit();
}

// 1. Ambil data user yang sedang login (untuk foto & nama)
$username_login = $_SESSION['username'];
$sql_user = "SELECT * FROM user WHERE username = '$username_login'";
$result_user = $conn->query($sql_user);
$user_data = $result_user->fetch_assoc();

// 2. Hitung jumlah total ARTIKEL
$sql_artikel = "SELECT count(*) as total FROM artikel";
$res_artikel = $conn->query($sql_artikel);
$jumlah_artikel = $res_artikel->fetch_assoc()['total'];

// 3. Hitung jumlah total GALLERY
$sql_gallery = "SELECT count(*) as total FROM gallery";
$res_gallery = $conn->query($sql_gallery);
// Cek error jika tabel gallery belum ada (untuk jaga-jaga)
if($res_gallery){
    $jumlah_gallery = $res_gallery->fetch_assoc()['total'];
} else {
    $jumlah_gallery = 0; 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin WuWa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <script>
        localStorage.setItem('wuwa_login', 'true');
    </script>

    <style>
        /* Style Background Keren ala WuWa */
        body { 
            background: linear-gradient(to right, #243B55, #141E30); 
            height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: white; 
            font-family: sans-serif;
        }
        
        .box { 
            background: rgba(255, 255, 255, 0.1); /* Transparan dikit */
            padding: 40px; 
            border-radius: 20px; 
            width: 100%;
            max-width: 600px;
            backdrop-filter: blur(10px); /* Efek blur background */
            box-shadow: 0 0 30px rgba(0,0,0,0.5); 
            text-align: center;
        }

        /* Style Foto Profil Bulat */
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        /* Style Kartu Statistik */
        .stat-card {
            background-color: white;
            color: #333;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="box">
        <h3 class="fw-light">Dashboard Admin</h3>
        <h1 class="fw-bold mb-4">Selamat Datang, <?= $user_data['username'] ?></h1>

        <?php if (!empty($user_data['foto']) && file_exists($user_data['foto'])): ?>
            <img src="<?= $user_data['foto'] ?>" class="profile-img" alt="Foto Profil">
        <?php else: ?>
            <img src="https://via.placeholder.com/150" class="profile-img" alt="Default Profile">
        <?php endif; ?>

        <div class="row g-3 mb-4">
            <div class="col-6">
                <div class="p-3 stat-card shadow-sm d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <i class="bi bi-journal-text fs-2 text-warning"></i>
                        <div class="fw-bold small">ARTIKEL</div>
                    </div>
                    <span class="badge bg-danger rounded-circle p-3 fs-5"><?= $jumlah_artikel ?></span>
                </div>
            </div>
            
            <div class="col-6">
                <div class="p-3 stat-card shadow-sm d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <i class="bi bi-images fs-2 text-info"></i>
                        <div class="fw-bold small">GALLERY</div>
                    </div>
                    <span class="badge bg-danger rounded-circle p-3 fs-5"><?= $jumlah_gallery ?></span>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <a href="kelola_artikel.php" class="btn btn-warning w-100">Kelola Artikel</a>
                </div>
                <div class="col-md-4">
                    <a href="kelola_gallery.php" class="btn btn-info w-100">Kelola Gallery</a>
                </div>
                <div class="col-md-4">
                     <a href="profil.php" class="btn btn-primary w-100">Profil Saya</a>
                </div>
            </div>
            
            <a href="index.php" class="btn btn-success mt-2">Lihat Website Utama</a>
            <a href="logout.php" class="btn btn-outline-light btn-sm mt-3">Logout</a>
        </div>
    </div>
</body>
</html>