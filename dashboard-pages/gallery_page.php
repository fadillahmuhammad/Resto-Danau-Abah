<?php
include "../auth/koneksi.php";
?>

<div class="details gallery">
    <div class="recent_project">
        <div class="card_header">
            <h2>Gallery Danau Abah</h2>
            <span class="add-data">
                <i data-feather="plus-circle"></i>
                <p>Add Gallery</p>
            </span>
        </div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Gambar</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $data = mysqli_query($koneksi, "SELECT * FROM gallery");
                while ($row = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id_gallery']; ?>
                        </td>
                        <td>
                            <span class="img_group">
                                <img src="../images/img-gallery/<?php echo $row['gambar']; ?>" alt="Gambar<?php echo $row['id_gallery']; ?>">
                            </span>
                        </td>
                        <td>
                            <span class="action edit" id="<?php echo $row['id_gallery']; ?>">
                                <i class='bx bxs-pencil'></i>
                            </span>
                            <span class="action delete" id="<?php echo $row['id_gallery']; ?>">
                                <i class='bx bxs-trash'></i>
                            </span>
                            <span class="action view">
                                <a href="../index.php#gallery" target="_blank"><i class='bx bxs-low-vision'></i></a>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- elemen card-body2 untuk mengedit data gallery -->
        <div class="card-body2" id="items" style="display: none;"></div>
        <!-- end form edit-gallery -->

        <!-- add data-gallery -->
        <div class="card-body" style="display: none;">
            <form method="POST" action="../crud/insert_data.php?tabel=gallery" enctype="multipart/form-data">
                <div class="add-flex2">
                    <div class="wrap-title">
                        <p>Gambar</p>
                        <div class="input-group2">
                            <p>:</p>
                            <input type="file" id="gambar" onchange="previewImage()" accept="image/*" name="gambar_gallery" required>
                        </div>
                    </div>
                    <div class="container-gambar">
                        <div id="hero"></div>
                        <div class="gambar-button2">
                            <span class="cancel">Batal</span>
                            <button class="btn-add-gallery" id="btn-add" type="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="overlay" style="display: none;"></div>
</div>

<!-- js: menampilkan card-body when add-data's clicked -->
<script>
    $(document).ready(function() {
        // saat tombol "Add Gallery" di klik
        $(".add-data").click(function() {
            $(".card-body").show();
            $(".overlay").show();
            $("body > *:not(.container)").css({
                "pointer-events": "none",
                "overflow": "hidden"
            });
        });

        // saat tombol "cancel" di klik
        $(".cancel").click(function() {
            $(".card-body").hide();
            $(".overlay").hide();
            $("body > *:not(.container)").css({
                "pointer-events": "auto",
                "overflow": "auto"
            });
        });
    });
</script>

<script>
    document.getElementById("btn-add").addEventListener("click", function() {
        alert("Data berhasil ditambahkan!");
    });
</script>

<!-- js: menampilkan card-body2 when edit-data's clicked -->
<script>
    $(document).ready(function() {
        // saat tombol "cancel" di klik
        $(".cancel").click(function() {
            $(".card-body2").hide();
            $(".overlay").hide();
            $("body > *:not(.container)").css({
                "pointer-events": "auto",
                "overflow": "auto"
            });
        });
    });

    // edit data
    $(document).ready(function() {
        $(".edit").click(function() {
            var id = $(this).attr("id");
            $.ajax({
                url: "../get-data/get_data_edit_gallery.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
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

            reader.onload = function(e) {
                gambarPreview.innerHTML = '<img src="' + e.target.result + '"/>';
            }

            reader.readAsDataURL(gambar.files[0]);
        }
    }
</script>

<!-- js: sending id_gallery to delete_data.php -->
<script>
    $(".delete").click(function() {
        var id = $(this).attr("id");
        var deleteButton = $(this);

        if (confirm("Anda yakin ingin menghapus data ini?")) {
            deleteButton.prop("disabled", true);

            $.ajax({
                url: "../crud/delete_data.php?tabel=gallery",
                type: "POST",
                data: {
                    id: id
                },
                success: function() {
                    alert("Data berhasil dihapus!");
                    location.reload();
                },
                error: function() {
                    deleteButton.prop("disabled", false);
                }
            });
        }
    });
</script>

<!-- feather icons -->
<script>
    feather.replace()
</script>