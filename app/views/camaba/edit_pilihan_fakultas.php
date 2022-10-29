<?php

$sesi = authSession(0);

//ciptakan object dari class Pegawai
$modelFakultas = new Fakultas();
// //panggil fungsi untuk menampilkan data pegawai
$fakultas = $modelFakultas->getAllFakultas();

?>

<form action="index.php?camaba=edit_pilihan_prodi" method="post">
    <h3 class="pb-3 text-center">Edit Pilihan Fakultas</h3>
    <div class="border rounded">
        <div class="container my-4">
            <div class="mb-3">
                <label for="agama" class="form-label">Fakultas</label>
                <select class="form-select" id="fakultas_id" name="fakultas_id">
                    <?php
                    foreach ($fakultas as $f) {
                    ?>
                        <option value="<?= $f['id']; ?>"><?= $f['nama_fakultas']; ?></option>
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