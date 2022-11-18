<?php

require "../../modelo/conexionUsuarios.php";

session_start();
error_reporting(0);
$rol=$_SESSION['rol'];
$nomSeccion=$nomSeccion=str_replace('.php','',basename($_SERVER['PHP_SELF']));

$consulta=$pdo->prepare("SELECT visibilidad FROM permiso WHERE id_rol=:id AND seccion=:nom");
$consulta->bindParam(":id",$rol);
$consulta->bindParam(":nom",$nomSeccion);
$consulta->execute();
$resultado=$consulta->fetchAll(); 

if ($resultado[0]['visibilidad']=='false'){
    header("Location:index.php");
    die();
};