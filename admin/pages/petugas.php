<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA PETUGAS</h4>
            <a href="?url=tambah-petugas" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Tambah Petugas</a>
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
                    $no = 1;
                    $sql = "SELECT * FROM petugas ORDER by id_petugas DESC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td><?= $data['nama_petugas'] ?></td>
                            <td><?= $data['level'] ?></td>
                            <td>
                                <a href="?url=edit-petugas&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-warning"><i class="mdi mdi-file-check btn-icon-append"></i>EDIT</a>
                            </td>
                            <td>
                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-petugas&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>