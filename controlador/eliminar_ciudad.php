<?php
    require "../modelo/conexion.php";

    $data=file_get_contents("php://input");
    $query=$pdo->prepare("DELETE FROM ciudad WHERE id_ciudad=:id");
    $query->bindParam(":id",$data);
    $query->execute();
    echo "ok";
?>
