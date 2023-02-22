<?php
$id_kelas = $_GET['id_kelas'];
include '../koneksi.php';
$sql = "SELECT * FROM kelas  WHERE id_kelas='$id_kelas'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<a href="?url=kelas" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Kelas</h4>
            <form method="post" action="?url=proses-edit-kelas&id_kelas=<?= $id_kelas; ?>">
                <div class="formm-group mb-2">
                    <label>Nama Kelas</label>
                    <input value="<?= $data['nama_kelas'] ?>" type="text" name="nama_kelas" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Kompetensi Keahlian</label>
                    <input value="<?= $data['kompetensi_keahlian'] ?>" type="text" name="kompetensi_keahlian" class="form-control" required>
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