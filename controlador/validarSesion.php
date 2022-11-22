<?php
    session_start();
    error_reporting(0);
    $user=$_SESSION['usuario'];
    $rol=$_SESSION['rol'];
    if($user==""){
        header("Location:login.php");
        die();
    }

    

          

?>