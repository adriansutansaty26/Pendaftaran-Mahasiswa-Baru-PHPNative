<?php
class ProdiCamaba
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
    public function getProdiCamaba($camaba_akun_id)
    {
        $sql = "SELECT * FROM prodi_camaba
        INNER JOIN prodi ON prodi_camaba.prodi_id = prodi.id
        INNER JOIN fakultas ON prodi.fakultas_id = fakultas.id
        WHERE camaba_akun_id = $camaba_akun_id;";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetch();
        return $rs;
    }
    public function setProdiCamaba($data)
    {
        $sql = "INSERT INTO prodi_camaba (prodi_id, camaba_akun_id) VALUES (?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deleteProdiCamaba($id)
    {
        $sql = "DELETE FROM prodi_camaba WHERE camaba_akun_id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
    public function deleteProdiCamabaByProdi($id)
    {
        $sql = "DELETE FROM prodi_camaba WHERE prodi_id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
