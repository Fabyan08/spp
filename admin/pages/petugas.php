<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA PETUGAS</h4>
            <form method="post">
                <div class="input-group input-group-sm">

                    <div class="col-lg-3">
                        <input type="text" name="nama" required placeholder="Cari Sesuai Nama Petugas..." class="form-control">
                    </div>
                    <button name="carinama" type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-search-web"></i>Cari</button>
                </div>
            </form>
            <a href="?url=tambah-petugas" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-library-plus btn-icon-prepend"></i>Tambah Petugas</a>
            </p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Username</td>
                        <td>Password</td>
                        <td>Nama Petugas</td>
                        <td>Level</td>
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
                        $sql = "SELECT * FROM petugas where nama_petugas ='$nama' limit $offset, $total_per_halaman";
                    } else {
                        $sql = "SELECT * FROM petugas limit $offset, $total_per_halaman";
                    }
                    $hasil_query = mysqli_query($koneksi, "SELECT COUNT(*) as total_records FROM petugas");
                    $record = mysqli_fetch_array($hasil_query);
                    $total_record = $record['total_records'];

                    $total_no = ceil($total_record / $total_per_halaman);
                    $no = $offset + 1;
                    $query = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <!-- $no = 1;
                    $sql = "SELECT * FROM petugas ORDER by id_petugas DESC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) { ?> -->
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td><?= $data['nama_petugas'] ?></td>
                            <td><?= $data['level'] ?></td>
                            <td>
                                <a href="?url=edit-petugas&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-warning"><i class="mdi mdi-tooltip-edit btn-icon-append"></i>EDIT</a>
                            </td>
                            <td>
                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-petugas&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" <?= ($page_no > 1) ? 'href=?url=petugas&page_no=' . $sebelumnya : ''; ?>>
                        Previous
                    </a>
                </li>
                <?php for ($counter = 1; $counter <= $total_no; $counter++) { ?>
                    <?php if ($page_no !== $counter) { ?>
                        <li class="page-item"><a class="page-link" href="?url=petugas&page_no=<?= $counter; ?>"><?= $counter; ?></a></li>
                    <?php } else { ?>
                        <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                    <?php } ?>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link  <?= ($page_no >= $total_no) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no) ? 'href=?url=petugas&page_no=' . $selanjutnya : ''; ?>>
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