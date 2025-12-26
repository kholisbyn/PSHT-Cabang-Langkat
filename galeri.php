<?php 
include "header.php"; 
include "koneksi.php";
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">

<h2 class="text-muted">
    <span class="glyphicon glyphicon-picture"></span> Galeri
</h2>

<div class="row">

<?php
$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
while ($data = mysqli_fetch_assoc($query)) {
?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <img src="uploads/<?= $data['gambar']; ?>" 
             class="img-thumbnail img-responsive"
             style="margin-bottom:15px;">

    </div>
<?php } ?>

</div>

</div>
</div>
</div>
</div>
</div>

<?php include "footer.php"; ?>
