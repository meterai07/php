<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions/functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["cari"])) {
    $tempQuery = cari($_POST["keyword"]);

    if ($tempQuery == null) {
        echo "<script>
                alert('Data tidak ditemukan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        $mahasiswa = $tempQuery;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 20px;
        }

        header {
            display: flex;
            gap: 10px;
        }

        header form,
        header a {
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 5px black;
        }

        header input {
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        header input:focus {
            outline: none;
        }

        header button {
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
        }

        header button:hover {
            transition: 0.5s;
        }

        header button.add:hover {
            background-color: green;
            color: white;
        }

        header button.logout:hover {
            background-color: red;
            color: white;
        }

    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <header>
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
        </form>
        <a href="functions/tambah.php"><button type="submit" name="submit" class="add">Tambah Data Mahasiswa</button></a>
        <a href="logout.php"><button type="submit" name="submit" class="logout">Logout</button></a>
    </header>
    <table class="table">
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>