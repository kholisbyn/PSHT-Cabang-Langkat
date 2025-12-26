<?php 
include "header.php"; 
include "koneksi.php";
?>

<section class="main-content">
<?php
$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
while ($data = mysqli_fetch_assoc($query)) {
?>


    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
    <div class="card">
        <h2><center><?= $data['judul']; ?></center></h2>
        <center>
             <?php if ($data['gambar']) { ?>
                <img src="uploads/<?= $data['gambar']; ?>" class="img-thumbnail img-responsive">
            <?php } ?>
        </center>
        <center>
            <p><?= nl2br($data['konten']); ?></p>
            <small><?= $data['tanggal']; ?></small>
        </center>
    </div>
                </div>
            </div>
        </div>
    </div>


<?php } ?>
</section>

<?php include "footer.php"; ?>
