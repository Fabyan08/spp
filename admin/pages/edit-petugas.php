<?php
$id_petugas = $_GET['id_petugas'];
include '../koneksi.php';
$sql = "SELECT * FROM petugas  WHERE id_petugas='$id_petugas'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<a href="?url=petugas" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Petugas</h4>
            <form method="post" action="?url=proses-edit-petugas&id_petugas<?= $id_petugas; ?>">
                <input type="hidden" name="id_petugas" value="<?= $id_petugas ?>">
                <div class="formm-group mb-2">
                    <label>Username</label>
                    <input value="<?= $data['username'] ?>" type="text" name="username" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Password</label>
                    <input value="<?= $data['password'] ?>" type="text" name="password" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Nama Petugas</label>
                    <input value="<?= $data['nama_petugas'] ?>" type="text" name="nama_petugas" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Level Petugas</label>
                    <select name="level" class="form-control" required>
                        <option value="<?= $data['level'] ?>"> <?= $data['level'] ?> </option>
                        <option value="admin"> Admin </option>
                        <option value="petugas"> Petugas </option>
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