<?php
$nisn = $_GET['nisn'];
$kekurangan = $_GET['kekurangan'];
include '../koneksi.php';
$sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
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
                    <input type="date" name="tgl_bayar" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Bulan Bayar</label>
                    <select name="" bulan_dibayar class="form-control" required>
                        <option value=""> Pilih Bulan Bayar</option>
                        <option value="januari">januari</option>
                        <option value="februari">februari</option>
                        <option value="maret">maret</option>
                        <option value="april">april</option>
                        <option value="mei">mei</option>
                        <option value="juni">juni</option>
                        <option value="juli">juli</option>
                        <option value="agustus">agustus</option>
                        <option value="september">september</option>
                        <option value="oktober">oktober</option>
                        <option value="november">november</option>
                        <option value="desember">desember</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Tahun Bayar</label>
                    <select name="tahun_bayar" class="form-control" required>
                        <option value=""> Pilih tahun Bayar</option>
                        <?php
                        for ($i = 2010; $i <= date('Y'); $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="formm-group mb-2">
                    <label>jumlah Bayar (Jumlah yang harus di bayar adalah <b><?= number_format($kekurangan, 2, ',', '.') ?></b>)</label>
                    <input type="number" name="jumlah_bayar" max="<?= $kekurangan; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                        <i class="mdi mdi-upload btn-icon-prepend"></i> Simpan </button>
                    <button type="reset" class="btn btn-gradient-danger btn-icon-text">
                        <i class="mdi mdi-reload btn-icon-prepend"></i> Kosongkan </button>
                </div>
            </form>
        </div>
    </div>
</div>