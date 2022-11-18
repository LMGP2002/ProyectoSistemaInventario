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
    $this->Cell(30,25,'Listado de proveedores',0,0,'C');
    // Salto de línea
    $this->Ln(30);
    $this-> Cell(10,6,'id',1,0,'c',0);    
    $this-> Cell(30,6,'nit',1,0,'c',0); 
    $this->Cell(30,6,'nom_prov',1,0,'c',0); 
    $this-> Cell(30,6,'direc_prov',1,0,'c',0); 
    $this-> Cell(30,6,'tel_prov',1,0,'c',0); 
    $this->Cell(30,6,'estado_prov',1,0,'c',0); 
    $this-> Cell(30,6,'Ciudad',1,1,'c',0); 
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


    require "../modelo/conexion.php";
    $consulta = "SELECT * FROM proveedor";
    $resultado= $pdo-> query($consulta); 
    

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

while ($mostrar= $resultado->fetch(PDO::FETCH_ASSOC)){

    $pdf-> Cell(10,6,$mostrar['id'],1,0,'c',0);    
    $pdf-> Cell(30,6,$mostrar['nit'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['nom_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['direc_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['tel_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['estado_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['id_ciudad'],1,1,'c',0); 
}
$pdf->Output();
?>