<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO gallery (judul, gambar, deskripsi) VALUES ('$judul', '$gambar', '$deskripsi')";
    
    if ($conn->query($sql) === TRUE) {
        header("location:kelola_gallery.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Gallery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 container">
    <h3>Tambah Gallery Baru</h3>
    <form method="post">
        <div class="mb-3">
            <label>Judul Karakter/Gambar</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama File Gambar</label>
            <input type="text" name="gambar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi Singkat</label>
            <input type="text" name="deskripsi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="kelola_gallery.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>