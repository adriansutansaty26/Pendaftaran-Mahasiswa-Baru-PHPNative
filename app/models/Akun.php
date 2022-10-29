<?php
class Akun
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct()
    {
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    public function setAkun($data)
    {
        if ($this->cekEmail($data[0])) {
            $sql = "INSERT INTO akun (email, password, level) VALUES (?,SHA1(MD5(SHA1(?))),0)";
            //menggunakan mekanisme prepare statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($data);
            return true;
        } else {
            return false;
        }
    }
    public function cekId($id)
    {
        $sql = "SELECT * FROM akun WHERE id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        if (empty($rs)) {
            return false;
        } else {
            return true;
        }
    }
    public function cekEmail($email)
    {
        $sql = "SELECT * FROM akun WHERE email = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$email]);
        $rs = $ps->fetch();
        if (!empty($rs)) {
            return false;
        } else {
            return true;
        }
    }
    public function cekLogin($data)
    {
        $sql = "SELECT * FROM akun WHERE email = ? AND password = SHA1(MD5(SHA1(?)))";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }
}
