<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $nombre=$_POST['nom_usuario'];
    $contra=$_POST['contrasena'];
    $idRol=$_POST['idRol'];
    
    require("../modelo/conexion_usuario.php");

    if(!empty($nombre) and !empty($contra) and !empty($idRol)){
        if(empty($nombre)){
            $query=$pdo->prepare("INSERT INTO usuario (nom_usuario,contrasen,id_rol) VALUES (:nom,:contra,:idRol)");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contra);
            $query->bindParam(":idRol",$idRol);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE usuario SET id_usuario=:idUs,nom_usuario=:nom,contrasena=:contra, id_rol=:idRol WHERE id_usuario=:id");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contrasena);
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
