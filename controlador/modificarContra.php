<?php
if(isset($_POST)){
    session_start();
    error_reporting(0);
    $usuario=$_SESSION['usuario'];
    $actualContra=$_POST['actualContra'];
    $newContra=$_POST['newContra'];
    require("../modelo/conexionUsuarios.php");
    
    if(!empty($actualContra) and !empty($newContra)){


        $consulta2=$pdo->prepare("SELECT nom_usuario,contrasena FROM usuario WHERE contrasena=MD5(:actualContra) AND nom_usuario=:usuario");
        $consulta2->bindParam(":usuario",$usuario);
        $consulta2->bindParam(":actualContra",$actualContra);
        $consulta2->execute();
        $resultado2=$consulta2->fetchAll(); 

        if(count($resultado2)==0){
            echo 'incorrecto';
        }else if($resultado2[0]['contrasena']==md5($newContra)){
            echo 'igual';
            
        }else{
            $consulta=$pdo->prepare("UPDATE usuario SET contrasena=MD5(:newContra) WHERE nom_usuario=:usuario AND contrasena=MD5(:actualContra)");
            $consulta->bindParam(":newContra",$newContra);
            $consulta->bindParam(":usuario",$usuario);
            $consulta->bindParam(":actualContra",$actualContra);
            $consulta->execute();
            $resultado=$consulta->fetchAll(); 
            echo 'modificado';
        }
        
        
    }else{
        echo "vacio";
    }

}

?>