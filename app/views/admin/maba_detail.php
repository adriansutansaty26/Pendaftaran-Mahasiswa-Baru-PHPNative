<?php

$sesi = authSession(1);

//ciptakan object dari class Pegawai
$modelCamaba = new Camaba();
$modelPrestasi = new Prestasi();
$modelProdi = new ProdiCamaba();
//panggil fungsi untuk menampilkan data pegawai
$camaba;
$data_prestasi;
$data_prodi;
if (isset($_REQUEST['akun_id'])) {
    $camaba = $modelCamaba->getCamaba($_REQUEST['akun_id']);
    $data_prestasi = $modelPrestasi->getPrestasi($_REQUEST['akun_id']);
    $data_prodi = $modelProdi->getProdiCamaba($_REQUEST['akun_id']);
};

?>

<div class="row">
    <div class="col-12">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col" colspan="2">
                        <h3 class="pb-2 text-center">Informasi Camaba</h3>
                    </th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">Data Diri&nbsp;
                        <a href="index.php?admin=maba_edit&akun_id=<?= $camaba['akun_id'] ?>#data_diri" class="text-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <td scope="col">Nama</td>
                    <td><?= $camaba['nama'] ?></td>
                </tr>
                <tr>
                    <td scope="col">NISN</td>
                    <td><?= $camaba['nisn'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Alamat</td>
                    <td><?= $camaba['alamat'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Jenis Kelamin</td>
                    <td><?= $camaba['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                </tr>
                <tr>
                    <td scope="col">Agama</td>
                    <td><?= $camaba['agama'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Tempat Lahir</td>
                    <td><?= $camaba['tempat_lahir'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Tanggal Lahir</td>
                    <td><?= $camaba['tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Nama Orang Tua</td>
                    <td><?= $camaba['nama_ortu'] ?></td>
                </tr>
                <tr>
                    <th scope="col" colspan="2"></th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">Data Prodi Pilihan&nbsp;
                    </th>
                </tr>
                <tr>
                    <td scope="col">Fakultas</td>
                    <td><?= !empty($data_prodi['nama_fakultas']) ? $data_prodi['nama_fakultas'] : 'Belum memilih' ?></td>
                </tr>
                <tr>
                    <td scope="col">Prodi</td>
                    <td><?= !empty($data_prodi['nama_jurusan']) ? $data_prodi['nama_jurusan'] : 'Belum memilih' ?></td>
                </tr>
                <tr>
                    <th scope="col" colspan="2"></th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">Data Akademik&nbsp;
                        <a href="index.php?admin=maba_edit&akun_id=<?= $camaba['akun_id'] ?>#data_akademik" class="text-secondary">
                            <i class="fa fa-edit"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <td scope="col">Sekolah Asal</td>
                    <td><?= $camaba['sekolah_asal'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Nilai Bahasa Indonesia</td>
                    <td><?= $camaba['nilai_indo'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Nilai Bahasa Inggris</td>
                    <td><?= $camaba['nilai_ing'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Nilai Matematika</td>
                    <td><?= $camaba['nilai_mat'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Nilai IPA</td>
                    <td><?= $camaba['nilai_ipa'] ?></td>
                </tr>
                <tr>
                    <td scope="col">Jumlah Nilai</td>
                    <td>= <?= $camaba['jumlah_nilai'] ?></td>
                </tr>
                <tr>
                    <th scope="col" colspan="2"></th>
                </tr>
                <tr>
                    <th scope="col" colspan="2">Prestasi&nbsp;
                        <a href="index.php?admin=tambah_prestasi&akun_id=<?= $camaba['akun_id'] ?>" class="text-secondary">
                            <i class="fa fa-add"></i>
                        </a>
                    </th>
                </tr>
                <?php
                $no = 1;
                if (!empty($data_prestasi)) {
                    foreach ($data_prestasi as $row) {
                ?>
                        <tr>
                            <th scope="row">

                                <form action="app/controllers/by_admin/prestasi.php" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Prestasi">
                                        <i class="fa fa-trash-can" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="prestasi_id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="akun_id" value="<?= $camaba['akun_id'] ?>">
                                </form>
                                &nbsp;
                                <?= $no ?>
                            </th>
                            <td><?= $row['nama_prestasi'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                } else { ?>
                    <tr>
                        <td>Tidak memiliki prestasi</td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</div>