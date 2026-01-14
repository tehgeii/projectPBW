<?php
include "koneksi.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM artikel WHERE id='$id'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = $_POST['gambar'];
    $link = $_POST['link'];

    $sql = "UPDATE artikel SET judul='$judul', isi='$isi', gambar='$gambar', link_ref='$link' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("location:kelola_artikel.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Artikel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 container">
    <h3>Edit Artikel</h3>
    <form method="post">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Isi Singkat</label>
            <textarea name="isi" class="form-control" required><?= $data['isi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Nama File Gambar</label>
            <input type="text" name="gambar" class="form-control" value="<?= $data['gambar'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Link Referensi</label>
            <input type="text" name="link" class="form-control" value="<?= $data['link_ref'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="kelola_artikel.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>