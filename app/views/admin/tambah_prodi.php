<?php
$sesi = authSession(1);
?>
<form action="app/controllers/by_admin/prodi.php" method="post">
    <div class="border rounded">
        <div class="container my-4">
            <h3 class="pb-3" id="data_diri">Tambah Prodi</h3>
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
            </div>
            <input type="number" class="form-control" value="<?= $_REQUEST['id']; ?>" name="fakultas_id" hidden>
            <button type="submit" name="proses" value="tambah" class="btn btn-primary">Tambahkan</button>
        </div>
</form>