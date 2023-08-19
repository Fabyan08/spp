<a href="?url=petugas" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Petugas</h4>
            <p class="card-description">Harap perhatikan dengan baik!</p>
            <form method="post" action="?url=proses-tambah-petugas">
                <div class="formm-group mb-2">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Nama Petugas</label>
                    <input type="text" name="nama_petugas" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Level Petugas</label>
                    <select name="level" class="form-control" required>
                        <option value=""> Pilih Level Petugas </option>
                        <option value="admin"> Admin </option>
                        <option value="petugas"> Petugas </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                        <i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan </button>
                    <button type="reset" class="btn btn-gradient-danger btn-icon-text">
                        <i class="mdi mdi-reload btn-icon-prepend"></i> Kosongkan </button>
                </div>
            </form>
        </div>
    </div>
</div>