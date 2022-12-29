<?php 
    require '../functions/functions.php';

    $keyword = $_GET["keyword"];

    $query = ("SELECT * FROM mahasiswa WHERE
                NIM LIKE '%$keyword%' OR
                Nama LIKE '%$keyword%' OR
                Jurusan LIKE '%$keyword%' OR
                Email LIKE '%$keyword%'");
    $mahasiswa = query($query);
?>

<table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <td scope="row"><?= $i ?></td>
                        <td>
                            <a href="functions/ubah.php?NIM=<?= $mhs["NIM"] ?>">ubah</a> |
                            <a href="functions/hapus.php?NIM=<?= $mhs["NIM"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">hapus</a>
                        </td>
                        <td><?= $mhs["NIM"] ?></td>
                        <td><?= $mhs["Nama"] ?></td>
                        <td><?= $mhs["Jurusan"] ?></td>
                        <td><?= $mhs["Email"] ?></td>
                        <?php $i++ ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
</table>

