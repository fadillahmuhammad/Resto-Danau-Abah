<?php
include "../auth/koneksi.php";

$tabel = $_GET['tabel'];
$jenis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['list']));
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['name']));
$harga = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['price']));

$gambar = htmlspecialchars($_FILES['gambar']['name']);
$file_tmp = $_FILES['gambar']['tmp_name'];
move_uploaded_file($file_tmp, '../images/img-menu/' . $gambar);

if ($tabel == "makanan") {
    // query insert makanan
    $query = "INSERT INTO makanan(id_jenis_makanan, nama_makanan, harga_makanan, gambar_makanan) VALUES ('$jenis','$nama','$harga','$gambar')";

    // Perbarui urutan id_makanan di tabel makanan
    $query_update = "ALTER TABLE makanan AUTO_INCREMENT=1";
    mysqli_query($koneksi, $query_update);
    $query_update = "SET @count = 0";
    mysqli_query($koneksi, $query_update);
    $query_update = "UPDATE makanan SET id_makanan = @count:= @count + 1";
    mysqli_query($koneksi, $query_update);

    mysqli_query($koneksi, $query)
        or die("Query gagal dijalankan: " . mysqli_error($koneksi));
    header("location: ../page/dashboard.php");

} else if ($tabel == "minuman") {
    // query insert minuman
    $query = "INSERT INTO minuman(id_jenis_minuman, nama_minuman, harga_minuman, gambar_minuman) VALUES ('$jenis','$nama','$harga','$gambar')";

    // Perbarui urutan id_makanan di tabel makanan
    $query_update = "ALTER TABLE minuman AUTO_INCREMENT=1";
    mysqli_query($koneksi, $query_update);
    $query_update = "SET @count = 0";
    mysqli_query($koneksi, $query_update);
    $query_update = "UPDATE minuman SET id_minuman = @count:= @count + 1";
    mysqli_query($koneksi, $query_update);

    mysqli_query($koneksi, $query)
        or die("Query gagal dijalankan: " . mysqli_error($koneksi));
    header("location: ../page/dashboard.php");
}
