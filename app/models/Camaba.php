<?php
class Camaba
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct()
    {
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function getAllCamaba()
    {
        $sql = "SELECT *
                FROM camaba
                ORDER BY akun_id DESC";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getCamaba($akun_id)
    {
        $sql = "SELECT *
                FROM camaba
                WHERE akun_id = $akun_id";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetch();
        return $rs;
    }
    public function editCamaba($data)
    {
        $sql = "UPDATE camaba SET nama=?, nisn=?, alamat=?, jenis_kelamin=?, agama=?, tempat_lahir=?, tgl_lahir=?, nama_ortu=?, nilai_indo=?, nilai_ing=?, nilai_mat=?, nilai_ipa=?, jumlah_nilai=?, sekolah_asal=? WHERE akun_id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function setCamaba($data)
    {
        $sql = "INSERT INTO camaba (nama, nisn, alamat, jenis_kelamin, agama, tempat_lahir, tgl_lahir, nama_ortu, nilai_indo, nilai_ing, nilai_mat, nilai_ipa, jumlah_nilai, sekolah_asal, akun_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deleteCamaba($akun_id)
    {
        $sql = "DELETE FROM camaba WHERE akun_id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$akun_id]);
        $sql = "DELETE FROM akun WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$akun_id]);
    }
}
