<?php
include "koneksi.php";
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM gallery WHERE id='$id'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];

    $conn->query("UPDATE gallery SET judul='$judul', gambar='$gambar', deskripsi='$deskripsi' WHERE id='$id'");
    header("location:kelola_gallery.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Gallery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 container">
    <h3>Edit Gallery</h3>
    <form method="post">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama File Gambar</label>
            <input type="text" name="gambar" class="form-control" value="<?= $data['gambar'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?= $data['deskripsi'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="kelola_gallery.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>