<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");
?>
<div class="table">
            <div class="table_header">
                <h3 class="title" data-dark>Reportes</h3>
            
            </div>
            <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Proveedores</th>
                            <th>Productos</th>
                        </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <th><a  href="repor.php" target="_blank"><img src="../assets/pdf.png" /></a></th>
                        <th><a  href="repor.php" target="_blank"><img src="../assets/pdf.png" /></a></th>
                    </tr>
                    </tbody>           
                </table>
            </div>
        <a href="../../controlador/logout.php" class="logoutBtn"></a>
  
    </main>
    
    
<?php

include("layout/footer.php");
?>