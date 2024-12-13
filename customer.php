<?php

function check_roles($allowed_roles) {
  session_start();

  // Pastikan user sudah login dan memiliki role
  if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowed_roles)) {
      header('Location: login.php'); // Redirect jika tidak memiliki akses
      exit;
  }
}

require 'functions.php';
$sql = query ("SELECT * FROM datapengunjung ORDER BY id DESC");

//tombol search
if (isset($_POST["temukan"])){
  $sql = temukan($_POST['search']);
}

check_roles(['admin']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyful Travel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #009ada;">
  <div class="container-fluid">
  <a class="navbar-brand text-white" style="font-family:Arial;" href="#"><img src="img/logo1.png" width="60x" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="guest.php">Riwayat Reservasi</a>
        </li>
      </ul> -->
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link text-white" onclick="return confirm('Anda Yakin Ingin Keluar?')" href="logout.php">Logout</a> 
      </li>
    </ul>
  </div>
</nav>

<div class="bg-light p-4 mb-2">
<div class="container p-3 my-3  bg-white">
<div class="d-flex justify-content-between">

    <div>
        <h3>Riwayat Pemesenan</h3>
        <hr>
    </div>

    <form action="" method="post" class="d-flex p-2">
        <input name="search" type="search" class="form-control me-2 p-1 m-1" autocomplete="off" placeholder="Search by name">
        <button name="temukan" type="submit" class="btn btn-sml btn-primary p-1 m-1 text-white">Search</button>
    </form>
    <br>

      <!-- <a href="reservasi.php" class="btn btn-sml btn-outline-primary p-1 m-1 mb-4">Reservasi</a> -->

</div>

<div class="container p-3 my-3 bg-white">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Paket</th>
        <th scope="col">Tanggal Pemotretan</th>
        <th scope="col">Telpon</th>
        </tr>
    </thead>
    <tbody>
        <?php  $i=1; ?>
        <?php foreach ($sql as $row): ?>
        <tr>
        <th><?= $i; ?></th>
        <td><?= $row["id"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["paket"]; ?></td>
        <td><?= $row["tanggal"]; ?></td>
        <td><?= $row["telpon"]; ?></td>
        <td>
        <a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Pemesanan?')" class="btn btn-sml btn-outline-info">Batal</a>
        <a href="update.php?id=<?=$row["id"];?>" class="btn btn-sml btn-outline-primary">Ubah</a>                    
        </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
</div>
</div>
</div>

<footer class="fixed-bottom text-center text-white" style="background-color: #009ada;">
  <!-- Grid container -->
  <div class="container p-4"></div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2024 Copyright:
  <a class="text-white" href="http://localhost/FocusHocus/guest.php">Focus-Hocus.com</a>
  </div>
  <!-- Copyright -->
</footer>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>