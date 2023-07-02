<?php

session_start();

if (!isset($_SESSION['ssLoginNFH'])) {
    header("location: ../auth/login.php");
    exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-krubus.php";

$title = "Edit KruBUS - Tiket BUS";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

// proses update data menjalankan
if (isset($_POST['update'])) {
    if (update($_POST)) {
        echo "<script>
            document.location.href = 'data-krubus.php?msg=updated';
        </script>";
    }
}

$id = $_GET['id'];

$sqlEdit = "SELECT * FROM tbl_krubus WHERE id_krubus = $id";
$krubus = getData($sqlEdit)[0];

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">KRU BUS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $main_url ?>dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= $main_url ?>krubus/data-krubus.php">Kru BUS</a></li>
                    <li class="breadcrumb-item active">Edit Kru BUS</li>
                  </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="" method="post">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus fa-sm"></i> Edit Kru BUS</h3>
                        <button type="submit" name="update" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i> Update</button>
                        <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $krubus['id_krubus'] ?>">
                            <div class="col-lg-8 mb-3"> 
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama krubus" autofocus value="<?= $krubus['nama'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="text" name="telpon" class="form-control" id="telpon" placeholder="nomor telpon krubus" title="minimal 5 angka" value="<?= $krubus['telpon'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" rows="3" class="form-control" placeholder="Keterangan tentang Kru Bus" required><?= $krubus['keterangan'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="1" class="form-control" placeholder="Alamat tentang Kru Bus" required><?= $krubus['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php

require "../template/footer.php";

?>