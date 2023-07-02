<?php

date_default_timezone_set('Asia/Jakarta');

$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'tiket_bus';

$koneksi = mysqli_connect($host,$user,$pass,$dbname);

//if (mysqli_connect_errno()) {
    //echo "gagal koneksi kedatabase";
//} else {
  //  echo "berhasil koneksi";
//}


$main_url = 'http://localhost/tiket_bus/';
?>