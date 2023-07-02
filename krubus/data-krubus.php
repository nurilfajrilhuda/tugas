<?php

session_start();

if (!isset($_SESSION['ssLoginNFH'])) {
    header("location: ../auth/login.php");
    exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-krubus.php";

$title = "Data KruBUS - Tiket BUS";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if($msg = 'deleted'){
    $alert = '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    kru bus berhasil dihapus
  </div>';
}

if($msg = 'updated'){
    $alert = '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check-circle"></i> Alert!</h5>
    kru bus berhasil di perbarui
  </div>';
}

if($msg == 'aborted'){
    $alert = '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
    kru bus gagal dihapus
  </div>';
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
                    <li class="breadcrumb-item active">Data Kru BUS</li>
                  </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section>
        <div class="container-fluid">
            <div class="card">
                <?php if($alert != ''){
                    echo $alert;
                } ?>
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Data Kru BUS</h3>
                    <a href="<?= $main_url ?>krubus/add-krubus.php" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus fa-sm"></i> Add kru bus</a>
                </div>
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover text-nowrap" id="tblData">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                                <th>Keterangan</th>
                                <th style="width: 10%;">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no     = 1;
                            $krubus = getData("SELECT * FROM tbl_krubus");
                            foreach($krubus as $kru_bus):
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kru_bus['nama'] ?></td>
                                    <td><?= $kru_bus['telpon'] ?></td>
                                    <td><?= $kru_bus['alamat'] ?></td>
                                    <td><?= $kru_bus['keterangan'] ?></td>
                                    <td>
                                        <a href="edit-krubus.php?id=<?= $kru_bus['id_krubus'] ?>" class="btn btn-sm btn-warning" title="edit kru bus"><i class="fas fa-pen"></i></a>
                                        <a href="del-krubus.php?id=<?= $kru_bus['id_krubus'] ?>" class="btn btn-sm btn-danger" title="hapus kru bus" onclick="return confirm('anda yakin mau menghapus krubus ini')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr> 
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php

require "../template/footer.php";

?>