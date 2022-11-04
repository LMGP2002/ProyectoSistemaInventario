<?php
require("../modelo/conexion_usuario.php");

$data = file_get_contents("php://input");
$query = $pdo->prepare("DELETE FROM usuario where usuario.id_usuario=:id");
$query->bindParam(":id",$data);
$query->execute();
echo "ok";

?>