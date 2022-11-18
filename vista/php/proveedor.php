<?php
include("../../controlador/validarSesion.php");
include("../../controlador/validarVistaSeccion.php");
include("layout/header.php");
?>
        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Proveedores</h3>
                <div>
                    <input class="search" placeholder="Proveedor">
                    <button class="add_new" id="show-modal">Añadir proveedor</button>
                </div>
            </div>

            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nit</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Ciudad</th>
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
                    <h2>Añadir ciudad</h2>
                    <form id="form_registro" method="POST">
                        <input type="hidden" name="idE" value="" id="idE">
                        <input type="hidden" name="idCiudad" value="" id="idCiudad">


                        <div class="select-container">

                            <div class="select-box">
                               
                                <div class="options-container">
                                                              
                                </div>

                                <div class="selected">
                                    Seleccione la ciudad
                                </div>
                            </div>
                        </div>

                        <div class="form-element">
                            <label class="label-titulo" for="nit">Nit:</label>
                            <input name="nit" data-nit class="inputN" type="number" id="nit" placeholder="Ingrese el nit">
                        </div>
                        
                        <div class="form-element">
                            <label  class="label-titulo" for="nombre">Nombre:</label>
                            <input  maxlength="50" name="nombre" type="text" id="nombre" placeholder="Ingrese el nombre">
                        </div>
                        
                        <div class="form-element">
                            <label class="label-titulo" for="direccion">Dirección:</label>
                            <input maxlength="50" name="direccion" type="text" id="direccion" placeholder="Ingrese la direccion">
                        </div>
                        
                            
                        <div class="form-element">
                            <label class="label-titulo" for="telefono">Teléfono:</label>
                            <input data-num class="inputN" name="telefono" type="number" id="telefono" placeholder="Ingrese el teléfono">
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
    <script src="../js/crud_proveedor.js"></script>
    
<?php

include("layout/footer.php");
?>