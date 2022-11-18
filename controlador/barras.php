<?php
	require "../modelo/conexion2.php";
	$conexion=conexion();
	$sql="SELECT nom_prov as 'Proveedor', sum(cant) as 'Cantidad' FROM `proveedor`,`entrada`  
	WHERE entrada.id_prov=proveedor.id GROUP BY nom_prov ORDER BY entrada.fecha_entrada";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

	var data = [
		{
			x: datosX,
			y: datosY,
			type: 'bar'
		}
	];

	Plotly.newPlot('graficaBarras', data);
	img_png.attr("../vista/assets/repor.png", "../../vista/php/ReporteGrafica.php");

 	 Plotly.toImage(gd,{format:'png',height:400,width:400});
</script>