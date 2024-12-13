<?php
session_start();
require_once 'functions.php'; // Pastikan fungsi untuk memeriksa pengguna terdaftar ada di sini

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ganti dengan logika autentikasi Anda
    if (authenticate_user($username, $password)) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin'; // Set role sesuai dengan pengguna
        header('Location: index.php'); // Redirect ke halaman utama setelah login
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - Focus-Hocus</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Gaya tambahan sesuai tema -->
    <style>
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
            color: #606060;
            margin: 0;
            padding: 0;
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
            text-align: center;
        }

        form {
            background: #202020;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        label {
            font-family: 'Proxima', sans-serif;
            font-size: 16px;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 0;
            border: 1px solid #eb5424;
            border-radius: 4px;
            font-family: 'Proxima', sans-serif;
            font-size: 14px;
            box-sizing: border-box; 
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
            width: 100%; /* Make button full width */
        }

        .btn:hover {
            background: #ffffff;
            color: #eb5424;
        }

        /* Centering error/success message */
        .message {
            margin-bottom: 20px;
            text-align: center;
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
<div class="container" style="margin-top: 100px;">
    <h2 class="text-center" style="font-family: 'Proxima', sans-serif;">Login ke Focus-Hocus</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="login.php" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="username" class="control-label col-sm-2" style="font-family: 'Proxima', sans-serif;">Username:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="control-label col-sm-2" style="font-family: 'Proxima', sans-serif;">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
