<?php
$conn = mysqli_connect("localhost", "root", "", "university");
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <table>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>
        <?php $i = 1 ?>
        <?php while ($mhs = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="">ubah</a> |
                    <a href="">hapus</a>
                </td>
                <td><?= $mhs["NIM"] ?></td>
                <td><?= $mhs["Nama"] ?></td>
                <td><?= $mhs["Jurusan"] ?></td>
                <td><?= $mhs["Email"] ?></td>
                <?php $i++ ?>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>