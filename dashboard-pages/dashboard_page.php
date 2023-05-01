<?php
include "../auth/koneksi.php";

// get total data foods
$result = mysqli_query($koneksi, "SELECT COUNT(*) FROM danau_abah.makanan;");
$foods = mysqli_fetch_array($result)[0];

// get total data beveragess
$result2 = mysqli_query($koneksi, "SELECT COUNT(*) FROM danau_abah.minuman;");
$beverages = mysqli_fetch_array($result2)[0];

// cookie visits
$visits = isset($_COOKIE['visits']) ? intval($_COOKIE['visits']) : 0;
?>

<div class="card-boxes">
    <div class="box">
        <div class="right_side">
            <div class="numbers" id="visits">
                <?php echo $visits; ?>
            </div>
            <div class="box_topic">Viewer</div>
        </div>
        <i class='bx bx-user'></i>
    </div>
    <div class="box">
        <div class="right_side">
            <div class="numbers">
                <?php echo $foods; ?>
            </div>
            <div class="box_topic">Foods</div>
        </div>
        <i class='bx bxs-bowl-hot'></i>
    </div>
    <div class="box">
        <div class="right_side">
            <div class="numbers">
                <?php echo $beverages; ?>
            </div>
            <div class="box_topic">Beverages</div>
        </div>
        <i class='bx bx-drink'></i>
    </div>
    <div class="box">
        <div class="right_side">
            <div class="numbers">9</div>
            <div class="box_topic">Reservation</div>
        </div>
        <i class='bx bxs-book-open'></i>
    </div>
</div>
<!-- End Card Boxs -->
<div class="details">
    <div class="recent_project">
        <div class="card_header">
            <h2>Foods</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Makanan</td>
                    <td>Harga</td>
                    <td>Foto</td>
                </tr>
            </thead>
            <tbody>

                <?php $data = mysqli_query($koneksi, "SELECT * FROM makanan ORDER BY id_makanan ASC");
                while ($row = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id_makanan']; ?>
                        </td>
                        <td>
                            <?php echo $row['nama_makanan']; ?>
                        </td>
                        <td>
                            <span class="badge bg_worning">
                                <?php echo $row['harga_makanan']; ?>
                            </span>
                        </td>
                        <td>
                            <span class="img_group">
                                <img src="../images/<?php echo $row['gambar_makanan']; ?>" alt="">
                            </span>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <!-- beverages -->
    <div class="recent_project">
        <div class="card_header">
            <h2>Beverages</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Minuman</td>
                    <td>Harga</td>
                    <td>Foto</td>
                </tr>
            </thead>
            <tbody>

                <?php $data = mysqli_query($koneksi, "SELECT * FROM minuman ORDER BY id_minuman ASC");
                while ($row = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id_minuman']; ?>
                        </td>
                        <td>
                            <?php echo $row['nama_minuman']; ?>
                        </td>
                        <td>
                            <span class="badge bg_worning">
                                <?php echo $row['harga_minuman']; ?>
                            </span>
                        </td>
                        <td>
                            <span class="img_group">
                                <img src="../images/<?php echo $row['gambar_minuman']; ?>" alt="">
                            </span>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>