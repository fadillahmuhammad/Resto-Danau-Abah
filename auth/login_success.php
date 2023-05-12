<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "danau_abah";

// Membuat objek PDO untuk menghubungkan ke database
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

// apakah metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";

    // Mempersiapkan pernyataan SQL
    $statement = $pdo->prepare($query);
    // Menjalankan pernyataan SQL dengan mengganti placeholder dengan nilai yang diberikan
    $statement->execute([$username, $password]);
    // Mengambil baris hasil dari hasil kueri
    $user = $statement->fetch();

    if ($user) {
        // Menyimpan ID pengguna dalam sesi
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../page/dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Username atau password salah!";
        header("Location: ../login.php");
        exit();
    }
}
?>