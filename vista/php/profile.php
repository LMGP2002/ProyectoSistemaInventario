<?php
    session_start();
    error_reporting(0);
    $user=$_SESSION['usuario'];
    $rol=$_SESSION['rol'];

    require "../modelo/conexionUsuarios.php";

    $consulta=$pdo->prepare("SELECT nom FROM rol WHERE id_rol=:id");
    $consulta->bindParam(":id",$rol);
    $consulta->execute();
    $resultado=$consulta->fetchAll(); 

    $resultado[0]['nom'];

    echo $resultado;


    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Perfil</title>
</head>
<body>
    <div class="card">

        <div class="imgBx">

            <img src="../assets/gerente.png" alt="profile">

        </div>
        <div class="content">
            <div class="details">
                <h2 class="profileUser"><?php
            echo $user;
        ?><br><span>Administrador</span></h2>
                <div class="actionBtn">
                    <button>Administrar contraseña</button>
                </div>
            </div>
        </div>

    </div>
    <a href="../../controlador/logout.php" class="logoutBtn"></a>
</body>
</html>