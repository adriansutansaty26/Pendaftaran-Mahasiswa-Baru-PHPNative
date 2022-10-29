<?php
include_once '../../koneksi.php';
include_once '../../models/Prodi.php';
$model = new Prodi();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'tambah':
        $nama_jurusan = $_POST['nama_jurusan'];
        $fakultas_id = $_POST['fakultas_id'];
        //step 2 simpan ke array
        $data = [
            $nama_jurusan,
            $fakultas_id
        ];
        $model->setProdi($data);
        header('Location:../../../index.php?admin=fakultas_detail&id=' . $fakultas_id);
        break;

    case 'hapus':
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->deleteProdi($_POST['id']);
        header('Location:../../../index.php?admin=fakultas_detail&id=' . $_POST['fakultas_id']);
        break;

    default:
        header('Location:../../../index.php?admin=daftar_fakultas');
        break;
}
