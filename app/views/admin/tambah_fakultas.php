<?php

$sesi = authSession(1);

?><form action="app/controllers/by_admin/fakultas.php" method="post">
    <div class="border rounded">
        <div class="container my-4">
            <h3 class="pb-3">Tambah Fakultas</h3>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="proses" value="tambah" class="btn btn-primary">Tambahkan</button>
    </div>
</form>