<div class="container">
  <h1>Data Mahasiswa</h1>
  
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">NIM</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($data['mhs'] as $mhs) : ?>
      <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $mhs['Nama']; ?></td>
        <td><?= $mhs['NIM']; ?></td>
        <td><?= $mhs['Jurusan']; ?></td>
        <td><?= $mhs['Email']; ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>