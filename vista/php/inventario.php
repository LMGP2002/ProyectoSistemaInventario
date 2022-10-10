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
                            <th>Cod elemento</th>
                            <th>Nom elemento</th>
                            <th>Tip elemento</th>
                            <th>Cant entrada</th>
                            <th>Cant salida</th>
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