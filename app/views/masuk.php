<?php
authSessionToDashboard();
?>

<form action="app/controllers/masuk.php" method="post">
    <div class="border rounded">
        <div class="container my-4">
            <?php if (isset($_REQUEST['rdr'])) {
                if ($_REQUEST['rdr'] == 'sesi') { ?>
                    <div class="alert alert-danger" role="alert">
                        Anda harus login terlebih dahulu.
                    </div>
                <?php }

                if ($_REQUEST['rdr'] == 'daftar') { ?>
                    <div class="alert alert-primary" role="alert">
                        Akun berhasil dibuat, silahkan masuk.
                    </div>
                <?php }

                if ($_REQUEST['rdr'] == 'salah') { ?>
                    <div class="alert alert-danger" role="alert">
                        Email atau password salah.
                    </div>
            <?php
                }
            } ?>
            <h3 class="pb-3" id="data_diri">Masuk</h3>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" pattern=".{8,12}" title="8 sampai 12 karakter" name="password" required>
            </div>
            <div class="alert alert-secondary" role="alert">
                <b>Akun Admin</b><br>
                Email : root@admin.com <br>
                Password : 12345678
                <br>
                <br>
                "Saya Adrian Sutansaty tidak pernah menginput data yang berbau vulgar, kekerasan, atau rasisme. Apabila terdapat data yang kurang berkenan, maka dipastikan itu bukan hasil input saya."
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" name="proses" value="masuk" class="btn btn-primary">Konfirmasi</button>
    </div>
</form>