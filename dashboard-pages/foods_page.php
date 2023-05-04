<?php
include "../auth/koneksi.php";
?>


<div class="details foods">
    <div class="recent_project">
        <div class="card_header">
            <h2>Foods</h2>
            <span class="add-data">
                <i data-feather="plus-circle"></i>
                <p>Add Food</p>
            </span>
        </div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Makanan</td>
                    <td>Harga</td>
                    <td>Foto</td>
                    <td>Aksi</td>
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
                                <img src="../images/img-menu/<?php echo $row['gambar_makanan']; ?>" alt="">
                            </span>
                        </td>
                        <td>

                            <span class="action edit" id="<?php echo $row['id_makanan']; ?>">
                                <i class='bx bxs-pencil'></i>
                            </span>
                            <span class="action delete" id="<?php echo $row['id_makanan']; ?>">
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
            <form method="POST" action="../crud/insert_data.php?tabel=makanan" enctype="multipart/form-data">
                <div class="add-flex">
                    <div class="duo">
                        <div class="hero">
                            <input type="file" id="gambar" onchange="previewImage()" accept="image/*" name="gambar"
                                required>
                        </div>
                        <div class="add-component">
                            <div class="sub-add food-type">
                                <p>Jenis Makanan</p>
                                <div class="input-group type-list">
                                    <p>:</p>
                                    <select class="list-type" id="list-type" name="list" required>
                                        <option disabled selected value="">Pilih Jenis</option>
                                        <option value="1">Ayam</option>
                                        <option value="2">Ikan</option>
                                        <option value="3">Tumisan</option>
                                        <option value="4">Sate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sub-add food-name">
                                <p>Nama Makanan</p>
                                <div class="input-group">
                                    <p>:</p>
                                    <input type="text" id="name-food" name="name" placeholder="Masukkan Nama" required>
                                </div>
                            </div>
                            <div class="sub-add food-price">
                                <p>Harga Makanan</p>
                                <div class="input-group">
                                    <p>:</p>
                                    <input type="text" id="price-food" name="price" placeholder="Masukkan Harga"
                                        required>
                                </div>
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
        <!-- end form add-food -->

        <!-- elemen card-body2 untuk mengedit data makanan -->
        <div class="card-body2" id="items" style="display: none;"></div>
        <!-- end form edit-food -->
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
                url: "../get-data/get_data_edit_foods.php",
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

<!-- js: sending id_makanan to delete_data.php -->
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            var id = $(this).attr("id");
            if (confirm("Anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url: "../crud/delete_data.php?tabel=makanan",
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