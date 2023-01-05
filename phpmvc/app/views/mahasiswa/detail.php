<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $data["mhs"]['NIM']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $data["mhs"]['Nama']; ?></h6>
                    <p class="card-text"><?= $data["mhs"]['Jurusan']; ?></p>
                    <p class="card-text"><?= $data["mhs"]['Email']; ?></p>
                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>