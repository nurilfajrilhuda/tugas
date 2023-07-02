<?php

session_start();

if (!isset($_SESSION['ssLoginNFH'])) {
    header("location: ../auth/login.php");
    exit();
}

require "../config/config.php";
require "../config/functions.php";


$title = "Change Password - tiket BUS";
require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

// update password


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $main_url ?>dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="../module/mode-password.php" method="post">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-key"></i> Change Password</h3>
                        <button type="submit" name="simpan" class="btn btn-primary btn-sm float-right"><i class="fas fa-edit"></i> Submit</button>
                        <button type="reset" name="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-8 mb-3">
                            <div class="form-group">
                                <label for="curPass">Password saat Ini</label>
                                <input type="password" name="curPass" id="curPass" class="form-control" placeholder="masukkan password anda saat ini" required>
                            
                            </div>
                            <div class="form-group">
                                <label for="newPass">Password Baru</label>
                                <input type="password" name="newPass" id="newPass" class="form-control" placeholder="masukkan password baru anda" required>
                            </div>
                            <div class="form-group">
                                <label for="confPass">Confirmasi Password</label>
                                <input type="password" name="confPass" id="confPass" class="form-control" placeholder="masukkan kembali password baru anda" required>
                              
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