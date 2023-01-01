<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions/functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table class="table" id="table" border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Email</th>
            </tr>
        </thead>';

    $i = 1;
    foreach ($mahasiswa as $row ) {
        $html .= '
            <tbody>
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row["NIM"] . '</td>
                    <td>' . $row["Nama"] . '</td>
                    <td>' . $row["Jurusan"] . '</td>
                    <td>' . $row["Email"] . '</td>
                </tr>
            </tbody>
            ';
    }

$html .= '</table>
</body>
</html>
';

$mpdf->WriteHTML($html);

// I = inline, D = download 
// I same with \Mpdf\Output\Destination::INLINE
// INLINE = open in browser

// D same with \Mpdf\Output\Destination::DOWNLOAD
// DOWNLOAD = download file
$mpdf->Output('daftar-mahasiswa.pdf', 'I'); 

?>
