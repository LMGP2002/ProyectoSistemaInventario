<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $nombre=$_POST['nom_usuario'];
    $contra=$_POST['contrasena'];
    $idRol=$_POST['idRol'];
    
    require("../modelo/conexion_usuario.php");

    if(!empty($nombre) and !empty($contra) and !empty($idRol)){
        if(empty($_POST['idE'])){
            $query=$pdo->prepare("INSERT INTO usuario (nom_usuario,contrasena,id_rol) VALUES (:nom,:contra,:idRol)");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contra);
            $query->bindParam(":idRol",$idRol);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE usuario SET nom_usuario=:nom,contra=:contra, id_rol=:idRol WHERE id=:id");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contra);
            $query->bindParam(":idRol",$idRol);
            $query->bindParam(":id",$id);
            $query->execute();
            $pdo=null;
            echo "modificado";
        }
    }else{
        echo "vacio";
    }

}

?>
