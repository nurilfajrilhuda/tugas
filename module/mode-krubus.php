<?php

if (userLogin()['level'] == 3){
    header("location:" . $main_url ."error-page.php");
    exit();
}

function insert($data){
    global $koneksi;

    $nama    = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon  = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat  = mysqli_real_escape_string($koneksi, $data['alamat']);
    $keterangan  = mysqli_real_escape_string($koneksi, $data['keterangan']);

    $sqlkrubus  = "INSERT INTO tbl_krubus VALUES (null, '$nama', '$telpon', '$keterangan', '$alamat')";
    mysqli_query($koneksi, $sqlkrubus);

    return mysqli_affected_rows($koneksi);
}


function delete($id){
    global $koneksi;

    $sqlDelete = "DELETE FROM tbl_krubus WHERE id_krubus = $id";
    mysqli_query($koneksi, $sqlDelete);

    return mysqli_affected_rows($koneksi);
}


function update($data){
    global $koneksi;

    $id      = mysqli_real_escape_string($koneksi, $data['id']);
    $nama    = mysqli_real_escape_string($koneksi, $data['nama']);
    $telpon  = mysqli_real_escape_string($koneksi, $data['telpon']);
    $alamat  = mysqli_real_escape_string($koneksi, $data['alamat']);
    $keterangan  = mysqli_real_escape_string($koneksi, $data['keterangan']);

    $sqlkrubus  = "UPDATE tbl_krubus SET
                    nama = '$nama',
                    telpon = '$telpon',
                    keterangan = '$keterangan',
                    alamat = '$alamat'
                    WHERE id_krubus = $id
                    ";
    mysqli_query($koneksi, $sqlkrubus);

    return mysqli_affected_rows($koneksi);
}
?>