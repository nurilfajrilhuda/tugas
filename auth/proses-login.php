<?php

session_start();

if (isset($_SESSION["ssLoginNFH"])) {
  header("location: ../boos.php");
  exit();
}

require "../config/config.php";




if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $queryLogin = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password='$password'");
    $dats=mysqli_num_rows($queryLogin) ;
    $row = mysqli_fetch_assoc($queryLogin);
    if ($row) {
        // set session
        $_SESSION["ssLoginNFH"] = true;
        $_SESSION["ssUserNFH"] = $username;

        header("location: ../boos.php");
    } else {
      echo "<script>alert('username tidak terdaftar...');</script>";
    }
}

?>



