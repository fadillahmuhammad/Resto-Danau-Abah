<?php
include "../auth/koneksi.php";
?>

<div class="details beverages">
    <div class="recent_project">
        <div class="card_header">
            <h2>Beverages</h2>
            <span class="add-data">
                <i data-feather="plus-circle"></i>
                <p>Add Beverages</p>
            </span>
        </div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Minuman</td>
                    <td>Harga</td>
                    <td>Foto</td>
                    <td>Aksi</td>
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
                        <td>
                            <!-- <form action="" method="get"> -->
                            <span class="action edit" id="<?php echo $row['id_minuman']; ?>">
                                <i class='bx bxs-pencil'></i>
                            </span>
                            <!-- </form> -->
                            <span class="action delete" id="<?php echo $row['id_minuman']; ?>">
                                <i class='bx bxs-trash'></i>
                            </span>
                            <span class="action view">
                                <a href="../index.php#menu" target="_blank"><i class='bx bxs-low-vision'></i></a>
                            </span>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <!-- elemen card-body untuk menambahkan data makanan -->
        <div class="card-body" style="display: none;">
            <form method="POST" action="../crud/insert_data.php?tabel=minuman" enctype="multipart/form-data">
                <div class="add-flex">
                    <div class="hero">
                        <input type="file" id="gambar" onchange="previewImage()" accept="image/*" name="gambar"
                            required>
                    </div>
                    <div class="add-component">
                        <div class="sub-add beverages-type">
                            <p>Jenis Minuman</p>
                            <div class="input-group type-list">
                                <p>:</p>
                                <select class="list-type" id="list-type" name="list" required>
                                    <option disabled selected value="">Pilih Jenis</option>
                                    <option value="1">Basic</option>
                                    <option value="2">Coffee</option>
                                    <option value="3">Juice</option>
                                </select>
                            </div>
                        </div>
                        <div class="sub-add beverages-name">
                            <p>Nama Minuman</p>
                            <div class="input-group">
                                <p>:</p>
                                <input type="text" id="name-beverages" name="name" placeholder="Masukkan Nama" required>
                            </div>
                        </div>
                        <div class="sub-add beverages-price">
                            <p>Harga Minuman</p>
                            <div class="input-group">
                                <p>:</p>
                                <input type="text" id="price-beverages" name="price" placeholder="Masukkan Harga"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="gambar-button">
                        <div id="hero"></div>
                        <div class="final-btn">
                            <span class="cancel">Batal</span>
                            <button type="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end form add-beverages -->

        <!-- elemen card-body2 untuk mengedit data minuman -->
        <div class="card-body2" id="items" style="display: none;"></div>
        <!-- end form edit-beverages -->
    </div>
    <div class="overlay" style="display: none;"></div>
</div>

<!-- js: menampilkan card-body when add-data's clicked -->
<script>
    $(document).ready(function () {
        // saat tombol "Add Food" di klik
        $(".add-data").click(function () {
            $(".card-body").show();
            $(".overlay").show();
            $("body > *:not(.container)").css({
                "pointer-events": "none",
                "overflow": "hidden"
            });
        });

        // saat tombol "cancel" di klik
        $(".cancel").click(function () {
            $(".card-body").hide();
            $(".overlay").hide();
            $("body > *:not(.container)").css({
                "pointer-events": "auto",
                "overflow": "auto"
            });
        });
    });
</script>

<!-- js: menampilkan card-body2 when edit-data's clicked -->
<script>
    $(document).ready(function () {
        // saat tombol "cancel" di klik
        $(".cancel").click(function () {
            $(".card-body2").hide();
            $(".overlay").hide();
            $("body > *:not(.container)").css({
                "pointer-events": "auto",
                "overflow": "auto"
            });
        });
    });

    // edit data
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr("id");
            $.ajax({
                url: "../get-data/get_data_edit_beverages.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    $("#items").html(data);
                    $(".card-body2").show();
                    $(".overlay").show();
                    $("body > *:not(.container)").css({
                        "pointer-events": "none",
                        "overflow": "hidden"
                    });
                }
            })
        })
    })
</script>

<!-- previewImage -->
<script>
    function previewImage() {
        var gambar = document.querySelector('#gambar');
        var gambarPreview = document.querySelector('#hero');

        if (gambar.files && gambar.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                gambarPreview.innerHTML = '<img src="' + e.target.result + '"/>';
            }

            reader.readAsDataURL(gambar.files[0]);
        }
    }
</script>

<!-- js: sending id_minuman to delete_data.php -->
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            var id = $(this).attr("id");
            if (confirm("Anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url: "../crud/delete_data.php?tabel=minuman",
                    type: "POST",
                    data: { id: id },
                    success: function () {
                        location.reload();
                    }
                });
            }
        });
    });
</script>

<!-- feather icons -->
<script>
    feather.replace()
</script>