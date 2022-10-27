<?php
if(isset($_POST)){

    $idUsuario=$_POST['id_usuario'];
    $nomUsuario=$_POST['nom_usuario'];
    $contrasena=$_POST['contrasena'];
    $idRol=$_POST['id_rol'];
    require("../modelo/conexion_Usuario.php");
    if(!empty($idUsuario) and !empty($nomUsuario) and !empty($contrasena)and !empty($idRol)){
       
        if(empty($id)){
            $query=$pdo->prepare("INSERT INTO usuario (id_usuario,nom_usuario,contrasena,id_rol) VALUES (:idU,:nonU,:contra,:idR)");
            $query->bindParam(":idU",$idUsuario);
            $query->bindParam(":nonU",$nomUsuario);
            $query->bindParam(":contra",$contrasena);
            $query->bindParam(":idR",$idRol);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE usuario SET id_usuario=:idU, nom_usuario=:nonU, contrasena=:contra, idR=:id_rol WHERE id=:id");
            $query->bindParam(":idU",$idUsuario);
            $query->bindParam(":nonU",$nomUsuario);
            $query->bindParam(":contra",$contrasena);
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