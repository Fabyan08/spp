<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA KELAS</h4>
            <form method="post">
                <div class="input-group input-group-sm">
                    <div class="col-lg-3">
                        <input type="text" name="kelas" required placeholder="Cari Sesuai Nama Kelas" class="form-control">
                    </div>
                    <button name="carikelas" type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-search-web"></i>Cari</button>
                </div>
            </form>
            <a href="?url=tambah-kelas" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-library-plus btn-icon-prepend"></i>Tambah Kelas</a>
            </p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Kelas</td>
                        <td>Kompetensi Keahlian</td>
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
                    if (isset($_POST['carikelas'])) {
                        $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
                        $sql = "SELECT * FROM kelas where nama_kelas='$kelas' limit $offset, $total_per_halaman";
                    } else {
                        $sql = "SELECT * FROM kelas limit $offset, $total_per_halaman";
                    }
                    $hasil_query = mysqli_query($koneksi, "SELECT COUNT(*) as total_records FROM kelas");
                    $record = mysqli_fetch_array($hasil_query);
                    $total_record = $record['total_records'];

                    $total_no = ceil($total_record / $total_per_halaman);
                    $no = $offset + 1;
                    // $query = mysqli_query($koneksi, $sql);
                    // $sql = "SELECT * FROM kelas ORDER by id_kelas DESC";
                    $query = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['kompetensi_keahlian'] ?></td>
                            <td>
                                <a href="?url=edit-kelas&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-warning"><i class="mdi mdi-tooltip-edit btn-icon-append"></i>EDIT</a>
                            </td>
                            <td>
                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-kelas&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
            <form method="post">
                <div class="input-group input-group-sm">
                    <div class="col-lg-3">
                        <input type="text" name="kelas2" required placeholder="Cari Jumlah Siswa dalam 1 kelas  " class="form-control">
                    </div>
                    <button name="kelas" type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-search-web"></i>Cari</button>
                </div>
            </form>
            <?php if (isset($_POST['kelas2'])) {
                $kelas = "";
                $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas2']);

                $sql = "SELECT cari_jumlah_siswa('$kelas');";

                $query = mysqli_query($koneksi, $sql);
                // echo $sql;
                $data = mysqli_fetch_array($query);
                foreach ($data as $dt);
                echo "Jumlah siswa dalam kelas " . $kelas . " adalah " . $dt . " siswa";
                // }
            }
            // foreach ($data as $d) {
            //     echo $d;
            // }

            ?>


        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" <?= ($page_no > 1) ? 'href=?url=kelas&page_no=' . $sebelumnya : ''; ?>>
                        Previous
                    </a>
                </li>
                <?php for ($counter = 1; $counter <= $total_no; $counter++) { ?>
                    <?php if ($page_no !== $counter) { ?>
                        <li class="page-item"><a class="page-link" href="?url=kelas&page_no=<?= $counter; ?>"><?= $counter; ?></a></li>
                    <?php } else { ?>
                        <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                    <?php } ?>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link  <?= ($page_no >= $total_no) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no) ? 'href=?url=kelas&page_no=' . $selanjutnya : ''; ?>>
                        Next
                    </a>
                </li>

            </ul>
            <div class="p-10 text-center">
                <strong>Halaman <?= $page_no; ?> dari <?= $total_no; ?></strong>
            </div><br><br>
        </nav>

    </div>
</div>