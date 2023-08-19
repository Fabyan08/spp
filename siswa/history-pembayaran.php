<?php
$nisn = $_SESSION['nisn'];
// echo $nisn;
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">HISTORY PEMBAYARAN</h4>
            <?php include '../koneksi.php';
            $no = 1;
            $sql1 = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND  siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER by tgl_bayar DESC";

            $query1 = mysqli_query($koneksi, $sql1);
            $data = mysqli_fetch_array($query1) ?>
            <?php
            if ($data['nisn'] = "") {
                echo "<h3>Anda belum membayar</h3>";
            } else {
            ?>
                <h1><?= $data['nisn'] ?></h1>
            <?php }
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Tahun SPP</td>
                        <td>Nominal DiBayar</td>
                        <td>Sudah DiBayar</td>
                        <td>Tanggal Bayar</td>
                        <td>Petugas</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND  siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER by tgl_bayar DESC";
                    $query = mysqli_query($koneksi, $sql);
                    foreach ($query as $data) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
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
            </table>
        </div>
    </div>
</div>




<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tiap Bulan</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND  siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER by tgl_bayar DESC limit 1";
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
                                $januari = 0;
                                $bln = 'januari';
                                if (in_array('januari', $bulan)) {
                                    //echo $bulan['0'];
                                    $januari = 1;
                                }

                                if ($januari == 1) {
                                    echo "<span class='badge badge-gradient-success'> Sudah Lunas Januari </span>";
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
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
                                } else {
                                    echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND  siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER by tgl_bayar DESC limit 1";
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
                                    $januari = 0;
                                    $bln = 'januari';
                                    if (in_array('januari', $bulan)) {
                                        //echo $bulan['0'];
                                        $januari = 1;
                                    }

                                    if ($januari == 1) {
                                        echo "<span class='badge badge-gradient-success'> Sudah Lunas Januari </span>";
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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
                                    } else {
                                        echo "<span class='badge badge-gradient-danger'> Belum lunas </span>";
                                    } ?>
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