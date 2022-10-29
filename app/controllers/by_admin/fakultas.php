<?php
include_once '../../koneksi.php';
include_once '../../models/Fakultas.php';
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Fakultas();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'tambah':
        $nama = $_POST['nama'];
        $data = [
            $nama
        ];
        $model->setFakultas($data);
        header('Location:../../../index.php?admin=daftar_fakultas');
        break;

    case 'edit':
        //step 1 tangkap request form
        $nama = $_POST['nama'];
        //step 2 simpan ke array
        $data = [
            $nama
        ];
        $data[] = $_POST['id'];
        $model->editFakultas($data);
        header('Location:../../../index.php?admin=fakultas_detail&id=' . $_POST['id']);
        break;

    case 'hapus':
        unset($data);
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->deleteFakultas($_POST['id']);
        header('Location:../../../index.php?admin=daftar_fakultas');
        break;

    default:
        header('Location:../../../index.php?admin=daftar_fakultas');
        break;
}
