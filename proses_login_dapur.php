<?php
session_start();

// Array untuk menyimpan username dan password
$users = [
    'dapur' => '123' // Username dapur dan password
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password_input = trim($_POST['password']);

    // Cek apakah username ada dalam array
    if (array_key_exists($username, $users)) {
        // Verifikasi password
        if ($password_input === $users[$username]) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: pesanan_dapur.php"); // Arahkan ke halaman pesanan dapur
            exit();
        } else {
            $_SESSION['login_error'] = "Username atau password salah!";
            header("Location: login_dapur.php"); // Kembali ke halaman login
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Username atau password salah!";
        header("Location: login_dapur.php"); // Kembali ke halaman login
        exit();
    }
}
?>