 <?php
    header("content-type:application/vnd-ms-excel");
    header("content-Disposition: attachment; filename=Laporan-pembayaran-SPP.xls");
    ?>
 <h5>Laporan Pembayaran SPP</h5>
 <table border="1" class="table table-striped table-bordered">
     <tr class="fw-bold">
         <td>No</td>
         <td>Nisn</td>
         <td>Nama</td>
         <td>Kelas</td>
         <td>Tahun SPP</td>
         <td>Nominal Dibayar</td>
         <td>Sudah Dibayar</td>
         <td>Tanggal Bayar</td>
         <td>Petugas</td>
     </tr>
     <?php
        include('../../koneksi.php');
        $no = 1;
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        // if (isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
        // $tgl_awal = $_POST['tgl_awal'];
        // $tgl_akhir = $_POST['tgl_akhir'];
        $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE tgl_bayar between '$tgl_awal' AND '$tgl_akhir' AND pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER by tgl_bayar ASC";
        // } else {
        //     $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER by tgl_bayar ASC";
        // }
        // echo $sql;
        $query = mysqli_query($koneksi, $sql);
        foreach ($query as $data) {
        ?>
         <tr>
             <td><?= $no++; ?></td>
             <td><?= $data['nisn'] ?></td>
             <td><?= $data['nama'] ?></td>
             <td><?= $data['nama_kelas'] ?></td>
             <td><?= $data['tahun'] ?></td>
             <td><?= number_format($data['nominal'], 2, ',', '.'); ?></td>
             <td><?= number_format($data['jumlah_bayar'], 2, ',', '.'); ?></td>
             <td><?= $data['tgl_bayar'] ?></td>
             <td><?= $data['nama_petugas'] ?></td>
         </tr>
     <?php } ?>
 </table>