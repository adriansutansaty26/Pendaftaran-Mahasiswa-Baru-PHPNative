<?php

$sesi = authSession(0);

if (!isset($_POST['fakultas_id'])) {
    header('Location:index.php?camaba=edit_pilihan_fakultas');
}

//ciptakan object dari class Pegawai
$modelProdi = new Prodi();
// //panggil fungsi untuk menampilkan data pegawai
$prodi = $modelProdi->getProdiByFakultas($_POST['fakultas_id']);

?>

<form action="app/controllers/by_camaba/prodicamaba.php" method="post">
    <h3 class="pb-3 text-center">Edit Pilihan Prodi</h3>
    <div class="border rounded">
        <div class="container my-4">
            <div class="mb-3">
                <input type="text" name="akun_id" value="<?= $sesi['id']; ?>" hidden>
                <label for="agama" class="form-label">Prodi</label>
                <select class="form-select" id="prodi_id" name="prodi_id">
                    <?php
                    foreach ($prodi as $p) {
                    ?>
                        <option value="<?= $p['id']; ?>"><?= $p['nama_jurusan']; ?></option>
                    <?php
                    } ?>
                </select>
            </div>
        </div>
    </div>
    <div class=" mt-3">
        <a href="index.php?hal=daftar_maba" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Pilih</button>
    </div>
</form>