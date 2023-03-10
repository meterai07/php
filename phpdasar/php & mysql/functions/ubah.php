<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$nim = $_GET["NIM"];
$mahasiswa = query("SELECT * FROM mahasiswa where NIM = $nim")[0];

if (isset($_POST["submit"])) {
    if (edit($_POST) === 1) {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = '../index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            margin : 60px auto;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin: 20px;
            font-size: 30px;
        }

        form {
            margin: 0 auto;
            width: 350px;
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
        }

        .mb-3 {
            display: flex;
            flex-direction: column;
        }

        .action-button {
            display: flex;
            justify-content: space-between;
        }

        button {
            max-width: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ubah Data Mahasiswa</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-text" id="NIM" name="NIM" required value="<?= $mahasiswa["NIM"] ?>">
            </div>
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" class="form-text" id="Nama" name="Nama" required value="<?= $mahasiswa["Nama"] ?>">
            </div>
            <div class="mb-3">
                <label for="Jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-text" id="Jurusan" name="Jurusan" required value="<?= $mahasiswa["Jurusan"] ?>">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-text" id="Email" name="Email" value="<?= $mahasiswa["Email"] ?>">
            </div>
            <div class="action-button">
                <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Kembali</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>