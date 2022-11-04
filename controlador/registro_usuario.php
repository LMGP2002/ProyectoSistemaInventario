<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $nombre=$_POST['nom_usuario'];
    $contra=md5($_POST['contrasena']);
    $idRol=$_POST['id_rol'];
    require("../modelo/conexionUsuarios.php");

    if(!empty($nombre) and !empty($contra) and !empty($idRol)){


        
        if(empty($id)){
            $query=$pdo->prepare("INSERT INTO usuario (nom_usuario,contrasena,id_rol) VALUES (:nom,:contra,:idR)");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contra);
            $query->bindParam(":idR",$idRol);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE usuario SET nom_usuario=:nom,contra=:contra, id_rol=:idRol WHERE idE=:id");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contra);
            $query->bindParam(":idR",$idRol);
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
