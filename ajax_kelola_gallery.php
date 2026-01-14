<?php
include "koneksi.php";

$keyword = $_GET['keyword'];
$sql = "SELECT * FROM gallery WHERE judul LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' ORDER BY id DESC";
$result = $conn->query($sql);
$no = 1;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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
<?php
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan</td></tr>";
}
?>