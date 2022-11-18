<?php
require("./fpdf/fpdf.php");

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../vista/assets/main.png',7,15,20);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,25,'Listado de productos',0,0,'C');
    // Salto de línea
    $this->Ln(30);
    $this-> Cell(18,6,'Producto',1,0,'c',0);    
    $this-> Cell(35,6,'Proveedor',1,0,'c',0); 
    $this->Cell(30,6,'Fecha de ingreso',1,0,'c',0); 
    $this-> Cell(30,6,'Fecha de salida',1,0,'c',0); 
    $this-> Cell(30,6,'precio de compra',1,0,'c',0); 
    $this->Cell(30,6,'precio de venta',1,1,'c',0); 
   
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
   
    $consulta = "SELECT nombre,nom_prov, fecha_entrada,fecha_salida,precio_comp,precio_venta FROM `elemento`,`proveedor`,`entrada`,`salida` 
  WHERE elemento.codigo= entrada.codigo_elemento and elemento.codigo=salida.codigo_elemento and proveedor.id=entrada.id_prov and 
  salida.fecha_salida BETWEEN'$desde' AND '$hasta' and entrada.fecha_entrada BETWEEN '$desde' AND '$hasta'GROUP BY entrada.id_entrada;";
  $resultado= $pdo-> query($consulta);
  // Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
  while ($mostrar= $resultado->fetch(PDO::FETCH_ASSOC)){

    $pdf-> Cell(18,6,$mostrar['nombre'],1,0,'c',0);    
    $pdf-> Cell(35,6,$mostrar['nom_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['fecha_entrada'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['fecha_salida'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['precio_comp'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['precio_venta'],1,1,'c',0); 
    
}
   




$pdf->Output();
?>