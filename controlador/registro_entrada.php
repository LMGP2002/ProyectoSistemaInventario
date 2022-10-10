<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $idCiudad=$_POST['idCiudad'];
    $idElemento=$_POST['idElemento'];
    $fecha=$_POST['fecha'];
    $cantidad=$_POST['cantidad'];
    require("../modelo/conexion.php");

    if(!empty($idCiudad) and !empty($idElemento) and !empty($fecha) and !empty($cantidad)){


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
            $query=$pdo->prepare("UPDATE proveedor SET nit=:nit, nom_prov=:nom, direc_prov=:dic, tel_prov=:tel, id_ciudad=:idCiu WHERE id=:id");
            $query->bindParam(":nit",$nit);
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":dic",$direccion);
            $query->bindParam(":tel",$telefono);
            $query->bindParam(":idCiu",$idCiudad);
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