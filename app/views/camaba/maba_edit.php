<?php

$sesi = authSession(0);

//ciptakan object dari class Pegawai
$modelCamaba = new Camaba();
$modelPrestasi = new Prestasi();
//panggil fungsi untuk menampilkan data pegawai
$camaba = $modelCamaba->getCamaba($sesi['id']);

?>

<form action="app/controllers/by_camaba/camaba.php" method="post">
    <h3 class="pb-3 text-center">Edit Data Camaba</h3>
    <div class="border rounded">
        <div class="container my-4">
            <h3 class="pb-3" id="camaba">Data Diri</h3>
            <input type="hidden" name="akun_id" value="<?= $sesi['id'] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $camaba['nama'] ?>">
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $camaba['nisn'] ?>">
            </div>
            <div class=" mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $camaba['alamat'] ?></textarea>
            </div>
            <div class=" mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <div class="input-group">
                    <div class="form-check w-100">
                        <input type="radio" class="form-check-input" id="laki" name="jenis_kelamin" value="L" <?php echo ($camaba['jenis_kelamin'] == 'L' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="laki">Laki-Laki</label>
                    </div>
                    <div class="form-check w-100">
                        <input type="radio" class="form-check-input" id="perempuan" name="jenis_kelamin" value="P" <?php echo ($camaba['jenis_kelamin'] == 'P' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" id="agama" name="agama">
                    <option selected value="<?= $camaba['agama'] ?>">-> <?php echo ($camaba['agama']) ?></option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghuchu">Konghuchu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $camaba['tempat_lahir'] ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $camaba['tgl_lahir'] ?>">
            </div>
            <div class="mb-3">
                <label for="nama_ortu" class="form-label">Nama Ortu</label>
                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="<?= $camaba['nama_ortu'] ?>">
            </div>
        </div>
    </div>
    <div class="border rounded mt-3">
        <div class="container my-4">
            <h3 class="pb-3" id="data_akademik">Data Akademik</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="nilai_indo" class="form-label">Nilai Bahasa Indonesia</label>
                    <input type="number" class="form-control" id="nilai_indo" name="nilai_indo" value="<?= $camaba['nilai_indo'] ?>">
                </div>
                <div class=" col-6 mb-3">
                    <label for="nilai_ing" class="form-label">Nilai Bahasa Inggris</label>
                    <input type="number" class="form-control" id="nilai_ing" name="nilai_ing" value="<?= $camaba['nilai_ing'] ?>">
                </div>
                <div class=" col-6 mb-3">
                    <label for="nilai_mat" class="form-label">Nilai Matematika</label>
                    <input type="number" class="form-control" id="nilai_mat" name="nilai_mat" value="<?= $camaba['nilai_mat'] ?>">
                </div>
                <div class=" col-6 mb-3">
                    <label for="nilai_ipa" class="form-label">Nilai Ilmu Pengetahuan Alam</label>
                    <input type="number" class="form-control" id="nilai_ipa" name="nilai_ipa" value="<?= $camaba['nilai_ipa'] ?>">
                </div>
            </div>
            <div class=" mb-3">
                <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" value="<?= $camaba['sekolah_asal'] ?>">
            </div>
        </div>
    </div>
    <div class=" mt-3">
        <a href="index.php?hal=daftar_maba" class="btn btn-danger">Batal</a>
        <button type="submit" name="proses" value="edit" class="btn btn-primary">Konfirmasi Pengeditan</button>
    </div>
</form>