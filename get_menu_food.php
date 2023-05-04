<?php
include "auth/koneksi.php";

$category = $_GET['category'];

$data = mysqli_query($koneksi, "SELECT * FROM makanan WHERE id_jenis_makanan='$category' ORDER BY id_makanan ASC");
while ($row = mysqli_fetch_array($data)) {
    echo '<div class="menu-card">';
    echo '<img class="menu-image" src="images/img-menu/' . $row['gambar_makanan'] . '" ' . 'alt="Menu Image">';
    echo '<span class="menu-price"><p>' . $row['harga_makanan'] . '</p></span>';
    echo '<span class="menu-name"><h3>' . $row['nama_makanan'] . '</h3></span>';
    echo '</div>';
}
?>