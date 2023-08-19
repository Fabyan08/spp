<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA LAPORAN</h4>
            <p>Cetak Laporan Sesuai Tanggal</p>
            <!-- <form method="post"> -->
            <!-- <div class="input-group input-group-sm">
                    <div class="col-lg-3">
                        <input type="nama" name="nama" required placeholder="Cari Sesuai Nama.." class="form-control">
                    </div>
                    <span class="input-group-btn">
                        <button name="carinama" type="submit" class="btn btn-success">
                            <i class="mdi mdi-search-web"></i>Cari</button>
                    </span>
                </div><br> -->
            <div class="row">
                <!-- 
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 1</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="input-group input-group-sm">
                        <div class="row md-12">
                            <div class="col-lg-6">
                                <p>Dari Tanggal:</p>
                                <input type="date" name="tgl_awal" required placeholder="Input Bulan.." class="form-control"><br>
                                <p>Hingga Tanggal:</p>
                                <input type="date" name="tgl_akhir" required placeholder="Hingga Bulan.." class="form-control">
                            </div>
                            <span class="input-group-btn">
                                <button name="caribulan" type="submit" class="btn btn-success">
                                    <i class="mdi mdi-search-web"></i>Filter Tanggal</button>
                            </span>
                        </div>
            </form> -->
                <form action="pages/cetak-laporan.php" method="post">
                    <div class="input-group input-group-sm">
                        <div class="row md-12">
                            <div class="col-lg-6">
                                <p>Dari Tanggal:</p>
                                <input type="date" name="tgl_awal" required placeholder="Input Bulan.." class="form-control"><br>
                                <p>Hingga Tanggal:</p>
                                <input type="date" name="tgl_akhir" required placeholder="Hingga Bulan.." class="form-control">
                            </div>
                            <span class="input-group-btn">
                                <button name="caribulan" type="submit" class="btn btn-warning">
                                    <i class="mdi mdi-printer"></i>Cetak Laporan</button>
                            </span>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        <!-- <a href="pages/cetak-laporan.php" class="btn btn-gradient-primary btn-icon-text float-end">
    <i class="mdi mdi mdi-printer "></i>Cetak Semua Laporan</a> -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nisn</td>
                    <td>Nama</td>
                    <td>Kelas</td>
                    <td>Tahun SPP</td>
                    <td>Nominal Dibayar</td>
                    <td>Sudah Dibayar</td>
                    <td>Tanggal Bayar</td>
                    <td>Petugas</td>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
                    $page_no = $_GET['page_no'];
                } else {
                    $page_no = 1;
                }
                $total_per_halaman = 5;
                $offset = ($page_no - 1) * $total_per_halaman;

                $sebelumnya = $page_no - 1;
                $selanjutnya = $page_no + 1;
                //Cari Nama
                // if (isset($_POST['carinama'])) {
                //     $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
                //     $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.nama = '$nama'AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas  limit $offset, $total_per_halaman";
                // } else {
                //     $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas  limit $offset, $total_per_halaman";
                // }
                //Cari Bulan
                if (isset($_POST['caribulan'])) {
                    $tgl_awal = mysqli_real_escape_string($koneksi, $_POST['tgl_awal']);
                    $tgl_akhir = mysqli_real_escape_string($koneksi, $_POST['tgl_akhir']);

                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE tgl_bayar between '$tgl_awal' AND '$tgl_akhir' AND pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ";
                } else {
                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas limit $offset, $total_per_halaman";
                }
                // echo $sql;
                $hasil_query = mysqli_query($koneksi, "SELECT COUNT(*) as total_records FROM spp");
                $record = mysqli_fetch_array($hasil_query);
                $total_record = $record['total_records'];

                $total_no = ceil($total_record / $total_per_halaman);
                $no = $offset + 1;
                $query = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_array($query)) { ?>

                    <!-- 
                        $no = 1;
                        $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER by tgl_bayar DESC";
                        $query = mysqli_query($koneksi, $sql);
                        foreach ($query as $data) { -->
                    <!-- ?> -->
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
        </table><br>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" <?= ($page_no > 1) ? 'href=?url=laporan&page_no=' . $sebelumnya : ''; ?>>
                        Previous
                    </a>
                </li>
                <?php for ($counter = 1; $counter <= $total_no; $counter++) { ?>
                    <?php if ($page_no !== $counter) { ?>
                        <li class="page-item"><a class="page-link" href="?url=laporan&page_no=<?= $counter; ?>"><?= $counter; ?></a></li>
                    <?php } else { ?>
                        <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                    <?php } ?>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link  <?= ($page_no >= $total_no) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no) ? 'href=?url=laporan&page_no=' . $selanjutnya : ''; ?>>
                        Next
                    </a>
                </li>

            </ul>
            <div class="p-10 text-center">
                <strong>Halaman <?= $page_no; ?> dari <?= $total_no; ?></strong>
            </div>
        </nav><br><br>

    </div>
</div>