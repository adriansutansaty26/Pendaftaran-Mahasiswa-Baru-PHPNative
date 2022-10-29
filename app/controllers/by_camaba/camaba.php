<?php
include_once '../../koneksi.php';
include_once '../../models/Camaba.php';
include_once '../../models/Prestasi.php';
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Camaba();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'tambah':
        //step 1 tangkap request form
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $tmp_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $nama_ortu = $_POST['nama_ortu'];
        $nilai_indo = $_POST['nilai_indo'];
        $nilai_ing = $_POST['nilai_ing'];
        $nilai_mat = $_POST['nilai_mat'];
        $nilai_ipa = $_POST['nilai_ipa'];
        $nilai_ing = $_POST['nilai_ing'];
        $jumlah_nilai = $nilai_indo + $nilai_ing + $nilai_ipa + $nilai_mat;
        $sekolah_asal = $_POST['sekolah_asal'];
        //step 2 simpan ke array
        $data = [
            $nama,
            $nisn,
            $alamat,
            $jenis_kelamin,
            $agama,
            $tmp_lahir,
            $tgl_lahir,
            $nama_ortu,
            $nilai_indo,
            $nilai_ing,
            $nilai_mat,
            $nilai_ipa,
            $jumlah_nilai,
            $sekolah_asal
        ];
        $data[] = $_POST['akun_id'];
        $model->setCamaba($data);
        header('Location:../../../index.php?camaba=dasbor');
        break;

    case 'edit':
        //step 1 tangkap request form
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $tmp_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $nama_ortu = $_POST['nama_ortu'];
        $nilai_indo = $_POST['nilai_indo'];
        $nilai_ing = $_POST['nilai_ing'];
        $nilai_mat = $_POST['nilai_mat'];
        $nilai_ipa = $_POST['nilai_ipa'];
        $nilai_ing = $_POST['nilai_ing'];
        $jumlah_nilai = $nilai_indo + $nilai_ing + $nilai_ipa + $nilai_mat;
        $sekolah_asal = $_POST['sekolah_asal'];
        //step 2 simpan ke array
        $data = [
            $nama,
            $nisn,
            $alamat,
            $jenis_kelamin,
            $agama,
            $tmp_lahir,
            $tgl_lahir,
            $nama_ortu,
            $nilai_indo,
            $nilai_ing,
            $nilai_mat,
            $nilai_ipa,
            $jumlah_nilai,
            $sekolah_asal
        ];
        $data[] = $_POST['akun_id'];
        $model->editCamaba($data);
        header('Location:../../../index.php?camaba=dasbor');
        break;

    default:
        header('Location:../../../index.php?camaba=dasbor');
        break;
}
