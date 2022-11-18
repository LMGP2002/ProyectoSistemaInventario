<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");

?>
      <!-- Titulo -->
    <h1 class="mt-5 text-center border border-dark" data-dark>Reportes</h1>
    <!-- Contenedor -->
    <div class="container mt-5">

    <!-- Reporte grafico -->
    <form action="ReporteGrafica.php"  method="POST" target="_blank"> 
        <input type="submit" value="Generar reporte" class="btn btn-danger mt-5 mr-5 float-right" />
    </form>

 <!-- Reporte proveedores -->
    <form action="../../controlador/repor.php"  method="POST" target="_blank"> 
      <input type="submit" value="Generar PDF" class="btn btn-danger mt-5 mr-5 float-right" />
    </form>

  <!-- Reporte Fechas  --> 
  <form action="../../controlador/reporProduc.php"  method="POST" target="_blank"> 
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
                <input type="submit" value="Generar PDF" class="btn btn-danger mt-5 mr-5 float-right" />
            </div> 
        </div>
    </form>

    
    </div>
    <a href="../../controlador/logout.php" class="logoutBtn"></a>
 
  <?php
  include("layout/footer.php");
  ?>