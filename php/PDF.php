<?php
session_start();
$ID = $_SESSION['identificacion'];
error_reporting(0);
$varsesion = $_SESSION['identificacion'];
if ($varsesion == null || $varsesion=''){
    echo'Usted no tiene autorizacion';
    die();
}
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Extracto',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
$conexion=mysqli_connect("localhost","root","","bdprueba");
$mysqli = new mysqli('localhost','root','','bdprueba');
$consulta = "SELECT * FROM fecha WHERE identificacion = '$ID'";
$resultado = $mysqli->query($consulta);

$consulta2 = "SELECT * FROM factura WHERE identificacion = '$ID'";
$resultado2 = $mysqli->query($consulta2);

  //CONSULTAR
$resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE identificacion = '$ID'");
while($consulta3 = mysqli_fetch_array($resultados))
{
    $variable="";
    $variable=$consulta3['nombre'];
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

    $pdf->Cell(180,10,'NOMBRE: '.$variable,1,1);
    $pdf->Cell(180,10,'NUMERO DE IDENTIFICACION: '.$ID,1,1);
    $pdf->Cell(180,10,'TRANSACCIONES',1,1,'C');
    $pdf->Cell(90,10,'Fecha y hora',1,0,'C',0);
    $pdf->Cell(45,10,'Cuenta',1,0,'C',0);
    $pdf->Cell(45,10,'Valor',1,1,'C',0);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(90,10, $row['fecha'],1,0,'C',0);
    $pdf->Cell(45,10, $row['cuenta'],1,0,'C',0);
    $pdf->Cell(45,10, '$'.$row['valor'],1,1,'C',0);
}
    $pdf->Cell(180,10,'SERVICIOS PUBLICOS',1,1,'C');
    $pdf->Cell(75,10,'Fecha',1,0,'C',0);
    $pdf->Cell(35,10,'Factura',1,0,'C',0);
    $pdf->Cell(35,10,'Empresa',1,0,'C',0);
    $pdf->Cell(35,10,'Valor',1,1,'C',0);

while($row2 = $resultado2->fetch_assoc()){
    $pdf->Cell(75,10, $row2['fecha'],1,0,'C',0);
    $pdf->Cell(35,10, $row2['factura'],1,0,'C',0);
    $pdf->Cell(35,10, $row2['empresa'],1,0,'C',0);
    $pdf->Cell(35,10, '$'.$row2['valor'],1,1,'C',0);
}
$pdf->Output();
?>