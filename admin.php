<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// ====================== STRUKTUR ORGANISASI ======================
if (isset($_POST['simpan_struktur'])) {
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama'];

    if(isset($_POST['id']) && $_POST['id'] != "") { // EDIT
        $id = $_POST['id'];
        $stmt = $koneksi->prepare("UPDATE struktur_organisasi SET jabatan=?, nama=? WHERE id=?");
        $stmt->bind_param("ssi", $jabatan, $nama, $id);
        $stmt->execute();
        $stmt->close();
        $msg_struktur = "Data berhasil diupdate!";
    } else { // TAMBAH
        $stmt = $koneksi->prepare("INSERT INTO struktur_organisasi (jabatan, nama) VALUES (?, ?)");
        $stmt->bind_param("ss", $jabatan, $nama);
        $stmt->execute();
        $stmt->close();
        $msg_struktur = "Data berhasil disimpan!";
    }
}

// HAPUS STRUKTUR
if(isset($_GET['hapus_struktur'])) {
    $id = $_GET['hapus_struktur'];
    $koneksi->query("DELETE FROM struktur_organisasi WHERE id='$id'");
    $msg_struktur = "Data berhasil dihapus!";
}

// ====================== BERITA ======================
if (isset($_POST['simpan_berita'])) {
    $judul = $_POST['judul_berita'];
    $konten = $_POST['konten_berita'];
    $tanggal = $_POST['tanggal_berita'];
    
    // Handle upload gambar
    $file_gambar = null;
    if(isset($_FILES['gambar']) && $_FILES['gambar']['name'] != "") {
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $file_gambar = time() . "_" . basename($_FILES['gambar']['name']);
        $upload_dir = "uploads/";
        move_uploaded_file($tmp_name, $upload_dir.$file_gambar);
    }

    if(isset($_POST['id']) && $_POST['id'] != "") { // EDIT
        $id = $_POST['id'];

        if($file_gambar) {
            $stmt = $koneksi->prepare("UPDATE berita SET judul=?, konten=?, gambar=?, tanggal=? WHERE id=?");
            $stmt->bind_param("ssssi", $judul, $konten, $file_gambar, $tanggal, $id);
        } else {
            $stmt = $koneksi->prepare("UPDATE berita SET judul=?, konten=?, tanggal=? WHERE id=?");
            $stmt->bind_param("sssi", $judul, $konten, $tanggal, $id);
        }
        $stmt->execute();
        $stmt->close();
        $msg_berita = "Berita berhasil diupdate!";
    } else { // TAMBAH
        $stmt = $koneksi->prepare("INSERT INTO berita (judul, konten, gambar, tanggal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $judul, $konten, $file_gambar, $tanggal);
        $stmt->execute();
        $stmt->close();
        $msg_berita = "Berita berhasil ditambahkan!";
    }
}

// HAPUS BERITA
if(isset($_GET['hapus_berita'])) {
    $id = $_GET['hapus_berita'];
    $row = $koneksi->query("SELECT gambar FROM berita WHERE id='$id'")->fetch_assoc();
    if($row['gambar'] && file_exists("uploads/".$row['gambar'])) unlink("uploads/".$row['gambar']);
    $koneksi->query("DELETE FROM berita WHERE id='$id'");
    $msg_berita = "Berita berhasil dihapus!";
}

// ====================== PENGGUNA ======================
if(isset($_POST['simpan_user'])) {
    $id_user = $_POST['id_user'];
    $username_user = $_POST['username_user'];
   $password_user = $_POST['password_user'];
 // MD5 sesuai login sebelumnya

    if($id_user) { // EDIT
        $stmt = $koneksi->prepare("UPDATE login SET username=?, password=? WHERE id=?");
        $stmt->bind_param("ssi", $username_user, $password_user, $id_user);
        $stmt->execute();
        $stmt->close();
        $msg_user = "Pengguna berhasil diupdate!";
    } else { // TAMBAH
        // cek username sudah ada?
        $cek = $koneksi->query("SELECT * FROM login WHERE username='$username_user'");
        if($cek->num_rows > 0){
            $msg_user = "Username sudah terdaftar!";
        } else {
            $stmt = $koneksi->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username_user, $password_user);
            $stmt->execute();
            $stmt->close();
            $msg_user = "Pengguna baru berhasil ditambahkan!";
        }
    }
}

// HAPUS PENGGUNA
if(isset($_GET['hapus_user'])) {
    $id = $_GET['hapus_user'];
    $koneksi->query("DELETE FROM login WHERE id='$id'");
    $msg_user = "Pengguna berhasil dihapus!";
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="text-center">Halaman Admin</h2>
    <a href="logout.php" class="btn btn-danger pull-right">Logout</a>
    <br><br>


    
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#struktur">Struktur Organisasi</a></li>
        <li><a data-toggle="tab" href="#berita">Berita</a></li>
        <li><a data-toggle="tab" href="#pengguna">Tambah Pengguna/Admin</a></li>
    </ul>




    <div class="tab-content">
        <!-- ================= STRUKTUR ================= -->
        <div id="struktur" class="tab-pane fade in active">
            <h3>Struktur Organisasi</h3>
            <?php if(isset($msg_struktur)) echo "<div class='alert alert-success'>$msg_struktur</div>"; ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?php if(isset($_GET['edit_struktur'])) echo $_GET['edit_struktur']; ?>">
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required
                        value="<?php if(isset($_GET['edit_struktur'])) { 
                            $row = $koneksi->query("SELECT * FROM struktur_organisasi WHERE id=".$_GET['edit_struktur'])->fetch_assoc();
                            echo $row['jabatan']; } ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required
                        value="<?php if(isset($_GET['edit_struktur'])) echo $row['nama']; ?>">
                </div>
                <input type="submit" name="simpan_struktur" value="Simpan" class="btn btn-primary">
            </form>

            <hr>
            <h4>Data Struktur Organisasi</h4>
            <table class="table table-bordered table-striped">
                <tr><th>No</th><th>Jabatan</th><th>Nama</th><th>Aksi</th></tr>
                <?php
                $no=1;
                $result=$koneksi->query("SELECT * FROM struktur_organisasi ORDER BY id DESC");
                while($r=$result->fetch_assoc()){
                    echo "<tr>
                        <td>$no</td>
                        <td>{$r['jabatan']}</td>
                        <td>{$r['nama']}</td>
                        <td>
                            <a href='?edit_struktur={$r['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='?hapus_struktur={$r['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>

        <!-- ================= BERITA ================= -->
        <div id="berita" class="tab-pane fade">
            <h3>Berita</h3>
            <?php if(isset($msg_berita)) echo "<div class='alert alert-success'>$msg_berita</div>"; ?>

            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php if(isset($_GET['edit_berita'])) echo $_GET['edit_berita']; ?>">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" required
                        value="<?php if(isset($_GET['edit_berita'])) {
                            $row = $koneksi->query("SELECT * FROM berita WHERE id=".$_GET['edit_berita'])->fetch_assoc();
                            echo $row['judul'];
                        } ?>">
                </div>
                <div class="form-group">
                    <label>Konten Berita</label>
                    <textarea name="konten_berita" class="form-control" rows="5" required><?php if(isset($_GET['edit_berita'])) echo $row['konten']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control" multiple>
                    <?php if(isset($_GET['edit_berita']) && $row['gambar']) echo "<small>Biarkan kosong jika tidak ingin mengganti gambar</small>"; ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Berita</label>
                    <input type="date" name="tanggal_berita" class="form-control"
                        value="<?php if(isset($_GET['edit_berita'])) echo date('Y-m-d', strtotime($row['tanggal'])); ?>" required>
                </div>
                <input type="submit" name="simpan_berita" value="Simpan" class="btn btn-primary">
            </form>

            <hr>
            <h4>Daftar Berita</h4>
            <table class="table table-bordered table-striped">
                <tr><th>No</th><th>Judul</th><th>Konten</th><th>Gambar</th><th>Tanggal</th><th>Aksi</th></tr>
                <?php
                $no=1;
                $result=$koneksi->query("SELECT * FROM berita ORDER BY id DESC");
                while($r=$result->fetch_assoc()){
                    echo "<tr>
                        <td>$no</td>
                        <td>{$r['judul']}</td>
                        <td>{$r['konten']}</td>
                        <td>";
                    if($r['gambar']) {
                        echo "<img src='uploads/{$r['gambar']}' style='width:100px;'>";
                    } else {
                        echo "-";
                    }
                    echo "</td>
                        <td>{$r['tanggal']}</td>
                        <td>
                            <a href='?edit_berita={$r['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='?hapus_berita={$r['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus berita ini?')\">Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>

<!-- ================= PENGGUNA ================= -->
<div id="pengguna" class="tab-pane fade">
    <h3>Kelola Pengguna/Admin</h3>
    <?php if(isset($msg_user)) echo "<div class='alert alert-success'>$msg_user</div>"; ?>

    <!-- Form tambah / edit -->
    <form method="POST">
        <input type="hidden" name="id_user" value="<?php if(isset($_GET['edit_user'])) echo $_GET['edit_user']; ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username_user" class="form-control" required
                value="<?php if(isset($_GET['edit_user'])) { 
                    $row_user = $koneksi->query("SELECT * FROM login WHERE id=".$_GET['edit_user'])->fetch_assoc();
                    echo $row_user['username']; } ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password_user" class="form-control" required
                value="<?php if(isset($_GET['edit_user'])) echo $row_user['password']; ?>">
        </div>
        <input type="submit" name="simpan_user" value="Simpan" class="btn btn-primary">
    </form>

    <hr>
    <h4>Daftar Pengguna/Admin</h4>
    <table class="table table-bordered table-striped">
        <tr><th>No</th><th>Username</th><th>Password</th><th>Aksi</th></tr>
        <?php
        $no=1;
        $result = $koneksi->query("SELECT * FROM login ORDER BY id DESC");
        while($r = $result->fetch_assoc()){
            echo "<tr>
                <td>$no</td>
                <td>{$r['username']}</td>
                <td>{$r['password']}</td>
                <td>
                    <a href='?edit_user={$r['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='?hapus_user={$r['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus pengguna ini?')\">Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>



    </div>
</div>

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
