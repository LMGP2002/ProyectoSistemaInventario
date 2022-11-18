<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Inventario</h3>
                <div>
                    <input class="search" placeholder="Elemento">
                    <a href="reporte.php"><input class="btn btn-danger mt-5 mr-5 float-right" type="button" value="Reportes"></a>
                </div>
            </div>

            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Código elemento</th>
                            <th>Nombre elemento</th>
                            <th>Tipo elemento</th>
                            <th>Cantidad entrada</th>
                            <th>Cantidad salida</th>
                            <th>Stock</th>
                        </tr>
                    </thead>

                    <tbody id="table_body">

                   
                    </tbody>

                   

                </table>
            </div>
        </div>
        <a href="../../controlador/logout.php" class="logoutBtn"></a>
        
    </main>

    <!----======== elemento ======== -->
    <script src="../js/crud_inventario.js"></script>
    
<?php

include("layout/footer.php");
?>