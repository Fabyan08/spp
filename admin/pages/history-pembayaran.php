<?php
$nisn = $_GET['nisn'];
?>

<a href="?url=pembayaran&nisn=<?= $nisn; ?>" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">HISTORY PEMBAYARAN</h4>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Nisn</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Tahun</td>
                        <td>Nominal</td>
                        <td>Sudah Dibayar</td>
                        <td>Bulan</td>
                        <td>Tanggal</td>
                        <td>Dibayarkan Oleh</td>
                        <td>Aksi</td>
                        <td>Cetak</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND  siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER by tgl_bayar DESC";
                    // echo $sql;
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) {
                    ?>
                        <tr>
                            <td><?= $data['nisn'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['tahun'] ?></td>
                            <td><?= "Rp" . number_format($data['nominal'], 2, ',', '.'); ?></td>
                            <td><?= "Rp" . number_format($data['jumlah_bayar'], 2, ',', '.'); ?></td>
                            <td><?= $data['bulan_bayar'] ?></td>
                            <td><?= $data['tgl_bayar'] ?></td>
                            <td><?= $data['nama_petugas'] ?></td>
                            <td>
                                <a href="?url=hapus-pembayaran&id_pembayaran=<?= $data['id_pembayaran'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                            </td>
                            <form action="cetak-laporan.php" method="post">

                                <td>
                                    <a href="./cetak-laporan-id.php?nisn=<?= $data['nisn']; ?>&bulan_bayar=<?= $data['bulan_bayar'] ?>" class="btn btn-warning"><i class="mdi mdi-printer"></i></a>
                                </td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>