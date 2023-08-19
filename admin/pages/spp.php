<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA SPP</h4>

            <form method="post">
                <div class="input-group input-group-sm">
                    <div class="col-lg-3">
                        <input type="number" name="tahun" required placeholder="Cari Sesuai Tahun" class="form-control">
                    </div>
                    <span class="input-group-btn">
                        <button name="carispp" type="submit" class="btn btn-success">
                            <i class="mdi mdi-search-web"></i>Cari</button>
                    </span>
                </div>
            </form>
            <a href="?url=tambah-spp" class="btn btn-gradient-primary btn-icon-text float-end">
                <i class="mdi mdi-library-plus btn-icon-prepend"></i>Tambah SPP</a>

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
                    //pagination
                    // if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
                    //     $page_no = $_GET['page_no'];
                    // } else {
                    //     $page_no = 1;
                    // }
                    // $total_per_halaman = 5;
                    // $offset = ($page_no - 1) * $total_per_halaman;

                    // $sebelumnya = $page_no - 1;
                    // $selanjutnya = $page_no + 1;
                    // //cari
                    // if (isset($_POST['carispp'])) {
                    //     $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
                    //     $sql = "SELECT * FROM spp where tahun=$tahun limit $offset, $total_per_halaman";
                    // } else {
                    //     $sql = "SELECT * FROM spp limit $offset, $total_per_halaman";
                    // }
                    // $hasil_query = mysqli_query($koneksi, "SELECT COUNT(*) as total_records FROM spp");
                    // $record = mysqli_fetch_array($hasil_query);
                    // $total_record = $record['total_records'];

                    // $total_no = ceil($total_record / $total_per_halaman);
                    // $no = $offset + 1;
                    // $query = mysqli_query($koneksi, "SELECT cari_jumlah_bulan(000, 2023)");
                    // $query2 = mysqli_query($koneksi, $sql);

                    // $sql = "call cari_jumlah_bulan(000, 2023);";

                    // $q2 = "SELECT cari_jumlah_bulan(000,2023)";
                    // $query2 = mysqli_query($koneksi, "$q2");
                    // // echo $q2;
                    // foreach ($query2 as $data2) {
                    //     $data2['cari_jumlah_bulan'];
                    // }
                    // include('fungsi.php');
                    // while ($data = mysqli_fetch_array($query)) ;
                    $no = 1;
                    // $sql = "SELECT cari_jumlah_bulan(000, 2023);";
                    $query = mysqli_query($koneksi, "call select_spp()");
                    // $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) {
                        $tahun = $data['tahun'];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tahun; ?></td>
                            <td><?= "Rp" . number_format($data['nominal'], 0, ',', '.'); ?></td>

                            <td>

                                <a href="?url=edit-spp&id_spp=<?= $data['id_spp'] ?>" class="btn btn-warning">
                                    <i class="mdi mdi-tooltip-edit btn-icon-append"></i> EDIT</a>

                                <a onclick="return confirm('apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-spp&id_spp=<?= $data['id_spp'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>HAPUS</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>


    </div>
</div>