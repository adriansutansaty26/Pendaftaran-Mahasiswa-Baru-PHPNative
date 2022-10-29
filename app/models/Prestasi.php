<?php
class Prestasi
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
    public function getPrestasi($akun_id)
    {
        $sql = "SELECT *
                FROM prestasi
                WHERE camaba_akun_id = $akun_id";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function setPrestasi($data)
    {
        $sql = "INSERT INTO prestasi (nama_prestasi, camaba_akun_id) VALUES (?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deletePrestasi($id)
    {
        $sql = "DELETE FROM prestasi WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
