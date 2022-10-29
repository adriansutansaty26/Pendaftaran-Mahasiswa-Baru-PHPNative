<?php
include_once '../koneksi.php';
include_once '../models/Akun.php';
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Akun();
$email = $_POST['email'];
$password = $_POST['password'];
$data = [
    $email,
    $password
];
$result = $model->setAkun($data);
if ($result) {
    header('Location:../../index.php?hal=masuk&rdr=daftar');
} else {
    header('Location:../../index.php?hal=daftar&result=false');
}
