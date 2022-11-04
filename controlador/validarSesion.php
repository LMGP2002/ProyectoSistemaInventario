<?php
    session_start();
    error_reporting(0);
    $user=$_SESSION['usuario'];
    if($user==""){
        header("Location:login.php");
        die();
    }

?>