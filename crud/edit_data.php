<?php
include "../auth/koneksi.php";

$tabel = $_GET['tabel'];
$id = mysqli_real_escape_string($koneksi, $_POST['id']);
$jenis = mysqli_real_escape_string($koneksi, $_POST['list']);
$nama = mysqli_real_escape_string($koneksi, $_POST['name']);
$harga = mysqli_real_escape_string($koneksi, $_POST['price']);
$gambar_lama = mysqli_real_escape_string($koneksi, $_POST['gambar_lama']);

$gambar = $_FILES['gambar']['name'];
$file_tmp = $_FILES['gambar']['tmp_name'];

// cek if have new foto
if ($file_tmp) {
    // delete old foto
    unlink('../images/img-menu/' . $gambar_lama);

    move_uploaded_file($file_tmp, '../images/img-menu/' . $gambar);

    if ($tabel == "makanan") {
        // query update makanan

        $query = "UPDATE makanan SET id_jenis_makanan = '$jenis', nama_makanan = '$nama', harga_makanan = '$harga', gambar_makanan = '$gambar' WHERE id_makanan = '$id'";

        mysqli_query($koneksi, $query)
            or die("Query gagal dijalankan: " . mysqli_error($koneksi));
        header("location: ../page/dashboard.php");

    } else if ($tabel == "minuman") {
        // query update minuman

        $query = "UPDATE minuman SET id_jenis_minuman = '$jenis', nama_minuman = '$nama', harga_minuman = '$harga', gambar_minuman = '$gambar' WHERE id_minuman = '$id'";

        mysqli_query($koneksi, $query)
            or die("Query gagal dijalankan: " . mysqli_error($koneksi));
        header("location: ../page/dashboard.php");
    }
} else {
    if ($tabel == "makanan") {
        // query update makanan

        $query = "UPDATE makanan SET id_jenis_makanan = '$jenis', nama_makanan = '$nama', harga_makanan = '$harga' WHERE id_makanan = '$id'";

        mysqli_query($koneksi, $query)
            or die("Query gagal dijalankan: " . mysqli_error($koneksi));
        header("location: ../page/dashboard.php");

    } else if ($tabel == "minuman") {
        // query update minuman

        $query = "UPDATE minuman SET id_jenis_minuman = '$jenis', nama_minuman = '$nama', harga_minuman = '$harga' WHERE id_minuman = '$id'";

        mysqli_query($koneksi, $query)
            or die("Query gagal dijalankan: " . mysqli_error($koneksi));
        header("location: ../page/dashboard.php");
    }
}


?>