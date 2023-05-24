<?php
include "../auth/koneksi.php";

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $query = $koneksi->query("SELECT jm.nama_jenis_makanan, m.id_jenis_makanan, m.nama_makanan, m.harga_makanan, m.gambar_makanan FROM makanan AS m INNER JOIN jenis_makanan AS jm ON m.id_jenis_makanan = jm.id_jenis_makanan WHERE m.id_makanan = '$id'");

    $data = $query->fetch_assoc();
}
?>

<form method="POST" action="../crud/edit_data.php?tabel=makanan" enctype="multipart/form-data">
    <div class="add-flex">
        <div class="duo">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="hero">
                <input type="file" id="gambar" onchange="previewImage()" accept="image/*" name="gambar">
                <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar_makanan']; ?>">
            </div>
            <div class="add-component">
                <div class="sub-add food-type">
                    <p>Jenis Makanan</p>
                    <div class="input-group type-list">
                        <p>:</p>
                        <select class="list-type" id="list-type" name="list" required>
                            <option selected value="<?php echo $data['id_jenis_makanan']; ?>">
                                <?php echo $data['nama_jenis_makanan']; ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="sub-add food-name">
                    <p>Nama Makanan</p>
                    <div class="input-group">
                        <p>:</p>
                        <input type="text" id="name-food" name="name" value="<?php echo $data['nama_makanan']; ?>" required>
                    </div>
                </div>
                <div class="sub-add food-price">
                    <p>Harga Makanan</p>
                    <div class="input-group">
                        <p>:</p>
                        <input type="text" id="price-food" name="price" value="<?php echo $data['harga_makanan']; ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="gambar-button">
            <div id="hero">
                <img src="../images/img-menu/<?php echo $data['gambar_makanan']; ?>" alt="gambar makanan">
            </div>
            <div class="final-btn">
                <span class="cancel">Batal</span>
                <button type="submit">Update</button>
            </div>
        </div>
    </div>
</form>

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