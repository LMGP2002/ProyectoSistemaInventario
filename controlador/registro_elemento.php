<?php
if(isset($_POST)){
    $nombre=$_POST['nombre'];
    $categoria=$_POST['categoria'];
    $descripcion=$_POST['descripcion'];
    $estado=$_POST['estado'];
    $id=$_POST['idE'];
    require("../modelo/conexion.php");

    if(!empty($nombre) and !empty($categoria) and !empty($descripcion)){


        if(empty($_POST['idE'])){
            $query=$pdo->prepare("INSERT INTO elemento (nombre,tipo_elemento,descripcion) VALUES (:nom,:cat,:descri)");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":cat",$categoria);
            $query->bindParam(":descri",$descripcion);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE elemento SET nombre=:nom, tipo_elemento=:cat, descripcion=:descri, estado=:esta WHERE codigo=:id");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":cat",$categoria);
            $query->bindParam(":descri",$descripcion);
            $query->bindParam(":esta",$estado);
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