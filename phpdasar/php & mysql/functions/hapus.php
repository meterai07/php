<?php
require 'functions.php';

if (delete($_GET["NIM"]) === 1) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = '../index.php';
        </script>
        ";
}
