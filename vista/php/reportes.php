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
                        <th><form action="reporProduc.php"  method="POST"> 
        <div class="row">
            <div class="col-md-3">
                 <div class="form-group">
                    <label for="min"data-dark>Desde</label>
                    <input type ="date" value="<?php echo date('y-m-d');?>" name ="desde" id="desde">
                 </div>
             </div>  
             <div class="col-md-3">
                 <div class="form-group">
                    <label for="min"data-dark>Hasta</label>
                    <input type ="date" value="<?php echo date('y-m-d');?>" name ="hasta" id="hasta">
                 </div>
                 <button type="submit">
             </div> 
       </div>
</form></th>
                    </tr>
                    </tbody>           
                </table>
            </div>
        <a href="../../controlador/logout.php" class="logoutBtn"></a>
  
    </main>
    
<?php

include("layout/footer.php");
?>