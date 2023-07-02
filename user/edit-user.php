<?php

session_start();

if (!isset($_SESSION['ssLoginNFH'])) {
    header("location: ../auth/login.php");
    exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-user.php";

$title = "Update User - Tiket BUS";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$id = $_GET['id'];

$sqlEdit = "SELECT * FROM tbl_user WHERE user_id = $id";
$user    = getData($sqlEdit)[0];
$level   = $user['level'];

if (isset($_POST['koreksi'])) {
    if (update($_POST)) {
        echo '<script>
                alert("Data User berhasil diupdate ! ");
                document.location.href = "data-user.php";
            </script>';
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">USERS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $main_url ?>dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= $main_url ?>user/data-user.php">Users</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                  </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-pen fa-sm"></i> Edit User</h3>
                    <button type="submit" name="koreksi" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i> Koreksi</button>
                    <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i> Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" value="<?= $user['user_id'] ?>" name="id">
                        <div class="col-lg-8 mb-3">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="masukkan username" autofocus autocomplete="off" value="<?= $user['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="masukkan nama lengkap" value="<?= $user['fullname'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">-- Level User --</option>
                                    <option value="1" <?= selectUser1($level) ?>>Administrator</option>
                                    <option value="2" <?= selectUser2($level) ?>>Pramuniaga/ri</option>
                                    <option value="3" <?= selectUser3($level) ?>>Karyawan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control" placeholder="Masukkan alamat mu" required><?= $user['alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <input type="hidden" name="oldImg" value="<?= $user['foto'] ?>">
                            <img src="<?= $main_url ?>asset/image/<?= $user['foto'] ?>" class="profile-user-img img-circle mb-3" alt="">
                            <input type="file" class="form-control" name="image">
                            <span class="text-sm">Type file gambar JPG | PNG | GIF</span>
                            <span class="text-sm">Width - Height</span>
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