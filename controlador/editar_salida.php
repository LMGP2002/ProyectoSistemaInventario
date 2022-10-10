<?php
    require "../modelo/conexion.php";

    $data=file_get_contents("php://input");

    $query=$pdo->prepare("SELECT * FROM salida WHERE id_salida=:id");
    $query->bindParam(":id",$data);
    $query->execute();
    $resultado=$query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>
