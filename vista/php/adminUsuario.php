<div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Usuarios</h3>
                <div>
                    <button id="show-modal-perfil" class="add_new admUser">Administrar perfil</button>
                    <input class="search" placeholder="Usuario">
                    <button class="add_new" id="show-modal">Añadir usuarios</button>
                </div>
            </div>

            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody id="table_body">
                    </tbody>           
                </table>
            </div>
        </div>
        
        <div class="modal-container">
            <div class="modal">
                <div class="close-btn">&times;</div>
                <div class="form">
                    <h2>Añadir usuario</h2>
                    <form id="form_registro" method="POST">
                        <input type="hidden" name="idE" value="" id="idE">
                        <input type="hidden" name="id_rol" value="" id="id_rol">
                                                
                        <div class="form-element">
                            <label class="label-titulo" for="nom_usuario">Usuario</label>
                            <input maxlength="20" name="nom_usuario" type="text" id="nom_usuario" placeholder="Ingrese el usuario">
                        </div>

                        <div class="form-element">
                            <label class="label-titulo" for="contrasena">Contraseña:</label>
                            <input maxlength="20" name="contrasena" type="password" id="contrasena" placeholder="Ingrese la contraseña">
                        </div>
                    
                        <div class="select-container">
                            <div class="select-box">
                                <div class="options-container">                          
                                </div>
                                <div class="selected">
                                    Seleccione el rol
                                </div>
                            </div>
                        </div>
                            


                        <div class="form-element">
                            <button id="btnregistrar"value="btnregistrar" name="btnregistrar" type="button">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>




        <div class="modal-perfil">
                <div class="card">
    
                    <div class="imgBx">
    
                        <img src="../assets/<?php echo $nameRol;?>.png" alt="profile">
    
                    </div>
                    <div class="content">
                        
                        <div class="details">
                            <h2 data-user='<?php echo $user;?>' class="profileUser"><?php echo $user;?><br><span><?php echo $nameRol;?></span></h2>
                            <div class="actionBtn">
                                <button id="modificarContraseña">Modificar contraseña</button>
                            </div>
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
    <!----======== usuario ======== -->
    <script src="../js/crud_usuario.js"></script>
    <script src="../js/modificarContra.js"></script>

    
