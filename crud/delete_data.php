<?php
include "../auth/koneksi.php";

if (isset($_POST['id']) && isset($_GET['tabel'])) {
    $id = $_POST['id'];
    $tabel = $_GET['tabel'];

    if ($tabel == "makanan") {
        // query delete makanan
        $query = "DELETE FROM makanan WHERE id_makanan = '$id'";

        mysqli_query($koneksi, $query);

        // Perbarui urutan id_makanan di tabel makanan
        $query_update = "ALTER TABLE makanan AUTO_INCREMENT=1";
        mysqli_query($koneksi, $query_update);
        $query_update = "SET @count = 0";
        mysqli_query($koneksi, $query_update);
        $query_update = "UPDATE makanan SET id_makanan = @count:= @count + 1";
        mysqli_query($koneksi, $query_update);
    } else if ($tabel == "minuman") {
        // query delete minuman
        $query = "DELETE FROM minuman WHERE id_minuman = '$id'";

        mysqli_query($koneksi, $query);

        // Perbarui urutan id_minuman di tabel minuman
        $query_update = "ALTER TABLE minuman AUTO_INCREMENT=1";
        mysqli_query($koneksi, $query_update);
        $query_update = "SET @count = 0";
        mysqli_query($koneksi, $query_update);
        $query_update = "UPDATE minuman SET id_minuman = @count:= @count + 1";
        mysqli_query($koneksi, $query_update);
    }
}
