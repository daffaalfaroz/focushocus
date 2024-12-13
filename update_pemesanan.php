<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "focushocus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $telepon = $conn->real_escape_string($_POST['telepon']);
    $paket = $conn->real_escape_string($_POST['paket']);
    $tanggal_pemesanan = $conn->real_escape_string($_POST['tanggal_pemesanan']);

    $sql = "UPDATE pemesanan SET 
            nama='$nama', email='$email', telepon='$telepon', 
            paket='$paket', tanggal_pemesanan='$tanggal_pemesanan' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
