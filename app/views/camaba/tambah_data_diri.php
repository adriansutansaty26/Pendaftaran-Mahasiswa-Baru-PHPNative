<?php

$sesi = authSession(0);

//ciptakan object dari class Pegawai
$modelCamaba = new Camaba();
//panggil fungsi untuk menampilkan data pegawai
$camaba;
$camaba = $modelCamaba->getCamaba($sesi['id']);
if (!empty($camaba)) {
    header('location:index.php?camaba=dasbor');
}

?>

<form action="app/controllers/by_camaba/camaba.php" method="post">
    <div class="border rounded">
        <div class="container my-4">
            <h3 class="pb-3" id="data_diri">Data Diri</h3>
            <input type="text" class="form-control" id="akun_id" name="akun_id" value="<?= $sesi['id']; ?>" hidden>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" required>
            </div>
            <div class=" mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
            <div class=" mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <div class="input-group">
                    <div class="form-check w-100">
                        <input type="radio" class="form-check-input" id="laki" name="jenis_kelamin" value="L">
                        <label class="form-check-label" for="laki">Laki-Laki</label>
                    </div>
                    <div class="form-check w-100">
                        <input type="radio" class="form-check-input" id="perempuan" name="jenis_kelamin" value="P">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" id="agama" name="agama">
                    <option selected value="-">- Masukkan Agama Anda -</option>
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
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>
            <div class="mb-3">
                <label for="nama_ortu" class="form-label">Nama Ortu</label>
                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
            </div>
        </div>
    </div>
    <div class="border rounded mt-3">
        <div class="container my-4">
            <h3 class="pb-3" id="data_akademik">Data Akademik</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="nilai_indo" class="form-label">Nilai Bahasa Indonesia</label>
                    <input type="number" class="form-control" id="nilai_indo" name="nilai_indo" required>
                </div>
                <div class=" col-6 mb-3">
                    <label for="nilai_ing" class="form-label">Nilai Bahasa Inggris</label>
                    <input type="number" class="form-control" id="nilai_ing" name="nilai_ing" required>
                </div>
                <div class=" col-6 mb-3">
                    <label for="nilai_mat" class="form-label">Nilai Matematika</label>
                    <input type="number" class="form-control" id="nilai_mat" name="nilai_mat" required>
                </div>
                <div class=" col-6 mb-3">
                    <label for="nilai_ipa" class="form-label">Nilai Ilmu Pengetahuan Alam</label>
                    <input type="number" class="form-control" id="nilai_ipa" name="nilai_ipa" required>
                </div>
            </div>
            <div class=" mb-3">
                <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" required>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
            <label class="form-check-label mb-3" for="flexCheckDefault">
                Saya mengkonfirmasi atas kebenaran data yang telah saya isi diatas.
            </label>
        </div>
        <button type="submit" name="proses" value="tambah" class="btn btn-primary">Konfirmasi</button>
    </div>
</form>