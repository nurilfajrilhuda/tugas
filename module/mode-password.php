<?php
include "../config/config.php";
session_start();
    $curPass =$_POST['curPass'];
    $newPass =$_POST['newPass'];
    $confPass =$_POST['confPass'];
    $userActive = $_SESSION["ssUserNFH"] ;

    
    
    $ubah=mysqli_query($koneksi, "UPDATE tbl_user SET password = '$newPass' WHERE username = '$userActive'");
      
    if ($ubah){
        echo "<script>window.alert('data berhasil');window.location.href='../auth/change-password.php'</script>";

    }
    


?>