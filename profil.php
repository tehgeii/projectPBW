<?php
session_start();
include "koneksi.php";

// Cek jika belum login
if ($_SESSION['status'] != "login") {
    header("location:login.php");
    exit();
}

// Ambil data user yang sedang login berdasarkan username session
$username_login = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username = '$username_login'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

// Proses Update Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password_baru = $_POST['password'];
    $foto_nama = $_FILES['foto']['name'];
    
    // 1. Logic Update Password
    if (!empty($password_baru)) {
        // Jika password diisi, update password (gunakan md5 jika sistem login abang pakai md5)
        $password_md5 = md5($password_baru); 
        $sql_pass = "UPDATE user SET password = '$password_md5' WHERE username = '$username_login'";
        $conn->query($sql_pass);
    }

    // 2. Logic Update Foto
    if ($foto_nama != "") {
        $target_dir = "img/"; // Pastikan folder 'img' ada
        $target_file = $target_dir . basename($foto_nama);
        
        // Upload file
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // Update nama file di database
            $sql_foto = "UPDATE user SET foto = '$target_file' WHERE username = '$username_login'";
            $conn->query($sql_foto);
        }
    }

    echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='profil.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Profil User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Pengaturan Profil</h2>
        
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= $data['username'] ?>" readonly bg-light>
                        <small class="text-muted">Username tidak dapat diubah.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Tulis password baru jika ingin mengganti">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Foto Profil</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-block">Foto Profil Saat Ini:</label>
                        <?php if (!empty($data['foto']) && file_exists($data['foto'])): ?>
                            <img src="<?= $data['foto'] ?>" alt="Foto Profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/150" alt="Default" class="img-thumbnail rounded-circle">
                            <p class="text-muted small">Belum ada foto profil.</p>
                        <?php endif; ?>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="admin.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>