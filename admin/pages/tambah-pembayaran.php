<?php
$nisn = $_GET['nisn'];
$kekurangan = $_GET['kekurangan'];
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];

// echo $perbulan;
include '../koneksi.php';
$sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'";


$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$perbulan = $data['nominal'] / 12;


?>
<a href="?url=pembayaran" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pembayaran</h4>
            <p class="card-description">Harap perhatikan dengan baik!</p>
            <form method="post" action="?url=proses-tambah-pembayaran&nisn=<?= $nisn; ?>">
                <input name="id_spp" value="<?= $data['id_spp'] ?>" type="hidden" class="form-control" required>
                <div class="formm-group mb-2">
                    <label>Nama Petugas</label>
                    <input value="<?= $_SESSION['nama_petugas'] ?>" disabled class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>NISN</label>
                    <input readonly name="nisn" value="<?= $data['nisn'] ?>" type="text" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Nama Siswa</label>
                    <input disabled value="<?= $data['nama'] ?>" type="text" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Tanggal bayar</label>
                    <input type="date" readonly value="<?php echo date('Y-m-d') ?>" name="tgl_bayar" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Bulan Bayar</label>
                    <input type="text" name="bulan_bayar" class="form-control" readonly value="<?= $bulan; ?>">
                </div>
                <div class="form-group mb-2">
                    <label>Tahun Bayar</label>
                    <input type="text" name="tahun_bayar" class="form-control" readonly value="<?= $tahun; ?>">
                </div>
                <div class="formm-group mb-2">
                    <label>jumlah Bayar (Jumlah yang harus di bayar adalah <b><?= number_format($perbulan, 2, ',', '.') ?></b>)</label>
                    <input type="number" readonly value="<?= $perbulan; ?>" name="jumlah_bayar" max="<?= $kekurangan; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                        <i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan </button>

                </div>
            </form>
        </div>
    </div>
</div>