<?php
authSessionToDashboard();
?>
<form action="app/controllers/daftar.php" method="post">
    <div class="border rounded">
        <div class="container my-4">
            <?php if (isset($_REQUEST['result'])) {
                if ($_REQUEST['result'] == 'false') { ?>
                    <div class="alert alert-danger" role="alert">
                        ERROR! Email sudah digunakan sebelumnya.
                    </div>
            <?php }
            } ?>
            <h3 class="pb-3">Buat Akun</h3>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" pattern=".{8,12}" title="8 sampai 12 karakter" name="password" required>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="proses" value="tambah" class="btn btn-primary">Konfirmasi</button>
    </div>
</form>