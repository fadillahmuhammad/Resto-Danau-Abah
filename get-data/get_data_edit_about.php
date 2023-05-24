<?php
include "../auth/koneksi.php";

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $query = $koneksi->query("SELECT * FROM about_us WHERE id_about = '$id'");

    $data = $query->fetch_assoc();
}
?>

<form method="POST" action="../crud/edit_about.php">
    <div class="add-flex2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="wrap-title">
            <p>Deskripsi</p>
            <div class="input-group2">
                <p>:</p>
                <textarea id="desc" name="desc" rows="8" cols="50"><?php echo $data['paragraf']; ?></textarea>
            </div>
        </div>
        <div class="gambar-button2">
            <span class="cancel">Batal</span>
            <button type="submit">Update</button>
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