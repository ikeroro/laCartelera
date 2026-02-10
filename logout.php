<?php
    session_start();
    include 'server/conexion.php';
    
    $_SESSION = array(); 
    session_destroy();
    header("Location: index.php");
    exit();
?>