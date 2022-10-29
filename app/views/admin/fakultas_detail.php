<?php

$sesi = authSession(1);

//ciptakan object dari class Pegawai
$modelFakultas = new Fakultas();
$modelProdi = new Prodi();
//panggil fungsi untuk menampilkan data pegawai
$fakultas;
if (isset($_REQUEST['id'])) {
    $fakultas = $modelFakultas->getFakultas($_REQUEST['id']);
    $prodi = $modelProdi->getProdiByFakultas($_REQUEST['id']);
};

?>

<div class="row">
    <div class="col-12">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col" colspan="2">
                        <h3 class="pb-2 text-center">Informasi Fakultas</h3>
                    </th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">Data Fakultas&nbsp;
                        <a href="index.php?admin=fakultas_edit&id=<?= $fakultas['id'] ?>" class="text-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <td scope="col">Nama Fakultas</td>
                    <td><?= $fakultas['nama_fakultas'] ?></td>
                </tr>
                <tr>
                    <th scope="col" colspan="2">Daftar Prodi&nbsp;
                        <a href="index.php?admin=tambah_prodi&id=<?= $fakultas['id'] ?>" class="text-secondary">
                            <i class="fa fa-add"></i>
                        </a>
                    </th>
                </tr>
                <?php
                $no = 1;
                if (!empty($prodi)) {
                    foreach ($prodi as $row) {
                ?>
                        <tr>
                            <th scope="row">

                                <form action="app/controllers/by_admin/prodi.php" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Prestasi">
                                        <i class="fa fa-trash-can" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="fakultas_id" value="<?= $_REQUEST['id'] ?>">
                                </form>
                                &nbsp;
                                <?= $no ?>
                            </th>
                            <td><?= $row['nama_jurusan'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                } else { ?>
                    <tr>
                        <td>Tidak ada prodi</td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</div>