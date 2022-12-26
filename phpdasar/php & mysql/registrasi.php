<?php
    require 'functions/functions.php';
    
    if (isset($_POST["register"])) {
        if (registrasi($_POST) > 0) {
            echo "
                <script>
                    alert('User baru berhasil ditambahkan!');
                    document.location.href = 'login.php';
                </script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
                * {
            margin: 0;
            padding: 0;
        }
         
        h1 {
            text-align: center;
            margin: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            width: 350px;
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
        }

        form input {
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
            <div class="mb-3">
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register!</button>
    </form>
</body>
</html>