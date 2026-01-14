<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wuthering Waves Fan Site</title>

    <script>
        if (localStorage.getItem('wuwa_login') !== 'true') {
            alert("Eits! Anda harus login dulu!");
            window.location.href = 'login.php';
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" href="https://wutheringwaves.kurogames.com/favicon.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

        /* --- CSS DASAR --- */
        body {
            background-color: #F4F7F9; 
            color: #2D3748; 
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        /* --- DARK MODE STYLES --- */
        body.dark-mode {
            background-color: #121212 !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode .card {
            background-color: #1e1e1e;
            color: #ffffff;
            border-color: #333;
        }

        body.dark-mode .bg-white {
            background-color: #1e1e1e !important;
        }

        body.dark-mode .text-muted {
            color: #a0a0a0 !important;
        }
        
        body.dark-mode .bg-light {
            background-color: #2c2c2c !important; 
        }

        body.dark-mode footer {
            background-color: #000000 !important;
        }

        /* Fix untuk list group di dark mode */
        body.dark-mode .list-group-item {
            background-color: #1e1e1e;
            color: #e0e0e0;
            border-color: #333;
        }

        /* --- HERO SECTION UTILS --- */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('banner.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            position: relative;
        }

        /* Jam Realtime style */
        #realtime-clock {
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            display: inline-block;
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(5px);
        }

        /* --- SCROLL TO TOP BUTTON --- */
        #scrollToTopBtn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: none; 
            z-index: 99;
            border: none;
            outline: none;
            background-color: #0d6efd;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%; 
            box-shadow: 0px 4px 10px rgba(0,0,0,0.3);
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 20px;
        }

        #scrollToTopBtn:hover {
            background-color: #0b5ed7;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-controller"></i> WuWa FanBase
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#articles">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <div class="btn-group" role="group" aria-label="Theme Switcher">
                            <button type="button" class="btn btn-outline-warning btn-sm" onclick="setTheme('light')" title="Light Mode">
                                <i class="bi bi-brightness-high-fill"></i> Light
                            </button>
                            <button type="button" class="btn btn-outline-warning btn-sm" onclick="setTheme('dark')" title="Dark Mode">
                                <i class="bi bi-moon-stars-fill"></i> Dark
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section text-center">
        <div class="container">
            <div id="realtime-clock">
                Memuat Waktu...
            </div>
            <h1 class="display-4 fw-bold">Selamat Datang di Dunia Wuthering Waves</h1>
            <p class="lead">Jelajahi Solaris-3 dan temukan misteri di balik Tacet Discord</p>
            <a href="#about" class="btn btn-primary btn-lg mt-3">Jelajahi Sekarang</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center flex-md-row-reverse">
            </div>
            <div class="col-md-8">
                    <h2 class="fw-bold mb-4">Tentang Resonator</h2>
                    <div class="card p-4 h-100">
                        <h4 class="mb-3">Biodata Pengembang</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-person-circle me-2 text-primary"></i> <strong>Nama:</strong> Dafi Hauzan Atsillah Hoenarko</li>
                            <li class="mb-2"><i class="bi bi-card-text me-2 text-primary"></i> <strong>NIM:</strong> A11.2024.15851</li>
                            <li class="mb-2"><i class="bi bi-mortarboard-fill me-2 text-primary"></i> <strong>Jurusan:</strong> Teknik Informatika S1</li>
                        </ul>
                        <p class="mt-3 text-muted">Selamat datang di dunia Resonator! Website ini berisi informasi tentang game Wuthering Waves.</p>
                    </div>
                </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Artikel Terbaru WuWa</h2>
            
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <input type="text" id="keyword" class="form-control form-control-lg" placeholder="Cari artikel (ketik: Rover, Yinlin, dll)...">
                </div>
            </div>

            <div class="row g-4" id="article-container">
                
                <?php
                // READ DATA PHP (tampilkan data awal saat load)
                include "koneksi.php";
                $sql = "SELECT * FROM artikel";
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
                    } // end while
                } else {
                    echo "<p class='text-center'>Belum ada artikel.</p>";
                }
                ?>

            </div>
        </div>
    </section>

    <!-- Gallery Section -->
<section id="gallery" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Gallery Karakter Wuthering Waves</h2>
            <div class="row g-4">
                
                <?php
                // MENGAMBIL DATA GALLERY DARI DATABASE
                include "koneksi.php";
                $sql_gallery = "SELECT * FROM gallery ORDER BY id ASC";
                $res_gallery = $conn->query($sql_gallery);

                if ($res_gallery->num_rows > 0) {
                    while($g = $res_gallery->fetch_assoc()){
                ?>
                    <div class="col-md-4">
                        <div class="card h-100 character-card">
                            <img src="<?= htmlspecialchars($g['gambar']) ?>" class="card-img-top gallery-img" alt="<?= htmlspecialchars($g['judul']) ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold"><?= htmlspecialchars($g['judul']) ?></h5>
                                <p class="card-text text-muted"><?= htmlspecialchars($g['deskripsi']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                    } // end while
                } else {
                    echo '<div class="col-12 text-center"><p class="text-muted">Belum ada data gallery.</p></div>';
                }
                ?>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Bergabung Menjadi Resonator</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body p-5">
                            <form onsubmit="alert('Terima kasih! Pesan Anda telah terkirim (Simulasi).'); return false;">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">
                                            <i class="bi bi-person"></i> Nama Lengkap:
                                        </label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                            <i class="bi bi-envelope"></i> Email:
                                        </label>
                                    <input type="email" class="form-control" id="email" placeholder="contoh@dinus.ac.id" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="form-label">
                                            <i class="bi bi-calendar"></i> Tanggal Lahir:
                                        </label>
                                    <input type="date" class="form-control" id="tgl_lahir" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">
                                            <i class="bi bi-telephone"></i> Nomor Telepon:
                                        </label>
                                    <input type="tel" class="form-control" id="telepon" placeholder="contoh: 0895878461277" required>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="bi bi-send"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 Tugas Javascript.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="https://wutheringwaves.kurogames.com/en/" target="_blank" class="text-white">Wuthering Waves Official Website</a>
                </div>
            </div>
        </div>
    </footer>

    <button onclick="topFunction()" id="scrollToTopBtn" title="Kembali ke atas">
        <i class="bi bi-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        // 1. JAM REALTIME
        function updateClock() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = now.toLocaleDateString('id-ID', options);
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            document.getElementById('realtime-clock').innerHTML = `${dateString} | ${timeString}`;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // 2. THEME SWITCHER
        function setTheme(theme) {
            const body = document.body;
            const navbar = document.getElementById('mainNavbar');
            const articleSection = document.getElementById('articles');
            const contactSection = document.getElementById('contact');

            if (theme === 'dark') {
                body.classList.add('dark-mode');
                
                navbar.classList.remove('navbar-light', 'bg-white');
                navbar.classList.add('navbar-dark', 'bg-dark');

                // Hilangkan bg-light dari section tertentu agar tidak bentrok dengan dark mode
                if(articleSection) articleSection.classList.remove('bg-light');
                if(contactSection) contactSection.classList.remove('bg-light');
                
            } else {
                body.classList.remove('dark-mode');
                
                navbar.classList.remove('navbar-dark', 'bg-dark');
                navbar.classList.add('navbar-light', 'bg-white');

                // Kembalikan bg-light
                if(articleSection) articleSection.classList.add('bg-light');
                if(contactSection) contactSection.classList.add('bg-light');
            }
        }

        // 3. SCROLL TO TOP
        let mybutton = document.getElementById("scrollToTopBtn");
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // event ketika user akan mengetik di kolom pencarian
            $('#keyword').on('keyup', function() {
                var nilaiPencarian = $(this).val();

                // fungsi .load() dari JQuery adalah untuk mengambil data dari ajax_cari.php
                $('#article-container').load('ajax_cari.php?keyword=' + nilaiPencarian);
            });
        });
    </script>
</body>
</html>