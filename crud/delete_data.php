<?php
include "../auth/koneksi.php";

if (isset($_POST['id']) && isset($_GET['tabel'])) {
    $id = $_POST['id'];
    $tabel = $_GET['tabel'];

    if ($tabel == "makanan") {
        // Ambil nama file gambar dari database
        $query_delete_path = "SELECT gambar_makanan FROM makanan WHERE id_makanan = '$id'";
        $result = mysqli_query($koneksi, $query_delete_path);
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar_makanan'];

        // query delete makanan
        $query = "DELETE FROM makanan WHERE id_makanan = '$id'";

        mysqli_query($koneksi, $query);

        // Hapus file gambar dari folder
        $file_path = "../images/img-menu/" . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Perbarui urutan id_makanan di tabel makanan
        $query_update = "ALTER TABLE makanan AUTO_INCREMENT=1";
        mysqli_query($koneksi, $query_update);
        $query_update = "SET @count = 0";
        mysqli_query($koneksi, $query_update);
        $query_update = "UPDATE makanan SET id_makanan = @count:= @count + 1";
        mysqli_query($koneksi, $query_update);
    } else if ($tabel == "minuman") {
        // Ambil nama file gambar dari database
        $query_delete_path = "SELECT gambar_minuman FROM minuman WHERE id_minuman = '$id'";
        $result = mysqli_query($koneksi, $query_delete_path);
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar_minuman'];

        // query delete minuman
        $query = "DELETE FROM minuman WHERE id_minuman = '$id'";

        mysqli_query($koneksi, $query);

        // Hapus file gambar dari folder
        $file_path = "../images/img-menu/" . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Perbarui urutan id_minuman di tabel minuman
        $query_update = "ALTER TABLE minuman AUTO_INCREMENT=1";
        mysqli_query($koneksi, $query_update);
        $query_update = "SET @count = 0";
        mysqli_query($koneksi, $query_update);
        $query_update = "UPDATE minuman SET id_minuman = @count:= @count + 1";
        mysqli_query($koneksi, $query_update);
    } else if ($tabel == "gallery") {
        // Ambil nama file gambar dari database
        $query_delete_path = "SELECT gambar FROM gallery WHERE id_gallery = '$id'";
        $result = mysqli_query($koneksi, $query_delete_path);
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar'];

        // query delete gallery
        $query = "DELETE FROM gallery WHERE id_gallery = '$id'";

        mysqli_query($koneksi, $query);

        // Hapus file gambar dari folder
        $file_path = "../images/img-gallery/" . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Perbarui urutan id_gallery di tabel gallery
        $query_update = "ALTER TABLE gallery AUTO_INCREMENT=1";
        mysqli_query($koneksi, $query_update);
        $query_update = "SET @count = 0";
        mysqli_query($koneksi, $query_update);
        $query_update = "UPDATE gallery SET id_gallery = @count:= @count + 1";
        mysqli_query($koneksi, $query_update);
    }
}
