<?php
include_once '../../koneksi.php';
include_once '../../models/ProdiCamaba.php';
$model = new ProdiCamaba();
$prodi_id = $_POST['prodi_id'];
$akun_id = $_POST['akun_id'];
//step 2 simpan ke array
$data = [
    $prodi_id,
    $akun_id
];
$model->setProdiCamaba($data);
header('Location:../../../index.php?camaba=dasbor');
