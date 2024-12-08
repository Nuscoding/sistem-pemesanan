<?php
session_start();

// Array untuk menyimpan username dan password
$users = [
    'kasir' => '123' // Username kasir dan password
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
            header("Location: pesanan_kasir.php"); // Arahkan ke halaman pesanan kasir
            exit();
        } else {
            $_SESSION['login_error'] = "Username atau password salah!";
            header("Location: login_kasir.php"); // Kembali ke halaman login
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Username atau password salah!";
        header("Location: login_kasir.php"); // Kembali ke halaman login
        exit();
    }
}
?>