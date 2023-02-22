<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">CETAK LAPORAN</h4>
            <a href="pages/cetak-laporan.php" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi mdi-printer "></i>Cetak Laporan</a>
            </p>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nisn</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Tahun SPP</td>
                        <td>Nominal DiBayar</td>
                        <td>Sudah DiBayar</td>
                        <td>Tanggal Bayar</td>
                        <td>Petugas</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER by tgl_bayar DESC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nisn'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['tahun'] ?></td>
                            <td><?= number_format($data['nominal'], 2, ',', '.'); ?></td>
                            <td><?= number_format($data['jumlah_bayar'], 2, ',', '.'); ?></td>
                            <td><?= $data['tgl_bayar'] ?></td>
                            <td><?= $data['nama_petugas'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>