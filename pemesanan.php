<?php
// Mulai sesi
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "focushocus";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penyimpanan data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $nomor_hp = $conn->real_escape_string($_POST['telepon']);
    $paket = $conn->real_escape_string($_POST['paket']);
    $tanggal_pemesanan = $conn->real_escape_string($_POST['tanggal_pemesanan']);

    $sql = "INSERT INTO formulir_pemesanan (nama, email, telepon, paket, tanggal_pemesanan) 
            VALUES ('$nama', '$email', '$nomor_hp', '$paket', '$tanggal_pemesanan')";

    if ($conn->query($sql) === TRUE) {
        // Set pesan sukses ke sesi
        $_SESSION['pesan_sukses'] = "Pemesanan berhasil disimpan!";

        // Arahkan pengguna ke halaman index.php setelah beberapa detik
        header("Location: index.php");
        exit();  // Pastikan script berhenti setelah pengalihan
    } else {
        $pesan_error = "Gagal menyimpan data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pemesanan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Tambahkan font Proxima dan Proxima Bold */
        @font-face {
            font-family: 'Proxima';
            src: url('fonts/ProximaNova-Regular.otf');
        }
        @font-face {
            font-family: 'Proxima Bold';
            src: url('fonts/ProximaNova-Bold.otf');
        }
        body {
            font-family: 'Proxima', sans-serif;
            background: #ffffff;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Proxima', sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .title {
            font-family: 'Proxima Bold', sans-serif;
            font-size: 36px;
            margin-bottom: 20px;
            color: #eb5424;
        }
        form {
            background: #202020;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            font-family: 'Proxima', sans-serif;
            font-size: 16px;
            margin-bottom: 8px;
            color: #ffffff;
        }
        .form-control {
            width: 100%; /* Pastikan elemen mengambil lebar penuh kontainer */
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #eb5424;
            border-radius: 4px;
            font-family: 'Proxima', sans-serif;
            font-size: 14px;
            box-sizing: border-box; /* Untuk memastikan padding tidak mempengaruhi lebar elemen */
        }

        /* Menyesuaikan form-control di dalam kolom grid */
        .form-group {
        display: flex;
        flex-direction: column;
        width: 100%; /* Pastikan elemen mengambil lebar penuh pada kolom */
        }

        /* Untuk pengaturan dalam layout grid, pastikan elemen memiliki lebar penuh */
        .row {
        display: flex;
        flex-wrap: wrap;

        }
        .btn {
            background: #eb5424;
            color: #ffffff;
            font-family: 'Proxima Bold', sans-serif;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #ffffff;
            color: #eb5424;
        }
        .message {
            margin-bottom: 20px;
            font-family: 'Proxima', sans-serif;
        }
        .message.success {
            color: #28a745;
        }
        .message.error {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div id="pemesanan">
        <div class="container">
            <h2 class="title">Formulir Pemesanan</h2>
            <hr style="border-color: #eb5424; margin-bottom: 20px;">
            <p>Silakan isi formulir berikut untuk melakukan pemesanan.</p>

            <?php if (!empty($pesan_sukses)): ?>
                <div class="message success"><?php echo $pesan_sukses; ?></div>
            <?php elseif (!empty($pesan_error)): ?>
                <div class="message error"><?php echo $pesan_error; ?></div>
            <?php endif; ?>

            <form method="post" action="pemesanan.php">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP:</label>
                    <input type="text" id="nomor_hp" name="telepon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paket">Pilih Paket:</label>
                    <select id="paket" name="paket" class="form-control" required>
                        <option value="Dasar">Dasar - Rp.250.000/Per sesi</option>
                        <option value="Bisnis">Bisnis - Rp.500.000/Per sesi</option>
                        <option value="Profesional">Profesional - Rp.750.000/Per sesi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
                    <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" class="form-control" required>
                </div>
                <button type="submit" class="btn">Kirim Pemesanan</button>
            </form>
        </div>
    </div>
</body>
</html>
