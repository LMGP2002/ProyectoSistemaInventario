
    <h1 class="titlePerfil">Administrar perfil</h1>
    <div class="card">

        <div class="imgBx">

            <img src="../assets/<?php echo $nameRol;?>.png" alt="profile">

        </div>
        <div class="content">
            <div class="details">
                <h2 class="profileUser"><?php echo $user;?><br><span><?php echo $nameRol;?></span></h2>
                <div class="actionBtn">
                    <button id="modificarContraseña">Modificar contraseña</button>
                </div>
            </div>
        </div>

    </div>


    <div class="modal-contra">
        <div class="modal">
                <div class="close-btn-contra">&times;</div>
                <div class="form">
                    <h2>Modificar contraseña</h2>
                    <form id="form_contra" method="POST">
                        <div class="form-element">
                            <label class="label-titulo" for="actualContra">Contraseña actual</label>
                            <input maxlength="32" name="actualContra" id="actualContra" type="password" placeholder="Ingrese la contraseña actual">
                        </div>

                        <div class="form-element">
                            <label class="label-titulo" for="newContra">Contraseña:</label>
                            <input maxlength="32" name="newContra" id="newContra" type="password" placeholder="Ingrese la nueva contraseña">
                        </div>

                        <div class="form-element">
                            <button id="btnModContra" name="btnModContra" type="button">Modificar</button>
                        </div>

                    </form>
                </div>
            </div>
                
        </div>



    <a href="../../controlador/logout.php" class="logoutBtn"></a>
</main>
    <script src="../js/profile.js"></script>
    <script src="../js/modificarContra.js"></script>
