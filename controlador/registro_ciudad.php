<?php
if(isset($_POST)){
    $nombre=$_POST['nombre'];
    $id=$_POST['idE'];
    require("../modelo/conexion.php");

    if(!empty($nombre)){
        if(empty($_POST['idE'])){
            $query=$pdo->prepare("INSERT INTO ciudad (nom_ciu) VALUES (:nom)");
            $query->bindParam(":nom",$nombre);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE ciudad SET nom_ciu=:nom WHERE id_ciudad=:id");
            $query->bindParam(":nom",$nombre);
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