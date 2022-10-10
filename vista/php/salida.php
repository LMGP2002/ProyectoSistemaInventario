<?php
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Salidas</h3>
                <div>
                    <input class="search" placeholder="Fecha">
                    <button class="add_new" id="show-modal">Añadir salida</button>
                </div>
            </div>

            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Elemento</th>
                            <th>Cantidad</th>
                            <th>Precio de venta</th>
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
                    <h2>Añadir salida</h2>
                    <form id="form_registro" method="POST">
                        <input type="hidden" name="idE" value="" id="idE">
                        <input type="hidden" name="idElemento" value="" id="idElemento">
                        
                        <div  class="select-container">
                            <div class="select-box">
                                <div data-elemento-container class="options-container">
                                                              
                                </div>

                                <div data-elemento-selected class="selected">
                                    Seleccione el elemento
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-element">
                                <label class="label-titulo" for="fecha">Fecha:</label>
                                <input max="2030-12-31" name="fecha" type="date" id="fecha">
                        </div>
                        <div class="form-element">
                            <label class="label-titulo" for="cantidad">Cantidad:</label>
                            <input data-cant class="inputN" name="cantidad" type="number" id="cantidad" placeholder="Ingrese la cantidad de ingreso">
                        </div>
                        <div class="form-element">
                            <label class="label-titulo" for="precio">Precio de venta:</label>
                            <input data-prec class="inputN" name="precio" type="number" id="precio" placeholder="Ingrese el precio de compra">
                        </div>
                        
                        <div class="form-element">
                            <button id="btnregistrar" name="btnregistrar" type="button">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
  
    </main>

    <!----======== elemento ======== -->
    <script src="../js/crud_salida.js"></script>
    
<?php

include("layout/footer.php");
?>