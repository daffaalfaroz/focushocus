<?php

include 'connect.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data pemesanan
$sql = "SELECT id, nama, email, telepon, paket, tanggal_pemesanan FROM formulir_pemesanan";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pemesanan</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    /* CSS sama seperti sebelumnya */
  </style>
</head>
<body>
  <div class="container">
    <h2>Daftar Pemesanan</h2>

    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Nomor HP</th>
          <th>Paket</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Periksa apakah query berhasil
        if ($result !== false && $result->num_rows > 0) {
          $no = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
            echo "<td>" . htmlspecialchars($row['paket']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_pemesanan']) . "</td>";
            echo "<td><button onclick=\"showEditForm(" . $row['id'] . ")\">Edit</button></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7'>Tidak ada data.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <div id="editForm" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Pemesanan</h3>
        <form id="edit_form" method="post" action="update_pemesanan.php">
          <input type="hidden" name="id" id="edit_id">

          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="edit_nama" required>

          <label for="email">Email:</label>
          <input type="email" name="email" id="edit_email" required>

          <label for="telepon">Nomor Telepon:</label>
          <input type="text" name="telepon" id="edit_telepon" required>

          <label for="paket">Paket:</label>
          <input type="text" name="paket" id="edit_paket" required>

          <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
          <input type="text" name="tanggal_pemesanan" id="edit_tanggal_pemesanan" required>

          <button type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function showEditForm(id) {
      $('#edit_id').val(id);

      // Ambil data pemesanan berdasarkan ID dan isikan ke formulir
      $.ajax({
        url: 'get_pemesanan.php',
        data: { id: id },
        method: 'GET',
        success: function (response) {
          var data = JSON.parse(response);
          $('#edit_nama').val(data.nama);
          $('#edit_email').val(data.email);
          $('#edit_telepon').val(data.telepon);
          $('#edit_paket').val(data.paket);
          $('#edit_tanggal_pemesanan').val(data.tanggal_pemesanan);
          $('#editForm').show();
        },
        error: function () {
          alert('Gagal mengambil data.');
        }
      });
    }

    $(document).ready(function () {
      $('.close').click(function () {
        $('#editForm').hide();
      });
    });
  </script>
</body>
</html>

<?php
$conn->close();
?>
