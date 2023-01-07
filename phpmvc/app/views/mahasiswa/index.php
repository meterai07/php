<div class="container">

  <div class="row">
    <div class="col-lg-6">
      <?= Flasher::flash() ?>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Mahasiswa
      </button>
      <h1>Data Mahasiswa</h1>
      <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs) : ?>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <?= $mhs['Nama'] ?>
                <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['NIM'] ?>" class="badge text-bg-primary">details</a>
              </li>
            <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="input-group mb-3">
            <label class="input-group-text" for="jurusan">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
              <option selected>Choose...</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
          </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
    </div>
  </div>
</div>