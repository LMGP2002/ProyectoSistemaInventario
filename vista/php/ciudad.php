<?php
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Ciudades</h3>
                <div>
                    <input class="search" placeholder="Ciudad">
                    <button class="add_new" id="show-modal">Añadir ciudades</button>
                </div>
            </div>

            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
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
                                                
                        <div class="form-element">
                            <label class="label-titulo" for="nombre">Nombre:</label>
                            <input maxlength="20" name="nombre" type="text" id="nombre" placeholder="Ingrese el nombre">
                        </div>
                            
                        <div class="form-element">
                            <button id="btnregistrar" name="btnregistrar" type="button">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
  
    </main>
    <!----======== ciudad ======== -->
    <script src="../js/crud_ciudad.js"></script>
<?php

include("layout/footer.php");
?>