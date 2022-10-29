<?php
include_once 'Prodi.php';
class Fakultas
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
    public function getAllFakultas()
    {
        $sql = "SELECT *
                FROM fakultas";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getFakultas($id)
    {
        $sql = "SELECT *
                FROM fakultas
                WHERE id = $id";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetch();
        return $rs;
    }
    public function setFakultas($data)
    {
        $sql = "INSERT INTO fakultas (nama_fakultas) VALUES (?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function editFakultas($data)
    {
        $sql = "UPDATE fakultas SET nama_fakultas=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deleteFakultas($id)
    {
        $model = new Prodi();
        $model->deleteProdiByFakultas($id);
        $sql = "DELETE FROM fakultas WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
