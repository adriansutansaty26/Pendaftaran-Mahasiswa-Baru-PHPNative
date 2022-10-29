<?php
include_once '../koneksi.php';
include_once '../models/Akun.php';
//step 1 tangkap request form login
$email = $_POST['email'];
$password = $_POST['password'];
//step 2 simpan ke array
$data = [
    $email, // ? 1
    $password // ? 2
];
//step 3 proses otentikasi user
$model = new Akun();
$rs = $model->cekLogin($data);
if (!empty($rs)) { //sukses login
    session_start();
    $_SESSION['USER'] = $rs;
    // diarahkan ke suatu halaman
    if ($rs['level'] == 0) {
        header('location:../../index.php?camaba=dasbor');
        die();
    } else if ($rs['level'] == 1) {
        header('location:../../index.php?admin=daftar_maba');
        die();
    }
} else {
    header('Location:../../index.php?hal=masuk&rdr=salah');
}
