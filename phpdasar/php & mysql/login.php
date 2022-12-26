<?php
    require 'functions/functions.php';

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION["login"] = true;
            echo "
                    <script>
                        alert('Login Berhasil');
                        document.location.href = 'index.php';
                    </script>
                ";
                exit;
            }
        }

        $error = true;
    }

    if (isset($error)) {
        echo "
            <script>
                alert('Username atau Password Salah');
            </script>
        ";
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
    </style>
</head>
<body>
    <h1>Halaman Login</h1>
    <form action="" method="post">
            <div class="mb-3">
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login!</button>
    </form>
</body>
</html>    