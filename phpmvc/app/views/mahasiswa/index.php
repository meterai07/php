<div class="container">
  <div class="row">
    <div class="col-6">
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