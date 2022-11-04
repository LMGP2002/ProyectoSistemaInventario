<?php
    session_start();
    error_reporting(0);
    $user=$_SESSION['usuario'];
    echo $user;
?>