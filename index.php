<?php
include "auth/koneksi.php";
// cookie visits
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
    <title>Resto Danau Abah</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar">
        <a href="#"><img src="images/logo_home.png" class="navbar-logo" alt="logo"></a>
        <div class="navbar-flex">
            <div class="navbar-nav">
                <a href="#">Home</a>
                <a href="#about-us">About Us</a>
                <a href="#menu">Menu</a>
                <a href="#contact">Contact</a>
                <a href="#gallery">Gallery</a>
                <a id="reservation" href="page/reservation.php">Reservation</a>
            </div>
            <div class="navbar-extra">
                <a id="reservation" href="page/reservation.php">Reservation</a>
                <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero & carousel section start -->
    <div class="carousel-container">
        <div class="carousel-slide">
            <img src="images/bg3.jpg" alt="Image 1">
        </div>
        <div class="carousel-slide">
            <img src="images/bg4.jpg" alt="Image 2">
        </div>
        <div class="carousel-slide">
            <img src="images/bg1.jpg" alt="Image 3">
        </div>
        <div class="carousel-slide">
            <img src="images/bg4.jpg" alt="Image 4">
        </div>
        <button class="carousel-prev"><i data-feather="chevron-left"></i></button>
        <button class="carousel-next"><i data-feather="chevron-right"></i></button>
        <div class="carousel-indicators">
            <div class="carousel-indicator active" data-index="0"></div>
            <div class="carousel-indicator" data-index="1"></div>
            <div class="carousel-indicator" data-index="2"></div>
            <div class="carousel-indicator" data-index="3"></div>
        </div>
        <div class="carousel-text">
            <p class="text-animate"></p>
        </div>
        <a href="#about-us"><button class="see-more">See More</button></a>
    </div>
    <!-- hero & carousel section end -->

    <!-- about us start -->
    </div>
    <section id="about-us" class="about-us">
        <div class="about-flex">
            <div class="about-judul-paraf">
                <h2>About Us</h2>
                <p>Resto Danau Abah adalah sebuah restoran yang terletak di tepi Danau Abah, sebuah danau yang indah di
                    daerah pedesaan. Restoran ini menawarkan pemandangan danau yang spektakuler, dan pengunjung dapat
                    menikmati hidangan yang lezat sambil menikmati keindahan alam sekitarnya.</p>
                <p>Restoran ini menggunakan bahan-bahan segar dan berkualitas tinggi untuk menyajikan hidangan yang
                    lezat. Selain itu, staf yang ramah dan profesional akan membuat kunjungan Anda di Resto Danau Abah
                    menjadi pengalaman yang menyenangkan dan tak terlupakan.</p>
            </div>
            <div class="about-gambar">
                <img src="images/about1.webp" alt="Image 1" class="img1">
                <img src="images/about2.jpeg" alt="Image 2" class="img2">
            </div>
        </div>
        <img src="images/flower1.png" alt="Image 3" class="img3">
        <img src="images/flower2.png" alt="Image 4" class="img4">
        <img src="images/flower3.png" alt="Image 5" class="img5">
    </section>
    <!-- about us end -->

    <!-- menu start -->
    <section id="menu" class="menu">
        <h2>Menu</h2>
        <p>Sajian tradisional dengan cita rasa khas sunda</p>
        <div class="food-container">
            <div class="food-header">
                <div class="food-img-h2">
                    <img src="images/foodlogo.png" alt="logo-food">
                    <h2>Food</h2>
                </div>
                <a class="viewall-menu" href="menu/Danau-Abah-Menu.pdf" download>View all menu ></a>
            </div>
            <hr class="hr-food">
            <span class="category-indicator"></span>
            <div class="menu-wrap">
                <div class="menu-categories">
                    <h2 class="menu-category food active" data-category="1">Goreng</h2>
                    <h2 class="menu-category food" data-category="2">Tumisan</h2>
                    <h2 class="menu-category food" data-category="3">Sate</h2>
                    <h2 class="menu-category food" data-category="4">Lainnya</h2>
                </div>
                <div class="menu-content">
                    <span class="menu-prev food"><i data-feather="chevron-left"></i></span>
                    <span class="menu-next food"><i data-feather="chevron-right"></i></span>
                    <div class="menu-flex food">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM makanan WHERE id_jenis_makanan='1' ORDER BY id_makanan ASC");
                        while ($row = mysqli_fetch_array($data)) { ?>
                            <div class="menu-card food">
                                <img class="menu-image" src="images/img-menu/<?php echo $row['gambar_makanan']; ?>"
                                    alt="Menu Image">
                                <span class="menu-price">
                                    <p>
                                        <?php echo $row['harga_makanan']; ?>
                                    </p>
                                </span>
                                <span class="menu-name">
                                    <h3>
                                        <?php echo $row['nama_makanan']; ?>
                                    </h3>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- beverages -->
        <div class="food-container">
            <div class="food-header">
                <div class="food-img-h2">
                    <img src="images/beveragelogo.png" alt="logo-beverage">
                    <h2>Beverages</h2>
                </div>
                <span></span>
            </div>
            <hr class="hr-food">
            <span class="category-indicator"></span>
            <div class="menu-wrap">
                <div class="menu-categories">
                    <h2 class="menu-category beverage active" data-category="1">Basic</h2>
                    <h2 class="menu-category beverage" data-category="2">Buah</h2>
                    <h2 class="menu-category beverage" data-category="3">Coffee</h2>
                </div>
                <div class="menu-content">
                    <span class="menu-prev beverage"><i data-feather="chevron-left"></i></span>
                    <span class="menu-next beverage"><i data-feather="chevron-right"></i></span>
                    <div class="menu-flex beverage">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM minuman WHERE id_jenis_minuman='1' ORDER BY id_minuman ASC");
                        while ($row = mysqli_fetch_array($data)) { ?>
                            <div class="menu-card beverage">
                                <img class="menu-image" src="images/img-menu/<?php echo $row['gambar_minuman']; ?>"
                                    alt="Menu Image">
                                <span class="menu-price">
                                    <p>
                                        <?php echo $row['harga_minuman']; ?>
                                    </p>
                                </span>
                                <span class="menu-name">
                                    <h3>
                                        <?php echo $row['nama_minuman']; ?>
                                    </h3>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- menu end -->

    <!-- sambal section start -->
    <section class="hero-sambal">
        <h2>Gratis Sambal Sepuasnya!</h2>
        <main class="content-sambal">
            <div class="item-sambal">
                <img src="images/sambal1.png" alt="Sambal Mangga">
                <h2>Sambal Mangga</h2>
            </div>
            <div class="item-sambal">
                <img src="images/sambal2.png" alt="Sambal Goreng">
                <h2>Sambal Goreng</h2>
            </div>
            <div class="item-sambal">
                <img src="images/sambal3.png" alt="Sambal Kecombrang">
                <h2>Sambal Kecombrang</h2>
            </div>
        </main>
    </section>
    <!-- sambal section end -->

    <!-- contact start -->
    <section id="contact" class="contact-container">
        <h2 class="contact-title">Contact</h2>
        <p class="contact-desc">Resto Danau Abah (Rumah Makan Sunda Di Daerah BSD Cisauk Tangerang)</p>
        <div class="contact-row">
            <div class="contact-section">
                <h2>Send Message to Us!</h2>
                <form id="contact-form" method="POST" action="https://formspree.io/f/xwkjaykq">
                    <div class="contact-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Name.." required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email.." required>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone</label>
                            <input type="text" id="phone" name="phone" placeholder="Phone.." required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Subject.." required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Message.." rows="5" required></textarea>
                        </div>
                        <div class="loader-left">
                            <div class="loader"></div>
                            <button type="submit">Send</button>
                        </div>
                    </div>
                </form>
                <div class="notification" id="successNotification">Contact Submitted Successfully!</div>
            </div>
            <div class="location-section">
                <div class="location-header">
                    <img src="images/maplogo.png" alt="Logo Map">
                    <div class="location-header-col">
                        <h2>Location</h2>
                        <p>Resto Danau Abah BSD</p>
                    </div>
                </div>
                <p>Jl. Raya Perum Korpri, Suradita, Kec. Cisauk, Tangerang, Banten.</p>
                <iframe
                    src="
                    https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3039754885635!2d106.62573757372225!3d-6.354682162165772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3f5f8745c79%3A0xb8f428c496ed2852!2sDanau%20Abah%20Suradita%20BSD!5e0!3m2!1sen!2sid!4v1682262619402!5m2!1sen!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="map"></iframe></iframe>
            </div>
        </div>
    </section>
    <!-- contact end -->

    <!-- gallery start -->
    <section id="gallery" class="gallery-container">
        <h2 class="gallery-title">Gallery</h2>
        <p class="gallery-desc">View Indah Dengan Pemandangan Danau Yang Spektakuler</p>
        <div class="gallery-wrap">
            <div class="gallery-flex">
                <div class="gallery-card">
                    <img src="images/bg1.jpg" alt="Gallery1">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery2">
                </div>
                <div class="gallery-card">
                    <img src="images/bg3.jpg" alt="Gallery3">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery4">
                </div>
                <div class="gallery-card">
                    <img src="images/bg1.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg3.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg1.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery1">
                </div>
                <div class="gallery-card">
                    <img src="images/bg3.jpg" alt="Gallery2">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery3">
                </div>
                <div class="gallery-card">
                    <img src="images/bg1.jpg" alt="Gallery4">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg3.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg1.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery5">
                </div>
                <div class="gallery-card">
                    <img src="images/bg3.jpg" alt="Gallery1">
                </div>
                <div class="gallery-card">
                    <img src="images/bg4.jpg" alt="Gallery2">
                </div>
            </div>
        </div>
    </section>
    <!-- gallery end -->

    <!-- footer start -->
    <section class="footer-container">
        <img src="images/logofooter.png" alt="Logo Footer" class="logofooter">
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
                    <a target="_blank" href="https://wa.me/6288225839841"><img src="images/wa.png" alt="Whatsapp"></a>
                    <a target="_blank" href="https://instagram.com/danauabahofficial"><img src="images/ig.png"
                            alt="Instagram"></a>
                    <a target="_blank" href="mailto:danauabahofficial@gmail.com"><img src="images/email.png"
                            alt="Email"></a>
                    <a target="_blank" href="https://www.tiktok.com/@danauabahofficial"><img src="images/tiktok.png"
                            alt="Tiktok"></a>
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
    <script src="js/script.js"></script>
</body>

</html>