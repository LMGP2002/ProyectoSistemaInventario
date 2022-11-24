<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");

?>
  
    <table class="table" data-dark>
                    <thead>
                        <tr>
                            <th data-dark>Reporte elementos</th>
                        </tr>
                    </thead>

                    <tbody >
                    <tr>
                            <th>
                                <form id="formReporte" action="../../controlador/reporProduc.php"  method="POST" target="_blank"> 
                                    <div class="row">
                                            <div class="form-group">
                                                    <label for="desde"data-dark>Desde</label>
                                                    <input type ="date" value="<?php echo date('y-m-d');?>" name ="desde" id="desde">
                                                    <label for="hasta"data-dark>Hasta</label>
                                                    <input type ="date" value="<?php echo date('y-m-d');?>" name ="hasta" id="hasta">
                                            </div>
                                                    <br>
                                                    <button type="click" style="background-color: #bc9667; margin:0 5px;" class="add_new" id="filtrarBtn">Filtrar por fecha</button>
                                                    <button class="add_new" type="submit" id="btnReporte" value="Generar PDF">Generar reporte</button>
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
                            <th>N.entrada</th>
                            <th>Precio entrada</th>
                            <th>Fecha Salida</th>
                            <th>N.salida</th>
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