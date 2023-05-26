<?php
include "../auth/koneksi.php";

$id = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['id']));

// gallery
$gambar_lama_gallery = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['gambar_lama_gallery']));

$gambar_gallery = htmlspecialchars($_FILES['gambar_gallery']['name']);
$file_tmp_gallery = $_FILES['gambar_gallery']['tmp_name'];

// gallery
// cek if have new foto
if ($file_tmp_gallery) {
    // delete old foto
    unlink('../images/img-gallery/' . $gambar_lama_gallery);

    move_uploaded_file($file_tmp_gallery, '../images/img-gallery/' . $gambar_gallery);

    // query update gallery

    $query = "UPDATE gallery SET gambar = '$gambar_gallery' WHERE id_gallery = '$id'";

    mysqli_query($koneksi, $query)
        or die("Query gagal dijalankan: " . mysqli_error($koneksi));
    header("location: ../page/dashboard.php");
}
