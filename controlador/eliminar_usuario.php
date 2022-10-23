<?php
$data = file_get_contents("php://input");
require "../modelo/conexion_usuario.php";
$query = $pdo->prepare("DELETE FROM usuario where id_usuario = :id");
$query->bindParam(":id",$data);
$query->execute();
echo "ok";

?>