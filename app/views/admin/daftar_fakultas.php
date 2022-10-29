<?php

$sesi = authSession(1);

//ciptakan object dari class Pegawai
$model = new Fakultas();
//panggil fungsi untuk menampilkan data pegawai
$fakultas = $model->getAllFakultas();

?>

<a class="btn btn-primary mb-5" href="index.php?admin=tambah_fakultas"><i class="fa fa-add"></i> Tambah Fakultas</a>

<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Fakultas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($fakultas)) {
                    $no = 1;
                    foreach ($fakultas as $row) {
                ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nama_fakultas'] ?></td>
                            <td>
                                <a href="index.php?admin=fakultas_detail&id=<?= $row['id'] ?>" class="btn btn-primary text-light btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="index.php?admin=fakultas_edit&id=<?= $row['id'] ?>" class="btn btn-warning text-dark btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="app/controllers/by_admin/fakultas.php" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Fakultas">
                                        <i class="fa fa-trash-can" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum Ada Fakultas</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>