<?php

$sesi = authSession(1);

//ciptakan object dari class Pegawai
$modelFakultas = new Fakultas();
//panggil fungsi untuk menampilkan data pegawai
$fakultas = $modelFakultas->getFakultas($_REQUEST['id']);

?>

<form action="app/controllers/by_admin/fakultas.php" method="post">
    <h3 class="pb-3 text-center">Edit Fakultas</h3>
    <div class="border rounded">
        <div class="container my-4">
            <h3 class="pb-3" id="camaba">Data Fakultas</h3>
            <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $fakultas['nama_fakultas'] ?>">
            </div>
        </div>
    </div>
    <div class=" mt-3">
        <a href="index.php?admin=daftar_fakultas" class="btn btn-danger">Batal</a>
        <button type="submit" name="proses" value="edit" class="btn btn-primary">Konfirmasi Pengeditan</button>
    </div>
</form>