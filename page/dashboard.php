<?php
// Mulai sesi PHP
session_start();

// Cek apakah tidak ada data 'user_id' yang dikirim melalui form
if (!isset($_SESSION['user_id'])) {
  // Hapus semua variabel sesi
  session_unset();
  // Hancurkan sesi
  session_destroy();
  header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/dashboardstyle1.css">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <div class="logo_details">
        <i class='bx bxs-dashboard'></i>
        <div class="logo_name">
          Danau Abah
        </div>
      </div>
      <ul>
        <li>
          <a href="#" id="dashboard" class="sidebar-item active">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">
              Dashboard
            </span>
          </a>
        </li>
        <li>
          <a href="#" id="foods" class="sidebar-item">
            <i class='bx bxs-bowl-hot'></i>
            <span class="links_name">
              Foods
            </span>
          </a>
        </li>
        <li>
          <a href="#" id="beverages" class="sidebar-item">
            <i class='bx bxs-drink'></i>
            <span class="links_name">
              Beverages
            </span>
          </a>
        </li>
        <li>
          <a href="#" id="help" class="sidebar-item">
            <i class='bx bxs-help-circle'></i>
            <span class="links_name">
              Help
            </span>
          </a>
        </li>
        <li class="login">
          <a href="../auth/logout_success.php">
            <span class="links_name login_out">
              Login Out
            </span>
            <i class='bx bx-log-out' id="log_out"></i>
          </a>
        </li>
      </ul>
    </div>
    <!-- End Sideber -->
    <section class="home_section">
      <div class="topbar">
        <div class="toggle">
          <i class='bx bx-menu' id="btn"></i>
        </div>
      </div>
      <!-- End Top Bar -->

      <!-- dashboard_page start -->
      <div id="content"></div>
      <!-- dashboard_page end -->

    </section>
  </div>

  <!-- feather icon -->
  <script>
    feather.replace()
  </script>

  <!-- jquey -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">\
    // Mengirim permintaan AJAX untuk menghapus sesi saat halaman ditutup
    window.addEventListener('beforeunload', function () {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '../auth/logout_success.php', false);
      xhr.send();
    });
  </script>

  <!-- javascript -->
  <script src="../js/dashboard.js"></script>
</body>

</html>