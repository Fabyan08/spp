<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DATA PEMBAYARAN</h4>
            <form method="post">
                <table>
                    <tr>
                        <td>Nama/NISN</td>
                        <td>
                            <!-- <option value="">Pilih Kelas</option> -->
                            <select type="text" class="nama form-control " name="nisn" required="required">
                                <option value="">Nama</option>
                                <?php
                                include '../koneksi.php';
                                $spp = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nisn DESC");
                                foreach ($spp as $data_spp) {
                                ?>
                                    <option value="<?= $data_spp['nisn'] ?>"> <?= $data_spp['nisn']; ?> - <?= $data_spp['nama']; ?> </option>
                                <?php } ?>
                            </select>
                        </td>

                        <td><button style="margin-left: 300px;" name="filtnama" type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-search-web"></i>CARI</button>
                    </tr>
                </table>

            </form>

            <table class="table table-hover" id="mytable">
                <thead>
                    <tr>
                        <!-- <td>No</td> -->
                        <td>Nisn</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Tahun</td>
                        <td>Nominal</td>
                        <td>Sudah DiBayar</td>
                        <td>Kekurangan</td>
                        <td>Status</td>
                        <td>History</td>
                        <td>Detail</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;

                    if (isset($_POST['filtnama'])) {
                        $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);

                        // echo $kelas;

                        $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp and siswa.nisn='$nisn' ORDER by nama ASC limit 1";


                        // $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND siswa.nisn = $nisn AND siswa.id_kelas=kelas.id_kelas AND siswa.id_kelas='$kelas2' ORDER by nama ASC";
                    } else {
                        $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND siswa.id_kelas=kelas.id_kelas ORDER by nama limit 0";
                    }
                    // if (isset($_POST['filternama']) && isset($_POST['filtkelas'])) {
                    //     $nisn = mysqli_real_escape_string($koneksi, $_POST['nama']);
                    //     $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
                    //     $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
                    //     if (isset($_POST['filtkelas'])) {
                    //         $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
                    //         // echo $kelas;
                    //     }
                    //     //Pencarian pakai nama
                    //     $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp and siswa.nisn='$nisn' and spp.id_spp='$tahun' and siswa.id_kelas='$kelas' ORDER by nama ASC limit 1;";
                    // } else {
                    //     $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER by nisn ASC limit 0";
                    // }

                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) {
                        $data_pembayaran = mysqli_query($koneksi, "SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
                        $data_pembayaran = mysqli_fetch_array($data_pembayaran);
                        $sudah_bayar = $data_pembayaran['jumlah_bayar'];
                        $kekurangan = $data['nominal'] - $data_pembayaran['jumlah_bayar'];
                        $nominal = $data['nominal'];
                    ?>
                        <tr>
                            <td><?= $data['nisn'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['tahun'] ?></td>
                            <td><?= number_format($data['nominal'], 2, ',', '.'); ?></td>
                            <td><?= number_format($sudah_bayar, 2, ',', '.'); ?></td>
                            <td><?= number_format($kekurangan, 2, ',', '.'); ?></td>
                            <td>
                                <?php
                                if ($kekurangan == 0) {
                                    echo "<span class='badge badge-gradient-success'> Sudah Lunas </span>";
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum Lunas </span>";
                                ?>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="?url=history-pembayaran&nisn=<?= $data['nisn'] ?>" class="btn btn-info">HISTORY</a>
                            </td>
                            <td>
                                <a value="<? $nisn = $data['nisn']; ?>" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</a>
                                <!-- <button value="<? $nisn = $data['nisn']; ?>" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</button> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pembayaran Bulanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Total SPP dalam tahun <?= $data['tahun'] ?> adalah <?= "Rp" . number_format($nominal, 2, ',', '.') ?></h4>
                <!-- <h5>SPP yang kurang dibayarkan adalah<?php // "Rp" . number_format($kekurangan, 2, ',', '.') 
                                                            ?></h5> -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Status & Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $nama = "";
                        if (isset($_POST['filtnama'])) {
                            $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);

                            // echo $kelas;

                            $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp and siswa.nisn='$nisn' ORDER by nama ASC limit 1";
                        } else {
                            $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND siswa.id_kelas=kelas.id_kelas ORDER by nama limit 0";
                        }
                        // if (isset($_POST['filter'])) {
                        //     // $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
                        //     $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
                        //     $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);

                        //     //Pencarian pakai nama
                        //     // $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp and siswa.nama='$nama' and spp.id_spp='$tahun' and siswa.id_kelas='$kelas' ORDER by nama ASC;";
                        //     //Pencarian kelas dan tahun
                        //     $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp and spp.id_spp='$tahun' and siswa.id_kelas='$kelas' ORDER by nama ASC;";
                        //     // echo $sql;
                        // } elseif (isset($_POST['filternama'])) {
                        //     $nisn = mysqli_real_escape_string($koneksi, $_POST['nama']);
                        //     // $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
                        //     $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
                        //     $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp and siswa.nisn='$nisn' and siswa.id_kelas='$kelas' ORDER by nama ASC limit 1;";
                        // } else {
                        // $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER by nisn ASC limit 5";
                        // }                          

                        $query = mysqli_query($koneksi, $sql);

                        foreach ($query as $data) {
                            $data_pembayaran = mysqli_query($koneksi, "SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
                            $data_pembayaran = mysqli_fetch_array($data_pembayaran);
                            $sudah_bayar = $data_pembayaran['jumlah_bayar'];
                            $kekurangan = $data['nominal'] - $data_pembayaran['jumlah_bayar'];

                            //Ambil Bulan yang sudah dibayar
                            $dibayar = mysqli_query($koneksi, "SELECT * FROM pembayaran where nisn = '$data[nisn]'");
                            $bulan[] = 0;
                            while ($blnbayar = mysqli_fetch_array($dibayar)) {
                                //$bulan = array($blnbayar['bulan_bayar']);
                                $bulan[] = $blnbayar['bulan_bayar'];
                            }

                            foreach ($bulan as $b) {
                                $b;
                            }
                            $jumlah = count($bulan);

                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Januari</td>
                                <td>
                                    <?php
                                    // echo $bulan[0];
                                    // echo $data['nisn'];
                                    $januari = 0;
                                    $bln = 'januari';
                                    if (in_array('januari', $bulan)) {
                                        //echo $bulan['0'];
                                        $januari = 1;
                                    }

                                    if ($januari == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Januari </span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>

                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Februari</td>
                                <td>
                                    <?php
                                    $februari = 0;
                                    $bln = 'februari';
                                    if (in_array('februari', $bulan)) {
                                        //echo $bulan['0'];
                                        $februari = 1;
                                    }
                                    if ($februari == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Februari</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Maret</td>
                                <td>
                                    <?php
                                    $maret = 0;
                                    $bln = 'maret';
                                    if (in_array('maret', $bulan)) {
                                        //echo $bulan['0'];
                                        $maret = 1;
                                    }
                                    if ($maret == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Maret </span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>April</td>
                                <td>
                                    <?php
                                    $april = 0;
                                    $bln = 'april';
                                    if (in_array('april', $bulan)) {
                                        //echo $bulan['0'];
                                        $april = 1;
                                    }
                                    if ($april == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas April</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Mei</td>
                                <td>
                                    <?php
                                    $mei = 0;
                                    $bln = 'mei';
                                    if (in_array('mei', $bulan)) {
                                        //echo $bulan['0'];
                                        $mei = 1;
                                    }
                                    if ($mei == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Mei</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Juni</td>
                                <td>
                                    <?php
                                    $juni = 0;
                                    $bln = 'juni';
                                    if (in_array('juni', $bulan)) {
                                        //echo $bulan['0'];
                                        $juni = 1;
                                    }
                                    if ($juni == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Juni</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Juli</td>
                                <td>
                                    <?php
                                    $juli = 0;
                                    $bln = 'juli';
                                    if (in_array('juli', $bulan)) {
                                        //echo $bulan['0'];
                                        $juli = 1;
                                    }
                                    if ($juli == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Juli</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Agustus</td>
                                <td>
                                    <?php
                                    $agustus = 0;
                                    $bln = 'agustus';
                                    if (in_array('agustus', $bulan)) {
                                        //echo $bulan['0'];
                                        $agustus = 1;
                                    }
                                    if ($agustus == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Agustus</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>September</td>
                                <td>
                                    <?php
                                    $september = 0;
                                    $bln = 'september';
                                    if (in_array('september', $bulan)) {
                                        //echo $bulan['0'];
                                        $september = 1;
                                    }
                                    if ($september == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas September </span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Oktober</td>
                                <td>
                                    <?php
                                    $oktober = 0;
                                    $bln = 'oktober';
                                    if (in_array('oktober', $bulan)) {
                                        //echo $bulan['0'];
                                        $oktober = 1;
                                    }
                                    if ($oktober == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Oktober </span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>November</td>
                                <td>
                                    <?php
                                    $november = 0;
                                    $bln = 'november';
                                    if (in_array('november', $bulan)) {
                                        //echo $bulan['0'];
                                        $november = 1;
                                    }
                                    if ($november == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas November</span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Desember</td>
                                <td>
                                    <?php
                                    $desember = 0;
                                    $bln = 'desember';
                                    if (in_array('desember', $bulan)) {
                                        //echo $bulan['0'];
                                        $desember = 1;
                                    }
                                    if ($desember == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Desember </span>";
                                    } else { ?>
                                        <a href="?url=tambah-pembayaran&nisn=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan ?>&bulan=<?= $bln ?>&tahun=<?= $data['tahun'] ?>" class="btn btn-danger">Pilih & Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script> -->