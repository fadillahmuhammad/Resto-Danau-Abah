<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Admin & Dashboard</title>
  <link rel="stylesheet" href="../css/dashboardstyle.css">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
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
        <a href="#" id="gallery" class="sidebar-item">
          <i class='bx bxs-photo-album'></i>
          <span class="links_name">
            Gallery
          </span>
        </a>
      </li>
      <li>
        <a href="#" id="reservation" class="sidebar-item">
          <i class='bx bxs-book-open'></i>
          <span class="links_name">
            Reservation
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
        <a href="#">
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

  <!-- feather icon -->
  <script>
    feather.replace()
  </script>

  <!-- jquey -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- javascript -->
  <script src="../js/dashboard.js"></script>
</body>

</html>