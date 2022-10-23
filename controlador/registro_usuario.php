<?php
$data = file_get_contents("php://input");
if(isset($_POST)){
    $nom_usuario = $_POST['nom_usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    require("../modelo/conexion_usuario.php");

    
    if(!empty($nom_usuario) && $nom_usuario != "" && $contrasena != "" && $rol != "" ){
    if(empty($_POST['id_us']) ){
        $query = $pdo->prepare("INSERT INTO usuario (nom_usuario,contrasena,rol) VALUES (:nom, :con, :ro)");
        $query->bindParam(":nom", $nom_usuario);
        $query->bindParam(":con", $contrasena);
        $query->bindParam(":ro", $rol);
        $query->execute();
        $pdo = null;
        echo "ok";
    }else{
        $id_usuario = $_POST['id_us'];
        $query = $pdo->prepare("UPDATE usuario SET nom_usuario = :nom, contrasena = :con, rol = :ro wHERE id_usuario = :id ");
        $query->bindParam(":nom", $nom_usuario);
        $query->bindParam(":con", $contrasena);
        $query->bindParam(":ro", $rol);
        $query->bindParam(":id", $id_usuario);
        $query->execute();
        $pdo = null;
        echo "modificado";
    }

}else {
    echo "vacio";
}

}
?>