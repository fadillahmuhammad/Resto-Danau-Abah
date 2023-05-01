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
                            <span class="action edit">
                                <i class='bx bxs-pencil'></i>
                            </span>
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
    </div>
</div>

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