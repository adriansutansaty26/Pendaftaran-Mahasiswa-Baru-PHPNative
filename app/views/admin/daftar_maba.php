<?php

$sesi = authSession(1);

//ciptakan object dari class Pegawai
$model = new Camaba();
//panggil fungsi untuk menampilkan data pegawai
$data_diri = $model->getAllCamaba();

?>

<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Sekolah Asal</th>
                    <th scope="col">Jumlah Nilai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($data_diri)) {
                    $no = 1;
                    foreach ($data_diri as $row) {
                ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nisn'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['sekolah_asal'] ?></td>
                            <td><?= $row['jumlah_nilai'] ?></td>
                            <td>
                                <a href="index.php?admin=maba_detail&akun_id=<?= $row['akun_id'] ?>" class="btn btn-primary text-light btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="index.php?admin=maba_edit&akun_id=<?= $row['akun_id'] ?>" class="btn btn-warning text-dark btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="app/controllers/by_admin/camaba.php" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Camaba">
                                        <i class="fa fa-trash-can" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="akun_id" value="<?= $row['akun_id'] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum Ada Camaba</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>