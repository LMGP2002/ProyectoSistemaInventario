<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" href="../css/reporte.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
	<script src="../../librerias/jquery-3.3.1.min.js"></script>
	<script src="../../librerias/plotly-latest.min.js"></script>
</head>
<body>

	<div class="container">
		<img src="../assets/main.png" id="logo"></th>
		<div class="titulo">
			<h4 class="datos"> CAFÉ ARTE VILLA MONGUí</h4>
			<h4 class="datos"> Duitama-Boyacá </h4>
	
				<h4 class="datos" id="fecha">
					<script>
						date = new Date();
						year = date.getFullYear();
						month = date.getMonth() + 1;
						day = date.getDate();
						document.getElementById("fecha").innerHTML =  +day + "/" + month + "/" + year;
					</script>
				</h4> 
				<h4 class="datos" id="hora">
					<script>
						hora= date.getHours();
						minutos= date.getMinutes();
						document.getElementById("hora").innerHTML = +hora + ":" + minutos;
					</script>
				</h4> 
		</div>
		<h2> Reporte proveedores con más entradas </h2>
			<div class="row">
				<div class="row">
					<div class="col-sm-6">
					
						<div id="cargaBarras"></div>
					</div>
				</div>
			</div>
			<h1> Reporte de entradas </h1>
			<table  class="table" data-dark style ="width: 300px;">
				<thead>
					<tr>
						<th>Proveedor</th>
						<th>Cantidad de Elementos</th>
					</tr>
				</thead>

				<tbody id="table_body">
				</tbody>           
   			</table>
	</div>
</body>
</html>
<script src="../js/crud_repor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#cargaBarras').load('../../controlador/barras.php');
	});
</script>
