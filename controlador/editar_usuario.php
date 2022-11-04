<?php
require("../modelo/conexionUsuarios.php");

$data = file_get_contents("php://input");
$query = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
$query->bindParam(":id", $data);
$query->execute();
$resultado = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado);


?>