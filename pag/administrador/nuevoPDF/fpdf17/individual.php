<?php
require('fpdf.php');
header('Content-Type: text/html; charset=UTF-8'); 
$pdf=new FPDF('L','mm','A4');
$conect= mysql_connect("localhost","root","");
mysql_select_db("evento",$conect);
$id=$_GET['id'];
$query1="SELECT * FROM inscripcion INNER JOIN asistente ON ( Identificacion = idAsistente AND Aprobado =1 and Identificacion='".$id."') ";
$result=mysql_query($query1);
$y= mysql_num_rows($result);
        $R= mysql_fetch_array($result);
		$pdf->AddPage();
		$pdf->Image('formato.png' ,'','',298,210,'PNG', '');
		$pdf->SetFont('helvetica','B',30);
		$pdf->SetXY(50,128);
		$pdf->Cell(200,10,$R['Nombre'],0,0,'C');
$pdf->Output();
?>