<?php
if(isset($_POST)){
    $nit=$_POST['nit'];
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $idCiudad=$_POST['idCiudad'];
    $id=$_POST['idE'];
    require("../modelo/conexion.php");

    if(!empty($nit) and !empty($nombre) and !empty($direccion) and !empty($telefono) and !empty($idCiudad)){


        if(empty($id)){
            $query=$pdo->prepare("INSERT INTO proveedor (nit,nom_prov,direc_prov,tel_prov,id_ciudad) VALUES (:nit,:nom,:dic,:tel,:idCiu)");
            $query->bindParam(":nit",$nit);
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":dic",$direccion);
            $query->bindParam(":tel",$telefono);
            $query->bindParam(":idCiu",$idCiudad);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE elemento SET nombre=:nom, tipo_elemento=:cat, descripcion=:descri, estado=:esta WHERE codigo=:id");
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":cat",$categoria);
            $query->bindParam(":descri",$descripcion);
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