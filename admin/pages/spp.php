<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA SPP</h4>
            <a href="?url=tambah-spp" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Tambah SPP</a>
            </p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tahun</td>
                        <td>Nominal</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $sql = "SELECT * FROM spp ORDER by id_spp DESC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['tahun'] ?></td>
                            <td><?= $data['nominal'] ?></td>
                            <td>

                                <a href="?url=edit-spp&id_spp=<?= $data['id_spp'] ?>" class="btn btn-warning">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>EDIT</a>

                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-spp&id_spp=<?= $data['id_spp'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>