<?php
include("layout/inclLogin.php");
?>

    <div class="modal-container">
            <div class="modal">
    
                <div class="form">
                    <h2>Iniciar sesión</h2>
                    <form id="form_registro" method="POST">
                                                
                        <div class="form-element">
                            <label class="label-titulo" for="usuario">Usuario</label>
                            <input maxlength="20" name="usuario" type="text" id="usuario" placeholder="Ingrese su usuario">
                        </div>
                        <div class="form-element">
                            <label class="label-titulo" for="contraseña">contraseña</label>
                            <input type="password" name="contraseña" id="contraseña"  placeholder="Ingrese su contraseña" required >
                        </div>
                            
                        <div class="form-element">
                            <button id="btnregistrar" name="btnregistrar" type="button">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
