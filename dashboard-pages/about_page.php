<?php
include "../auth/koneksi.php";
?>

<div class="details about">
    <div class="recent_project">
        <div class="card_header">
            <h2>About Us</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Deskripsi</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $data = mysqli_query($koneksi, "SELECT * FROM about_us");
                while ($row = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id_about']; ?>
                        </td>
                        <td id="paraf">
                            <?php echo $row['paragraf']; ?>
                        </td>
                        <td>
                            <span class="action edit" id="<?php echo $row['id_about']; ?>">
                                <i class='bx bxs-pencil'></i>
                            </span>
                            <span class="action view">
                                <a href="../index.php#about-us" target="_blank"><i class='bx bxs-low-vision'></i></a>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- elemen card-body2 untuk mengedit data about -->
        <div class="card-body2" id="items" style="display: none;"></div>
        <!-- end form edit-about -->
    </div>
    <div class="overlay" style="display: none;"></div>
</div>

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
                url: "../get-data/get_data_edit_about.php",
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