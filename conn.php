<?php 
    session_start();
    $db = new mysqli ('localhost','root','','perez');
    if ($db->connect_error) {
        echo "Database connection failed ". $db->connect_error;
    }
?>