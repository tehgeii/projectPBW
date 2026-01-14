<?php
session_start();
include "koneksi.php";

if ($_SESSION['status'] != "login") {
    header("location:login.php");
    exit();
}

// hapus data (delete)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM artikel WHERE id='$id'");
    header("location:kelola_artikel.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Manajemen Artikel WuWa</h2>
        <a href="admin.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
        <a href="tambah_artikel.php" class="btn btn-primary mb-3">Tambah Artikel Baru</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // baca data (read) buat Admin
                $result = $conn->query("SELECT * FROM artikel ORDER BY id DESC");
                $no = 1;
                while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><img src="<?= $row['gambar'] ?>" width="50"></td>
                    <td>
                        <a href="edit_artikel.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="kelola_artikel.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>