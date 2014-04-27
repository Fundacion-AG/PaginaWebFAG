<?php
require('fpdf.php');
header('Content-Type: text/html; charset=UTF-8'); 
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->Image('logo.png' ,20,5,50,'','PNG', '');
$pdf->SetXY(63,20);
$pdf->SetFont('Arial','',20);
$pdf->Cell(190,5,"Listado Ponentes",0,0,'C');
$pdf->Ln(16);
$pdf->Image('nombre.png' ,90,26,140,20,'PNG', '');
$pdf->Image('Pie.png',0,50,305,'','PNG', '');
mysql_connect("localhost","root","");
mysql_select_db("evento");
$query1="SELECT * FROM ponente ";
$result=mysql_query($query1);
$y= mysql_num_rows($result);
$pdf->SetFont('Arial','',12);
	$pdf->SetXY(60,75);
  	$pdf->SetFillColor(0,101,500); // fondo de celda 
    $pdf->Cell(50, 5, 'Nro', 1, 0, 'C',1);
    $pdf->Cell(100, 5, 'Nombre', 1, 0, 'C',1);
	$pdf->Ln();

		if(($y)>0){
		$x=80;
		$pdf->SetFont('Arial','',9);
			$pdf->SetXY(60,$x);
			$t=1;
			while ($t<=$y) {
				$R= mysql_fetch_array($result);
			    $pdf->Cell(50, 5,$t, 1, 0, 'C');
			    $pdf->Cell(100, 5, $R['nombre'], 1, 0, 'C');
				$x=$x+5;
				$pdf->SetXY(60,$x);
				$t++;
				if($pdf->GetY()==260){
					$pdf->AddPage();
					$x=20;
					$pdf->SetFont('Arial','',9);
					$pdf->SetXY(40,$x);
				}
			}
			
		}
$pdf->Output();
?>