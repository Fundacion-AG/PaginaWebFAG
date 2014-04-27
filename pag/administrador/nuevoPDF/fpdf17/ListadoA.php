<?php
require('fpdf.php');
header('Content-Type: text/html; charset=UTF-8'); 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('logo.png' ,20,10,40,'','PNG', '');
$pdf->SetXY(30,20);
$pdf->SetFont('Arial','',20);
$pdf->Cell(190,5,"Listado Asistentes",0,0,'C');
$pdf->Ln(16);
$pdf->Image('nombre.png' ,67,26,130,20,'PNG', '');
$pdf->Image('Pie.png',0,50,305,'','PNG', '');
mysql_connect("localhost","root","");
mysql_select_db("evento");
$query1="select * from inscripcion inner join asistente on(Aprobado='1' and idAsistente=Identificacion)";
$result=mysql_query($query1);
$y= mysql_num_rows($result);
$pdf->SetFont('Arial','',12);
	$pdf->SetXY(20,75);
  	$pdf->SetFillColor(0,101,500); // fondo de celda 
    $pdf->Cell(20, 5, 'Nro.', 1, 0, 'C',1);
    $pdf->Cell(75, 5,'Nombre ', 1, 0, 'C',1);
    $pdf->Cell(75, 5, 'Nro. Deposito', 1, 0, 'C',1);
	$pdf->Ln();

		if(($y)>0){
		$x=80;
		$pdf->SetFont('Arial','',9);
			$pdf->SetXY(20,$x);
			$t=1;
			while ($t<=$y) {
				$R= mysql_fetch_array($result);
			    $pdf->Cell(20, 5,$t, 1, 0, 'C');
			    $pdf->Cell(75, 5, $R['Nombre'], 1, 0, 'C');
			    $pdf->Cell(75, 5, $R['Nro.Deposito'], 1, 0, 'C');
				$x=$x+5;
				$pdf->SetXY(20,$x);
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