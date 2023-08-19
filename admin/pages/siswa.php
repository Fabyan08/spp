<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA SISWA</h4>
            <form method="post">
                <div class="input-group input-group-sm">
                    <div class="col-lg-3">
                        <input type="text" name="nama" required placeholder="Cari Sesuai Nama..." class="form-control">
                    </div>
                    <button name="carinama" type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-search-web"></i>Cari</button>
                </div>
            </form>
            <a href="?url=tambah-siswa" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-library-plus btn-icon-prepend"></i>Tambah Siswa</a>
            </p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nisn</td>
                        <td>Nis</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Alamat</td>
                        <td>No telp</td>
                        <td>Spp</td>
                        <td>Edit</td>
                        <td>Hapus</td>
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
                    //cari
                    if (isset($_POST['carinama'])) {
                        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
                        $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.nama='$nama' AND siswa.id_spp=spp.id_spp limit $offset, $total_per_halaman";
                    } else {
                        $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp limit $offset, $total_per_halaman";
                    }
                    $hasil_query = mysqli_query($koneksi, "SELECT COUNT(*) as total_records FROM siswa");
                    $record = mysqli_fetch_array($hasil_query);
                    $total_record = $record['total_records'];

                    $total_no = ceil($total_record / $total_per_halaman);
                    $no = $offset + 1;
                    $query = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <!-- $no = 1;
                    $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER by nama ASC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) { ?> -->

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nisn'] ?></td>
                            <td><?= $data['nis'] ?></td>

                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['no_telp'] ?></td>
                            <td><?= $data['tahun'] ?> - <?= number_format($data['nominal'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="?url=edit-siswa&nisn=<?= $data['nisn'] ?>" class="btn btn-warning"><i class="mdi mdi-tooltip-edit btn-icon-append"></i>EDIT</a>
                            </td>
                            <td>
                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-siswa&nisn=<?= $data['nisn'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" <?= ($page_no > 1) ? 'href=?url=siswa&page_no=' . $sebelumnya : ''; ?>>
                        Previous
                    </a>
                </li>
                <?php for ($counter = 1; $counter <= $total_no; $counter++) { ?>
                    <?php if ($page_no !== $counter) { ?>
                        <li class="page-item"><a class="page-link" href="?url=siswa&page_no=<?= $counter; ?>"><?= $counter; ?></a></li>
                    <?php } else { ?>
                        <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                    <?php } ?>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link  <?= ($page_no >= $total_no) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no) ? 'href=?url=siswa&page_no=' . $selanjutnya : ''; ?>>
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