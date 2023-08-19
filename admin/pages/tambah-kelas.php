<a href="?url=kelas" class="btn btn-danger btn-icon-text">
    <i class="mdi mdi-keyboard-backspace
"></i> Kembali </a>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Kelas</h4>
            <p class="card-description">Harap perhatikan dengan baik!</p>
            <form method="post" action="?url=proses-tambah-kelas">
                <div class="formm-group mb-2">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" required>
                </div>
                <div class="formm-group mb-2">
                    <label>Kompetensi Keahlian</label>
                    <input type="text" name="kompetensi_keahlian" class="form-control" required>
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