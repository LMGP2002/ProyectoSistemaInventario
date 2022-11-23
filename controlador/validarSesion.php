<?php

require "../../modelo/conexionUsuarios.php";

    session_start();
    error_reporting(0);
    $user=$_SESSION['usuario'];
    $rol=$_SESSION['rol'];
    if($user==""){
        header("Location:login.php");
        die();
    }



    $consulta=$pdo->prepare("SELECT nom FROM `rol` WHERE id=$rol");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);

    $nameRol=$resultado[0]['nom'];




    

          

?>