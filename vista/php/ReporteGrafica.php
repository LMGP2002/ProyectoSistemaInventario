<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
	<script src="../../librerias/jquery-3.3.1.min.js"></script>
	<script src="../../librerias/plotly-latest.min.js"></script>
</head>
<body>

	<div class="container">
		<center>
		<h1> Reporte proveedores con más entradas </h1>
		</center>
	
			<div class="row">
				<div class="row">
					
					<div class="col-sm-6">
						<div id="cargaBarras"></div>
					</div>
				</div>
			</div>
			<table  class="table" data-dark style ="width: 300px;">
				<thead>
					<tr>
						<th>Proveedor</th>
						<th>Cantidad de elementos</th>
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
