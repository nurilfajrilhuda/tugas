<?php

if (userLogin()['level'] != 1 ) {
    header("location:" . $main_url . "error-page.php");
    exit();
}


function insert($data){
    global $koneksi;

    $username   = strtolower(mysqli_real_escape_string($koneksi, $data['username']));
    $fullname   = mysqli_real_escape_string($koneksi, $data['fullname']);
    $password   = $data['password'];
    $password2  = $data['password2'];
    $level      = mysqli_real_escape_string($koneksi, $data['level']);
    $alamat     = mysqli_real_escape_string($koneksi, $data['alamat']);
    $gambar     = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai, user baru gagal di registrasi');
            </script>";
        return false;
    }

    $pass = ($password);

    $cekUsername    = mysqli_query($koneksi, "SELECT username FROM tbl_user WHERE username = '$username'");
    if (mysqli_num_rows($cekUsername) > 0) {
        echo "<script>
                alert('username sudah terpakai, user baru gagal di registrasi');
            </script>";
        return false;
    }

    if ($gambar != null) {
        $gambar = uploadimg();
    } else {
        $gambar = 'download.png';
    }

    // gambar tidak sesuai validasi
    if ($gambar == ''){
        return false;
    }

    $sqlUser = "INSERT INTO tbl_user VALUE (null, '$username', '$fullname', '$pass', '$alamat', $level, '$gambar')";
    mysqli_query($koneksi, $sqlUser);

    return mysqli_affected_rows($koneksi);
}

function delete($id, $foto)
{
    global $koneksi;

    $sqlDel = "DELETE FROM tbl_user WHERE user_id = $id";
    mysqli_query($koneksi, $sqlDel);
    if ($foto != 'download.png') {
        unlink('../asset/image/' . $foto);
    }

    return mysqli_affected_rows($koneksi);
}

function selectUser1($level){
    $result = null;
    if ($level == 1) {
        $result = "selected";
    }
    return $result;
}

function selectUser2($level){
    $result = null;
    if ($level == 2) {
        $result = "selected";
    }
    return $result;
}

function selectUser3($level){
    $result = null;
    if ($level == 3) {
        $result = "selected";
    }
    return $result;
}


function update($data)
{
    global $koneksi;

    $iduser     = mysqli_real_escape_string($koneksi, $data['id']);
    $username   = strtolower(mysqli_real_escape_string($koneksi, $data['username']));
    $fullname   = mysqli_real_escape_string($koneksi, $data['fullname']);
    $level      = mysqli_real_escape_string($koneksi, $data['level']);
    $alamat     = mysqli_real_escape_string($koneksi, $data['alamat']);
    $gambar     = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
    $fotoLama   = mysqli_real_escape_string($koneksi, $data['oldImg']);

    // cek username sekarang
    $queryUsername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE user_id = $iduser");
    $dataUsername  = mysqli_fetch_assoc($queryUsername);
    $curUsername   = $dataUsername['username'];

    //cek username baru
    $newUsername   = mysqli_query($koneksi, "SELECT username FROM tbl_user WHERE username = '$username'");

    if ($username !== $curUsername) {
        if (mysqli_num_rows($newUsername)) {
            echo "<script>
                alert('username sudah terpakai, update data user gagal !');
                document.location.href = 'data-user.php';
            </script>";
        return false;
        }
    }


    // cek gambar
    if ($gambar != null) {
        $url     = "data-user.php";
        $imgUser = uploadimg($url);
        if ($fotoLama != 'download.png') {
            @unlink('../asset/image' . $fotoLama);
        }
    } else {
        $imgUser = $fotoLama;
    }

    mysqli_query($koneksi, "UPDATE tbl_user SET
                            username    = '$username',
                            fullname    = '$fullname',
                            alamat      = '$alamat',
                            level       = '$level',
                            foto        = '$imgUser'
                            WHERE user_id = $iduser
                            ");

    return mysqli_affected_rows($koneksi);
}

?>