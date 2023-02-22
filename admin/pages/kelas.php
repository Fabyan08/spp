<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA KELAS</h4>
            <a href="?url=tambah-kelas" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Tambah Kelas</a>
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
                    $no = 1;
                    $sql = "SELECT * FROM kelas ORDER by id_kelas DESC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['kompetensi_keahlian'] ?></td>
                            <td>
                                <a href="?url=edit-kelas&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-warning"><i class="mdi mdi-file-check btn-icon-append"></i>EDIT</a>
                            </td>
                            <td>
                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-kelas&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>