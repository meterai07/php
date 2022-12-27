<?php
$conn = mysqli_connect("localhost", "root", "", "university");

function query($query)
{
    $result = mysqli_query($GLOBALS['conn'], $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

function add($data)
{
    global $conn;

    $nim = htmlspecialchars($data["NIM"]);
    $nama = htmlspecialchars($data["Nama"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $email = filter_var(($data["Email"]), FILTER_VALIDATE_EMAIL);

    $query = ("INSERT INTO mahasiswa VALUES ('$nim','$nama','$jurusan','$email')");
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($nim)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE NIM = $nim");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $nim = htmlspecialchars($data["NIM"]);
    $nama = htmlspecialchars($data["Nama"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $email = filter_var(($data["Email"]), FILTER_VALIDATE_EMAIL);

    $query = ("UPDATE mahasiswa SET Nama = '$nama', Jurusan = '$jurusan', Email = '$email' WHERE NIM = '$nim'");

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari ($data)
{
    $query = "SELECT * FROM mahasiswa WHERE Nama LIKE '%$data%' OR NIM LIKE '%$data%' OR Jurusan LIKE '%$data%' OR Email LIKE '%$data%'";
    return query($query);
}

function registrasi ($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if (empty($username) || empty($password) || empty($password2)) {
        echo "<script>
            alert('Username / Password tidak boleh kosong');
        </script>";
        return false;
    }

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);
}
