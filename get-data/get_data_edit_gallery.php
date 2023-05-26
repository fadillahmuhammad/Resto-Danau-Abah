<?php
include "../auth/koneksi.php";

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $query = $koneksi->query("SELECT * FROM gallery WHERE id_gallery = '$id'");

    $data = $query->fetch_assoc();
}
?>

<form method="POST" action="../crud/edit_gallery.php" enctype="multipart/form-data">
    <div class="add-flex2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="wrap-title">
            <p>Gambar</p>
            <div class="input-group2">
                <p>:</p>
                <input type="file" id="gambar" onchange="previewImage()" accept="image/*" name="gambar_gallery">
                <input type="hidden" name="gambar_lama_gallery" value="<?php echo $data['gambar']; ?>">
            </div>
        </div>
        <div class="container-gambar">
            <div id="hero">
                <img src="../images/img-gallery/<?php echo $data['gambar']; ?>" alt="gambar gallery">
            </div>
            <div class="gambar-button2">
                <span class="cancel">Batal</span>
                <button id="btn-submit" type="submit">Update</button>
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

<script>
    document.getElementById("btn-submit").addEventListener("click", function() {
        alert("Data berhasil diperbarui!");
    });
</script>