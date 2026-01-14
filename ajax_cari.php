<?php
include "koneksi.php";

$keyword = $_GET['keyword'];

// query pencarian
$sql = "SELECT * FROM artikel WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <?php if($row['gambar'] != ""): ?>
                <img src="<?= $row['gambar'] ?>" class="card-img-top" alt="img" style="height: 200px; object-fit: cover;">
            <?php else: ?>
                <div class="card-body text-center"><i class="bi bi-book-half fs-1 text-primary"></i></div>
            <?php endif; ?>
            
            <div class="card-body">
                <h5 class="card-title fw-bold"><?= $row['judul'] ?></h5>
                <p class="card-text"><?= $row['isi'] ?></p>
                <a href="<?= $row['link_ref'] ?>" class="btn btn-sm btn-outline-primary mt-2">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
<?php
    }
} else {
    echo "<div class='col-12 text-center'><p class='text-muted'>Artikel tidak ditemukan.</p></div>";
}
?>