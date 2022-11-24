
<?php
require("./fpdf/fpdf.php");

class PDF extends FPDF
{
 
// Cabecera de página
function Header()
{
     // Logo
     $this->Image('../vista/assets/main.png',2,2,50);
     // Arial bold 15
     
     $this->SetFont('Arial','B',10);
     
     // Movernos a la derecha
     $this->Cell(80);
     // Título
     $this->Cell(0, 20, '', 0, 1, 'C');
     $this->Cell(0, 5, utf8_decode('CAFÉ ARTE VILLA MONGUí'), 0, 1, 'C');
     $this->Cell(0, 5, 'REPORTE DE  PROVEEDORES', 0, 1, 'C');
     $this->Cell(0, 5, utf8_decode("DUITAMA-BOYACÁ"), 0, 1, 'C');
     $this->Cell(170, 5,'Fecha del reporte:',0,0,'C');
     $this->Cell(-120, 5,date('d/m/Y'),0,1,'C');
     $this->Cell(170, 5,'Hora del reporte:',0,0,'C');
     $this->Cell(-120, 5,date("h:i:s"),0,0,'C');
     $this->Ln(5);
    
     
     $this->Ln(5);
    $this->Cell(190, 5,'Listado de productos',0,1,'C');

    $this-> Cell(18,6,'Producto',1,0,'c',0);    
    $this-> Cell(35,6,'Proveedor',1,0,'c',0); 
    $this->Cell(25,6,'Fecha ingreso',1,0,'c',0);
    $this-> Cell(19,6,'N.entradas',1,0,'c',0);
    $this-> Cell(27,6,'Precio compra',1,0,'c',0); 
    $this-> Cell(25,6,'Fecha salida',1,0,'c',0);
    $this-> Cell(17,6,'N.salidas',1,0,'c',0);
    $this->Cell(27,6,'Precio venta',1,1,'c',0); 
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$hasta;
$desde;

if (isset($_POST["desde"]) && isset($_POST["hasta"]) ) {

   $desde=$_POST["desde"] ;
   $hasta=$_POST["hasta"] ;
   
}
    require "../modelo/conexion.php";
    if (empty($desde) || empty($hasta) ) {
    $consulta = "SELECT nombre,nom_prov, fecha_entrada,entrada.cant AS cantE,fecha_salida,salida.cant_elem_sal AS cantS,precio_comp,precio_venta FROM `elemento`,`proveedor`,`entrada`,`salida` 
    WHERE elemento.codigo= entrada.codigo_elemento and elemento.codigo=salida.codigo_elemento and proveedor.id=entrada.id_prov GROUP BY entrada.id_entrada;";
      
   }else{
    $consulta = "SELECT elemento.nombre,proveedor.nom_prov,entrada.fecha_entrada,entrada.cant AS cantE,salida.cant_elem_sal AS cantS ,entrada.precio_comp,salida.fecha_salida,salida.precio_venta FROM entrada 
    INNER JOIN elemento ON elemento.codigo=entrada.codigo_elemento 
    INNER JOIN salida ON salida.codigo_elemento=entrada.codigo_elemento inner join proveedor on proveedor.id=entrada.id_prov WHERE entrada.fecha_entrada BETWEEN '$desde' AND '$hasta' AND salida.fecha_salida BETWEEN '$desde' AND '$hasta';";  
  }
  $resultado= $pdo-> query($consulta); 
  // Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);


while ($mostrar= $resultado->fetch(PDO::FETCH_ASSOC)){
if($mostrar['precio_venta']==null){
  $precioVenta= "Sin precio";
}else{
  $precioVenta= '$'.$mostrar['precio_venta'];
}
 

    $pdf-> Cell(18,6,utf8_decode($mostrar['nombre']),1,0,'c',0);    
    $pdf-> Cell(35,6,utf8_decode($mostrar['nom_prov']),1,0,'c',0); 
    $pdf-> Cell(25,6,$mostrar['fecha_entrada'],1,0,'c',0); 
    $pdf-> Cell(19,6,$mostrar['cantE'],1,0,'c',0);
    $pdf-> Cell(27,6,$mostrar['precio_comp'],1,0,'c',0);
    $pdf-> Cell(25,6,$mostrar['fecha_salida'],1,0,'c',0); 
    $pdf-> Cell(17,6,$mostrar['cantS'],1,0,'c',0);  
    $pdf-> Cell(27,6,$precioVenta,1,1,'c',0);
    
    
}
//$pdf-> Cell(0, 5,'Reporte desde: '+$desde +'Hasta: '+$hasta, 0, 1, 'C');
   
$pdf->Output();
?>