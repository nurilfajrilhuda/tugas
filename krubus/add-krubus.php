<?php

session_start();

if (!isset($_SESSION['ssLoginNFH'])) {
    header("location: ../auth/login.php");
    exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-krubus.php";

$title = "Tambah KruBUS - Tiket BUS";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$alert = '';

if (isset($_POST['simpan'])){
    if(insert($_POST)){
       $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <i class="icon fas fa-check"></i>Kru Bus berhasil di tambahkan..
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>'; 
    }
}

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
                    <li class="breadcrumb-item active">Add Kru BUS</li>
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
                        <h3 class="card-title"><i class="fas fa-plus fa-sm"></i> Add Kru BUS</h3>
                        <button type="submit" name="simpan" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                <?php if($alert != ''){
                                    echo $alert;
                                } ?>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama krubus" autofocus autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="text" name="telpon" class="form-control" id="telpon" placeholder="nomor telpon krubus" title="minimal 5 angka" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" rows="3" class="form-control" placeholder="Keterangan tentang Kru Bus" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="1" class="form-control" placeholder="Alamat tentang Kru Bus" required></textarea>
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