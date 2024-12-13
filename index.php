<?php
session_start();

// Memeriksa apakah pengguna memiliki akses berdasarkan role
function check_roles($allowed_roles) {
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowed_roles)) {
        header('Location: login.php'); // Redirect jika tidak memiliki akses
        exit;
    }
}

// Pastikan pengguna memiliki role yang sesuai
check_roles(['admin']);// Sesuaikan role yang diizinkan

// Menampilkan pesan sukses jika ada
if (isset($_SESSION['pesan_sukses'])) {
    echo "<div class='notif'>
            <span>{$_SESSION['pesan_sukses']}</span>
            <button class='close-btn' onclick='closeNotif()'>Verifikasi</button>
          </div>";
    unset($_SESSION['pesan_sukses']); // Hapus pesan setelah ditampilkan
}
?>

<!-- HTML untuk halaman lainnya -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pemesanan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styling untuk notifikasi mengambang */
        .notif {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #eb5424;
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 400px;
            width: 100%;
        }

        .notif span {
            font-family: 'Proxima', sans-serif;
            font-size: 16px;
        }

        .close-btn {
            background-color: transparent;
            color: white;
            border: none;
            font-family: 'Proxima Bold', sans-serif;
            font-size: 16px;
            cursor: pointer;
            padding: 5px 10px;
            margin-left: 20px;
            transition: background-color 0.3s;
        }

        .close-btn:hover {
            background-color: #ffffff;
            color: #eb5424;
        }
    </style>
</head>
<body>
    <!-- Konten halaman lainnya -->

    <script>
        function closeNotif() {
            const notif = document.querySelector('.notif');
            notif.style.display = 'none'; // Menyembunyikan notifikasi
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Focus-Hocus</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- FILE CSS STYLESHEET -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<!-- bagian preloader -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<!-- bagian home -->
<section id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="wow bounceInDown rotate">Focus-Hocus</h1>
                <h2 class="wow bounce">Studio Foto</h2>
                <a href="#intro" class="btn btn-default smoothScroll">MULAI</a>
            </div>
        </div>
    </div>
</section>
<!-- bagian navigasi -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span> 
            </button>
            <a href="#" class="navbar-brand">Focus-Hocus</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="smoothScroll">BERANDA</a></li>
                <li><a href="#intro" class="smoothScroll">PENDAHULUAN</a></li>
                <li><a href="#work" class="smoothScroll">LAYANAN</a></li>
                <li><a href="#team" class="smoothScroll">TIM</a></li>
                <li><a href="#portfolio" class="smoothScroll">PORTFOLIO</a></li>
                <li><a href="#price" class="smoothScroll">HARGA</a></li>
                <li><a href="list_pemesanan.php">LIST</a></li>
                <li><a href="#" id="logoutBtn" class="smoothScroll">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Tambahkan skrip JavaScript untuk konfirmasi logout -->
<script>
    // Menambahkan event listener ke tombol logout
    document.getElementById("logoutBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah langsung mengarah ke logout.php

        // Tampilkan konfirmasi
        if (confirm("Apakah Anda yakin ingin logout?")) {
            // Jika pengguna memilih 'OK', arahkan ke halaman logout
            window.location.href = "logout.php"; // Halaman logout yang menangani sesi
        } else {
            // Jika pengguna memilih 'Batal', tidak lakukan apa-apa
            return;
        }
    });
</script>
<!-- bagian intro -->
<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 title">
                <h4>SELAMAT DATANG DI FOCUS-HOCUS</h4>
                <h2>Fotografi &amp; Studio Digital</h2>
                <hr>
                <p>Focus-Hocus adalah platform sewa jasa fotografer yang menawarkan layanan fotografi profesional untuk kebutuhan foto produk. Kami menyediakan layanan terbaik untuk para customer kami.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- bagian pekerjaan -->
<section id="work">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 title bg-black">
                <h2 style="color: white;">Layanan</h2>
                <hr>
                <p style="max-width: 1000px; margin: 0 auto;">
    Menyediakan layanan penyewaan jasa fotrografi berkulitas tinggi. Dengan sentuhan magis dari fotografer profesional ternama. Kami menjanjikan hasil terbaik di setiap jepretannya.
               </p>
            </div>
</section>
<!-- bagian tim -->
<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
                <h2>Tim Kami</h2>
                <hr>
                <p>Tim kami berisikan orang-orang yang berpengalaman dalam bidang fotografi. Kami menjamin bahwa profesionalisme dan kejujuran adalah ciri khas kami.</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="0.9s">
                <img src="images/team1.jpeg" class="img-responsive" alt="gambar tim">
                <div class="team-des">
                    <h4>Sinta</h4>
                    <h3>Editor</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.3s">
                <img src="images/team2.jpeg" class="img-responsive" alt="gambar tim">
                <div class="team-des">
                    <h4>Riya</h4>
                    <h3>Manajer</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.6s">
                <img src="images/team3.jpeg" class="img-responsive" alt="gambar tim">
                <div class="team-des">
                    <h4>Dhila</h4>
                    <h3>Fotografer</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- bagian portfolio -->
<div id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
                <h2>Portfolio</h2>
                <hr>
                <p>Di bawah ini adalah hasil dari tangan magis tim kami. Mengedepankan kualitas dan kreativitas adalah cara kami menghasilkan karya.</p>
            </div>
            <div class="col-md-12 col-sm-12"></div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img1.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img1.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img2.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img2.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img3.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img3.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img4.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img4.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img5.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img5.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img6.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img6.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img7.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img7.jpg" alt="gambar portfolio">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="images/portfolio-img8.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="images/portfolio-img8.jpg" alt="gambar portfolio">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- bagian harga -->
<div id="price">
    <div class="container">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
            <h2>Paket Kami</h2>
            <hr>
            <p>Kami memberikan harga terbaik untuk customer kami. Dengan mempertimbangkan kualitas dan kepuasan customer kami.</p>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.3s">
                <div class="plan_title">
                    <h3>Dasar</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>Rp.250.000</h2>
                    <small>Per sesi</small> 
                </div>
                <ul>
                    <li>5 GB RUANG</li>
                    <li>5 TEMA DASAR</li>
                </ul>
                <a href="pemesanan.php?plan=Dasar" class="btn btn-warning">Mulai</a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.6s">
                <div class="plan_title">
                    <h3>Bisnis</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>Rp.500.000</h2>
                    <small>Per sesi</small> 
                </div>
                <ul>
                    <li>10 GB RUANG</li>
                    <li>5 TEMA PRO</li>
                </ul>
                <a href="pemesanan.php?plan=Bisnis" class="btn btn-warning">Mulai</a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.9s">
                <div class="plan_title">
                    <h3>Profesional</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>Rp.750.000</h2>
                    <small>Per sesi</small> 
                </div>
                <ul>
                    <li>15 GB RUANG</li>
                    <li>10 TEMA PRO</li>
                </ul>
                <a href="pemesanan.php?plan=Profesional" class="btn btn-warning">Mulai</a>
            </div>
        </div>
    </div>
</div>
<!-- bagian footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="wow fadeIn" data-wow-delay="0.9s">Ikuti Kami</h2>
                <ul class="social-icon">
                    <li><a href="https://www.instagram.com/skyy_capcher/profilecard/?igsh=NjQ1cWcxOWJjZmVq" class="fa fa-instagram wow bounceIn" data-wow-delay="0.6s"></a></li>
                    <li><a href="https://wa.me/0895324405479" class="fa fa-whatsapp wow bounceIn" data-wow-delay="0.9s"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- FILE JAVASCRIPT JS --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>
