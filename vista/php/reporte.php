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
                                <form action="../../controlador/reporProduc.php"  method="POST" target="_blank"> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="min"data-dark>Desde</label>
                                                <input type ="date" value="<?php echo date('y-m-d');?>" name ="desde" id="desde">
                                                <label for="min"data-dark>Hasta</label>
                                                <input type ="date" value="<?php echo date('y-m-d');?>" name ="hasta" id="hasta">
                                                </div>
                                                <br>
                                            <input type="submit" value="Generar PDF" class="btn btn-danger mt-5 mr-5 float-right" />
                                        </div> 
                                    </div>
                                </form>
                            </th>
                        </tr>
                    </tbody>           
                </table>
    

    

  

    
    </div>
    <a href="../../controlador/logout.php" class="logoutBtn"></a>
 
  <?php
  include("layout/footer.php");
  ?>