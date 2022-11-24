<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Inventario</h3>
                <div>
                    <input class="search" placeholder="Elemento">

                    <ul class="menuReporte">

                        <li>
                            <a href="#">Reportes ▼</a>
                            <ul class="dropdown">
                                <li><a target="_blank"href="../../controlador/repor.php">Proveedores</a></li>
                                <li><a target="_blank" href="ReporteGrafica.php">Proveedores Confiables</a></li>
                                <li><a href="reporte.php">Elementos</a></li>
                            </ul>
                        </li>
                    </ul>
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