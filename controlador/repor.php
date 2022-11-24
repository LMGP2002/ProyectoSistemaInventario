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
    $this->Cell(0, 5, 'CAFE ARTE VILLA MONGUI', 0, 1, 'C');
    $this->Cell(0, 5, 'REPORTE DE  PROVEEDORES', 0, 1, 'C');
    $this->Cell(0, 5, utf8_decode("DUITAMA-BOYACÁ"), 0, 1, 'C');
    $this->Cell(0, 5,date('d/m/Y'),0,1,'C');
    $this->Cell(0, 5,date("h:i:s"),0,1,'C');
    // Salto de línea
    $this->Ln(5);
    $this->Cell(190, 5,'Listado de proveedores',0,1,'C');
       
    $this-> Cell(30,6,'Nit',1,0,'c',0); 
    $this->Cell(30,6,'Proveedor',1,0,'c',0); 
    $this->Cell(30,6,utf8_decode("Dirección"),1,0,'c',0);
    $this-> Cell(30,6,utf8_decode('Teléfono'),1,0,'c',0); 
    $this->Cell(30,6,'Estado',1,0,'c',0); 
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
    $consulta = "SELECT id,nit,nom_prov,direc_prov,direc_prov,tel_prov,estado_prov,nom_ciu 
    FROM `proveedor`,`ciudad` WHERE proveedor.id_ciudad = ciudad.id_ciudad ";
    $resultado= $pdo-> query($consulta); 
    

// Creación del objeto de la clase heredada
$pdf = new PDF();
header("Content-Type: text/html; charset=iso-8859-1 ");
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Times','',12);

while ($mostrar= $resultado->fetch(PDO::FETCH_ASSOC)){  
    $pdf-> Cell(30,6,$mostrar['nit'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['nom_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['direc_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['tel_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['estado_prov'],1,0,'c',0); 
    $pdf-> Cell(30,6,$mostrar['nom_ciu'],1,1,'c',0); 
}
$pdf->Output();
?>