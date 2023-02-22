<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA SISWA</h4>
            <a href="?url=tambah-siswa" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Tambah Siswa</a>
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
                    $no = 1;
                    $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER by nama ASC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) { ?>
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
                                <a href="?url=edit-siswa&nisn=<?= $data['nisn'] ?>" class="btn btn-warning"><i class="mdi mdi-file-check btn-icon-append"></i>EDIT</a>
                            </td>
                            <td>
                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-siswa&nisn=<?= $data['nisn'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>