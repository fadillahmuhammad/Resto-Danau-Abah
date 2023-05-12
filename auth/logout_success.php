<?php
// Mulai sesi PHP
session_start();
// Hapus semua variabel sesi
session_unset();
// Hancurkan sesi
session_destroy();
header("Location: ../login.php");
exit();
?>