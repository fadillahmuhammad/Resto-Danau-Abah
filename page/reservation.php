<?php
if (isset($_COOKIE['visits'])) {
    $visits = $_COOKIE['visits'] + 1;
} else {
    $visits = 1;
}
setcookie('visits', $visits, time() + (86400 * 30), "/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- css -->
    <link rel="stylesheet" href="../css/style1.css">
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar">
        <a href="#"><img src="../images/logo_home.png" class="navbar-logo" alt="logo"></a>
        <div class="navbar-flex">
            <div class="navbar-nav">
                <a href="../index.php">Home</a>
                <a href="../#about-us">About Us</a>
                <a href="../#menu">Menu</a>
                <a href="../#contact">Contact</a>
                <a href="../#gallery">Gallery</a>
                <a id="reservation" href="reservation.php">Reservation</a>
            </div>
            <div class="navbar-extra">
                <a id="reservation" href="reservation.php">Reservation</a>
                <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero & carousel section start -->
    <div class="carousel-container reservation-page">
        <div class="carousel-slide">
            <img src="../images/bg3.jpg" alt="Image 1">
        </div>
        <div class="carousel-slide">
            <img src="../images/bg4.jpg" alt="Image 2">
        </div>
        <div class="carousel-slide">
            <img src="../images/bg1.jpg" alt="Image 3">
        </div>
        <div class="carousel-slide">
            <img src="../images/bg4.jpg" alt="Image 4">
        </div>
        <button class="carousel-prev"><i data-feather="chevron-left"></i></button>
        <button class="carousel-next"><i data-feather="chevron-right"></i></button>
        <div class="carousel-indicators">
            <div class="carousel-indicator active" data-index="0"></div>
            <div class="carousel-indicator" data-index="1"></div>
            <div class="carousel-indicator" data-index="2"></div>
            <div class="carousel-indicator" data-index="3"></div>
        </div>
        <span class="reservation-logo"><i data-feather="edit"></i></span>
    </div>
    <!-- hero & carousel section end -->

    <!-- reservation start -->
    <div class="reservation-container">
        <form id="reservation-form" method="get">
            <div class="reservation-flex">
                <div class="side1">
                    <div class="side1-row-left">
                        <div class="side1-left-flex date">
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="side1-left-flex time">
                            <input type="time" id="time" name="time" placeholder="00:00">
                        </div>
                        <div class="side1-left-flex guests">
                            <input type="number" id="guests" name="guests" placeholder="0">
                        </div>
                    </div>
                    <div class="side1-row-right">
                        <div class="side1-right-flex full-name">
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name">
                        </div>
                        <div class="side1-right-flex phone">
                            <input type="tel" name="phone" id="phone" placeholder="Phone" pattern="[0-9]+">
                        </div>
                        <div class="side1-right-flex email">
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="gap-flex">
                    <div class="side2">
                        <h2>Special Request</h2>
                        <div class="special-request">
                            <div class="special-request-flex">
                                <input type="checkbox" name="saung" value="Saung" id="saung">
                                <label for="saung">Saung</label>
                            </div>
                            <div class="special-request-flex">
                                <input type="checkbox" name="lesehan" value="Lesehan" id="lesehan">
                                <label for="lesehan">Lesehan</label>
                            </div>
                            <div class="special-request-flex">
                                <input type="checkbox" name="table" value="Meja Makan" id="table">
                                <label for="table">Meja&nbsp;Makan</label>
                            </div>
                            <div class="special-request-flex">
                                <input type="checkbox" name="private_meeting_room" value="Private Meeting Room" id="private_meeting_room">
                                <label for="private_meeting_room">Private&nbsp;Meeting&nbsp;Room</label>
                            </div>
                        </div>
                        <div class="reservation-food">
                        </div>
                    </div>
                    <button class="reservation-send" type="submit">Reservation Now!</button>
                </div>
            </div>
        </form>
    </div>
    <!-- reservation end -->

    <!-- footer start -->
    <section class="footer-container">
        <img src="../images/logofooter.png" alt="Logo Footer" class="logofooter">
        <div class="footer-row">
            <div class="operasional-container">
                <h2 class="operasional-title">Jam Operasional</h2>
                <div class="operasional-row2">
                    <div class="operasional day">
                        <p class="operasional-list">Sabtu</p>
                        <p class="operasional-list">Minggu</p>
                        <p class="operasional-list">Senin</p>
                        <p class="operasional-list">Selasa</p>
                        <p class="operasional-list">Rabu</p>
                        <p class="operasional-list">Kamis</p>
                        <p class="operasional-list">Jumat</p>
                    </div>
                    <div class="operasional time">
                        <p class="operasional-list">15.00 - 22.00</p>
                        <p class="operasional-list">15.00 - 22.00</p>
                        <p class="operasional-list">15.00 - 21.00</p>
                        <p class="operasional-list">15.00 - 21.00</p>
                        <p class="operasional-list">15.00 - 21.00</p>
                        <p class="operasional-list">15.00 - 21.00</p>
                        <p class="operasional-list">15.00 - 21.00</p>
                    </div>
                </div>
            </div>
            <div class="sosialmedia-container">
                <h2 class="sosialmedia-title">Sosial Media</h2>
                <div class="sosialmedia-flex">
                    <a target="_blank" href="https://wa.me/6288225839841"><img src="../images/wa.png" alt="Whatsapp"></a>
                    <a target="_blank" href="https://instagram.com/danauabahofficial"><img src="../images/ig.png" alt="Instagram"></a>
                    <a target="_blank" href="mailto:danauabahofficial@gmail.com"><img src="../images/email.png" alt="Email"></a>
                    <a target="_blank" href="https://www.tiktok.com/@danauabahofficial"><img src="../images/tiktok.png" alt="Tiktok"></a>
                </div>
            </div>
        </div>
        <p class="copyright">Copyright &copy; 2023 RestoDanauAbah - All Right Reserved.</p>
    </section>
    <!-- footer end -->


    <!-- fetaher icons -->
    <script>
        feather.replace()
    </script>

    <!-- javascript -->
    <script src="../js/reservation.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>