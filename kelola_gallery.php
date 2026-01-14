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
    $conn->query("DELETE FROM gallery WHERE id='$id'");
    header("location:kelola_gallery.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Manajemen Gallery WuWa</h2>
        <a href="admin.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
        <a href="tambah_gallery.php" class="btn btn-primary mb-3">Tambah Gambar Baru</a>

        <div class="mb-3">
            <input type="text" id="keyword_gallery" class="form-control" placeholder="Cari gallery...">
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tabel-gallery">
                <?php
                // Load data awal
                $result = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
                $no = 1;
                while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><img src="<?= $row['gambar'] ?>" width="100"></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td>
                        <a href="edit_gallery.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="kelola_gallery.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#keyword_gallery').on('keyup', function() {
                var key = $(this).val();
                // Request AJAX ke file ajax_kelola_gallery.php
                $('#tabel-gallery').load('ajax_kelola_gallery.php?keyword=' + key);
            });
        });
    </script>
</body>
</html>