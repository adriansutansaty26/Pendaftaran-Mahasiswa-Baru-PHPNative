<?php
$sesi = authSession(0);
?>
<form action="app/controllers/by_camaba/prestasi.php" method="post">
    <div class="border rounded">
        <div class="container my-4">
            <h3 class="pb-3" id="data_diri">Tambah Prestasi</h3>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Prestasi</label>
                <input type="text" class="form-control" id="nama_prestasi" name="nama_prestasi" required>
            </div>
            <input type="number" class="form-control" value="<?= $sesi['id']; ?>" name="camaba_akun_id" hidden>
            <button type="submit" name="proses" value="tambah" class="btn btn-primary">Tambahkan</button>
        </div>
</form>