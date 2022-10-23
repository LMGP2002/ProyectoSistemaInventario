<?php
$data = file_get_contents("php://input");
require "../modelo/conexion_usuario.php";
$nom_usuario = $_POST['nom_usuario'];
$consulta = $pdo->prepare("SELECT id_usuario FROM usuario WHERE nom_usuario = '$nom_usuario'");
$consulta->execute();
if($consulta !=0){
    echo "repe";
}

?>