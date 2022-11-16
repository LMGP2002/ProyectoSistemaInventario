<?php

require "../modelo/conexionUsuarios.php";

session_start();
error_reporting(0);
$rol=$_SESSION['rol'];

$consulta=$pdo->prepare("SELECT visibilidad,seccion,interactuar,registrar FROM permiso WHERE id_rol=$rol");
$consulta->execute();
$resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    

echo json_encode($resultado);
   
      
  
