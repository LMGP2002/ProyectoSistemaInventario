<?php
include("layout/header.php");
?>

        <div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Inventario</h3>
                <div>
                    <input class="search" placeholder="Inventario">
                    
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
        
    </main>

    <!----======== elemento ======== -->
    <script src="../js/crud_inventario.js"></script>
    
<?php

include("layout/footer.php");
?>