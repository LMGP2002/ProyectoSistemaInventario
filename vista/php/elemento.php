<?php
include("../../controlador/validarSesion.php");
include("../../controlador/validarVistaSeccion.php");
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Elementos</h3>
                <div>
                    <input class="search" placeholder="Elemento">
                    <button style="display:none;" class="add_new" id="show-modal">Añadir elemento</button>
                </div>
            </div>

            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th data-acciones>Acciones</th>
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
                    <h2>Añadir elemento</h2>
                    <form id="form_registro" method="POST">
                        <input type="hidden" name="idE" value="" id="idE">
                        <label data-ocultar class="label-titulo ocultar" for="activo">Estado:</label>
                        <div data-ocultar class="form-element radio ocultar">
                            <input checked name="estado" type="radio" id="activo" value="Activo">
                            <label class="label" for="activo">Activo</label>
                            <input name="estado" type="radio" id="inactivo" value="Inactivo">
                            <label class="label" for="inactivo">Inactivo</label>
                        </div>
                        
                        <div class="form-element">
                            <label class="label-titulo" for="nombre">Nombre:</label>
                            <input maxlength="50" name="nombre" type="text" id="nombre" placeholder="Ingrese el nombre">
                        </div>
                        <label class="label-titulo" for="activo">Categoria:</label>
                        <div class="form-element radio">
                            <input checked name="categoria" type="radio" id="producto" value="Producto">
                            <label class="label" for="producto">Producto</label>
                            <input name="categoria" type="radio" id="insumo" value="Insumo">
                            <label class="label" for="insumo">Insumo</label>
                        </div>
                        <div class="form-element">
                            <label class="label-titulo" for="descripcion">Descripción:</label>
                            <textarea maxlength="100" class="textarea" placeholder="Ingrese la descripción" name="descripcion" id="descripcion"></textarea>
                        </div>
                        
                        <div class="form-element">
                            <button id="btnregistrar" name="btnregistrar" type="button">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <a href="../../controlador/logout.php" class="logoutBtn"></a>
  
    </main>

    <!----======== elemento ======== -->
    <script src="../js/crud_elemento.js"></script>
    
<?php

include("layout/footer.php");
?>