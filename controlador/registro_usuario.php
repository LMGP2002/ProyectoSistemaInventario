<?php
if(isset($_POST)){
    $nombre=$_POST['nom_usuario'];
    $contrasena=$_POST['contrasena'];
    $idRol=$_POST['id_rol'];
    $id=$_POST['idE'];
    require("../modelo/conexion_usuario.php");

    if(!empty($id) and !empty($nombre) and !empty($contrasena) and !empty($idRol)){


        if(empty($id)){
            $query=$pdo->prepare("INSERT INTO usuario (id_usuario,nom_usuario,contrasena,id_rol) VALUES (:idUs,:nom,:contra,:idRol)");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":contra",$contrasena);
            $query->bindParam(":idRol",$idRol);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE usuario SET id_usuario=:idUs,nom_usuario=:nom,contrasena=:contra, id_rol=:idRol WHERE id=:id_usuario");
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
