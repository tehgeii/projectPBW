<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = $_POST['gambar']; // input nama file manual dulu biar simpel (sesuai materi dasar)
    $link = $_POST['link'];

    $sql = "INSERT INTO artikel (judul, isi, gambar, link_ref) VALUES ('$judul', '$isi', '$gambar', '$link')";
    
    if ($conn->query($sql) === TRUE) {
        header("location:kelola_artikel.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Artikel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 container">
    <h3>Tambah Artikel Baru</h3>
    <form method="post">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Singkat</label>
            <textarea name="isi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Nama File Gambar (contoh: rover.jpg)</label>
            <input type="text" name="gambar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Link Referensi</label>
            <input type="text" name="link" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="kelola_artikel.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>