<?php 
    session_start();
    session_destroy();
    unset($_SESSION['uid']);
    header('location: index.php');
?>

