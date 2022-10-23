<?php
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Usuarios</h3>
                <div>
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
                            <th>Acciones</th>
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
                        <input type="hidden" name="id_us" value="" id="id_us">
                                                
                        <div class="form-element">
                            <label class="label-titulo" for="nombre">Nombre:</label>
                            <input maxlength="20" name="nom_usuario" type="text" id="nom_usuario" placeholder="Ingrese el nombre">
                        </div>

                        <div class="form-element">
                            <label class="label-titulo" for="nombre">Contraseña:</label>
                            <input maxlength="20" name="contrasena" type="password" id="contrasena" placeholder="Ingrese la contraseña">
                        </div>
                            
                        <label class="label-titulo" for="activo">Rol:</label>
                        <div class="form-element radio">
                            <input checked name="rol" type="radio" id="administrador" value="Administrador">
                            <label class="label" for="administrador">Administrador</label>
                            <input name="rol" type="radio" id="cajero" value="Cajero">
                            <label class="label" for="cajero">Cajero</label>
                        </div>
                            


                        <div class="form-element">
                            <button id="btnregistrar"value="btnregistrar" name="btnregistrar" type="button">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
  
    </main>
    <!----======== usuario ======== -->
    <script src="../js/crud_usuario.js"></script>
<?php

include("layout/footer.php");
?>