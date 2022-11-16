<?php
    session_start();
    error_reporting(0);
    $user=$_SESSION['usuario'];
    $rol=$_SESSION['rol'];
    
    $usuario = new stdClass();
    $usuario->usuario = $user;
    $usuario->rol = $rol;
    $usuario;


    echo json_encode($usuario);
?>