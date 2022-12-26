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
