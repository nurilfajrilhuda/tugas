<?php

session_start();

if (!isset($_SESSION['ssLoginNFH'])) {
    header("location: ../auth/login.php");
    exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-krubus.php";

$id = $_GET['id'];

if(delete($id)){
    echo "
            <script>document.location.href = 'data-krubus.php?msg=delete';</script>
    ";
} else {
    echo "
            <script>document.location.href = 'data-krubus.php?msg=aborted';</script>
    ";
}