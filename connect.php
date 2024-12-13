<?php
$conn = new mysqli("localhost", "root", "", "focushocus");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }
?>