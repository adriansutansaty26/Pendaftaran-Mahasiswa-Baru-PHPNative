<?php
include_once '../../koneksi.php';
include_once '../../models/Prestasi.php';
$model = new Prestasi();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'tambah':
        $nama_prestasi = $_POST['nama_prestasi'];
        $camaba_akun_id = $_POST['camaba_akun_id'];
        //step 2 simpan ke array
        $data = [
            $nama_prestasi,
            $camaba_akun_id
        ];
        $model->setPrestasi($data);
        header('Location:../../../index.php?admin=maba_detail&akun_id=' . $camaba_akun_id);
        break;

    case 'hapus':
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->deletePrestasi($_POST['prestasi_id']);
        header('Location:../../../index.php?admin=maba_detail&akun_id=' . $_POST['akun_id']);
        break;

    default:
        header('Location:../../../index.php?admin=daftar_maba');
        break;
}
