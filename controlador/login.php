<?php

    require "../modelo/conexionUsuarios.php";

    if(isset($_POST['username']) and isset($_POST['password'])){
        $usuario=trim($_POST['username']);
        $pass=md5($_POST['password']);
        $consulta=$pdo->prepare("SELECT nom_usuario,contrasena,id_rol FROM usuario WHERE nom_usuario=BINARY'$usuario' AND contrasena=BINARY'$pass'");
        $consulta->execute();
        $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    
    }


    if(count($resultado)!=0){
        session_start();
        $_SESSION['usuario']=$usuario;
        $_SESSION['rol']=$resultado[0]['id_rol'];
    }

    echo count($resultado);


    
?>