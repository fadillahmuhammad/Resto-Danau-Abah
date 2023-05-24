<!-- koneksi database -->
<?php
$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "danau_abah"

);
// function filter($data){
//     global $koneksi;
//     return $koneksi->real_escape_string(htmlspecialchars(trim($data)));
// }
?>