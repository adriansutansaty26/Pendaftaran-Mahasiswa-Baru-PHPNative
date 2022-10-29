<?php
//------sertakan file koneksi db------
include_once 'app/koneksi.php';
//------sertakan models------
include_once 'app/models/Camaba.php';
include_once 'app/models/Prestasi.php';
include_once 'app/models/Prodi.php';
include_once 'app/models/Fakultas.php';
include_once 'app/models/ProdiCamaba.php';

include_once 'app/views/auth.php';

//------sertakan potongan2 file template web------
include_once 'app/views/layout/header.php';


//jika ada request dari menu di url tampilkan hal sesuai request
if (!empty($_REQUEST['hal'])) {
    include_once 'app/views/' . $_REQUEST['hal'] . '.php';
} else if (!empty($_REQUEST['admin'])) {
    include_once 'app/views/admin/' . $_REQUEST['admin'] . '.php';
} else if (!empty($_REQUEST['camaba'])) {
    include_once 'app/views/camaba/' . $_REQUEST['camaba'] . '.php';
} else { //jika tidak ada request dari menu di url tampilkan hal home.php
    include_once 'app/views/home.php';
}

include_once 'app/views/layout/footer.php';
