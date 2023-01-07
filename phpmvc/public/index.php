<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once '../app/init.php';

    $app = new App;
    
?>