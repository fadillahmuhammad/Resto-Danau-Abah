<?php
include "auth/koneksi.php";

$category = $_GET['category'];

$data = mysqli_query($koneksi, "SELECT * FROM minuman WHERE id_jenis_minuman='$category' ORDER BY id_minuman ASC");
while ($row = mysqli_fetch_array($data)) {
    echo '<div class="menu-card">';
    echo '<img class="menu-image" src="images/' . $row['gambar_minuman'] . '" ' . 'alt="Menu Image">';
    echo '<span class="menu-price"><p>' . $row['harga_minuman'] . '</p></span>';
    echo '<span class="menu-name"><h3>' . $row['nama_minuman'] . '</h3></span>';
    echo '</div>';
}
?>