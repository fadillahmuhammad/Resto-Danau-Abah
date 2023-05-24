<?php 
include '../auth/koneksi.php';

$id = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['id']));
$desc = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['desc']));

$query = "UPDATE about_us SET paragraf = '$desc' WHERE id_about = '$id'";
mysqli_query($koneksi, $query)
    or die("Query gagal dijalankan: " . mysqli_error($koneksi));
header("location: ../page/dashboard.php");
