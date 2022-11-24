<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");

?>
  
    <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th data-dark>Reporte productos </th>
                        </tr>
                    </thead>

                    <tbody >
                    <tr>
                            <th>
                                <form id="formReporte"  method="POST" target="_blank"> 
                                    <div class="row">
                                            <div class="form-group">
                                                    <label for="min"data-dark>Desde</label>
                                                    <input type ="date" value="<?php echo date('y-m-d');?>" name ="desde" id="desde">
                                                    <label for="min"data-dark>Hasta</label>
                                                    <input type ="date" value="<?php echo date('y-m-d');?>" name ="hasta" id="hasta">
                                            </div>
                                                    <br>
                                                 <input id="btnReporte"type="submit" value="Generar PDF" class="btn" />
                                    </div>  
                                </form>
                            </th>
                        </tr>
                    </tbody>           
                </table>
                <div class="table_section">
                <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Proveedor</th>
                            <th>Fecha entrada</th>
                            <th># entrada</th>
                            <th>Precio entrada</th>
                            <th>Fecha Salida</th>
                            <th># salida</th>
                            <th>Precio salida</th>
                            
                        </tr>
                    </thead>
                    <tbody id="table_body">
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
    
    <script src="../js/crud_reporteE.js"></script>
    <a href="../../controlador/logout.php" class="logoutBtn"></a>
  <?php
  include("layout/footer.php");
  ?>