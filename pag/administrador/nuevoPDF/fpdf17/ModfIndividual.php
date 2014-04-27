<?php
require('fpdf.php');
include("../../../conexion/conexion.php");

$valor    = $_POST['nombre'];
$valor2    = $_GET['valor2'];

$sql = mysql_query("UPDATE asistente SET Nombre = '$valor' WHERE Identificacion = '$valor2' ");

if($sql){
header('Content-Type: text/html; charset=UTF-8'); 
$pdf=new FPDF('L','mm','A4');
$id=$_POST['nombre'];
  $pdf->AddPage();
  $pdf->Image('formato.png' ,'','',298,210,'PNG', '');
  $pdf->SetFont('helvetica','B',30);
  $pdf->SetXY(50,128);
  $pdf->Cell(200,10,$id,0,0,'C');
$pdf->Output();
}else{
	header("location:ModificacionListado.php?");
}
?>