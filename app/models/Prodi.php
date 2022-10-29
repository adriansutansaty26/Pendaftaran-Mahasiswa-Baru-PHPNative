<?php
include_once 'ProdiCamaba.php';
class Prodi
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
    public function getAllProdi()
    {
        $sql = "SELECT *
                FROM prodi";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getProdiById($id)
    {
        $sql = "SELECT *
                FROM prodi
                WHERE id = $id";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getProdiByFakultas($fakultas_id)
    {
        $sql = "SELECT *
                FROM prodi
                WHERE fakultas_id = $fakultas_id";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function setProdi($data)
    {
        $sql = "INSERT INTO prodi (nama_jurusan, fakultas_id) VALUES (?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deleteProdiCamaba($id)
    {
        $model = new ProdiCamaba();
        $model->deleteProdiCamabaByProdi($id);
    }
    public function deleteProdi($id)
    {
        $this->deleteProdiCamaba($id);
        $sql = "DELETE FROM prodi WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
    public function deleteProdiByFakultas($id)
    {
        $prodi = $this->getProdiByFakultas($id);
        if (!empty($prodi)) {
            foreach ($prodi as $p) {
                $this->deleteProdi($p['id']);
            }
        }
        $sql = "DELETE FROM prodi WHERE fakultas_id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
