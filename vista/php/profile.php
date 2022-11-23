
    <h1 class="titlePerfil">Administrar perfil</h1>
    <div class="card">

        <div class="imgBx">

            <img src="../assets/<?php echo $nameRol;?>.png" alt="profile">

        </div>
        <div class="content">
            <div class="details">
                <h2 class="profileUser"><?php echo $user;?><br><span><?php echo $nameRol;?></span></h2>
                <div class="actionBtn">
                    <button>Modificar contraseña</button>
                </div>
            </div>
        </div>

    </div>
    <a href="../../controlador/logout.php" class="logoutBtn"></a>
</main>
    <script src="../js/profile.js"></script>
