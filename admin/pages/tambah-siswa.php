<a href="?url=siswa" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data SISWA</h4>
            <p class="card-description">Harap perhatikan dengan baik!</p>
            <form method="post" action="?url=proses-tambah-siswa">
                <div class="form-group mb-2">
                    <label>NISN</label>
                    <input type="number" name="nisn" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>NIS</label>
                    <input type="number" name="nis" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                        include '../koneksi.php';
                        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                        foreach ($kelas as $data_kelas) {
                        ?>
                            <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-2">
                    <label>No Telp</label>
                    <input type="number" name="no_telp" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>SPP</label>
                    <select name="id_spp" class="form-control" required>
                        <option value="">Pilih SPP</option>
                        <?php
                        include '../koneksi.php';
                        $spp = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY id_spp ASC");
                        foreach ($spp as $data_spp) {
                        ?>
                            <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'], 2, ',', '.'); ?> </option>
                        <?php } ?>
                    </select>
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

