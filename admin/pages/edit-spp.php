<?php
$id_spp = $_GET['id_spp'];
include '../koneksi.php';
$sql = "SELECT * FROM spp  WHERE id_spp='$id_spp'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<a href="?url=spp" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit SPP</h4>
            <form method="post" action="?url=proses-edit-spp&id_spp=<?= $id_spp; ?>">
                <div class="formm-group mb-2">
                    <label>Tahun</label>
                    <input value="<?= $data['tahun'] ?>" type="number" name="tahun" maxlength="4" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Nominal</label>
                    <input value="<?= $data['nominal'] ?>" type="number" name="nominal" maxlength="13" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                        <i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>