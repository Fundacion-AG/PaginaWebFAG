<?php
require('fpdf.php');
 
class PDF extends FPDF
{
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(7,60);
        $this->SetFont('Arial','B',10);
	  	$this->SetFillColor(0,100,500);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        $this->CellFitSpace(30,7,'Hora',1, 0 , 'C', true);
        $this->CellFitSpace(42,7,'Lunes',1, 0 , 'C', true);
        $this->CellFitSpace(42,7,'Martes',1, 0 , 'C', true);
        $this->CellFitSpace(42,7,'Miercoles',1, 0 , 'C', true);
        $this->CellFitSpace(42,7,'Jueves',1, 0 , 'C', true);
        $this->CellFitSpace(42,7,'Viernes',1, 0 , 'C', true);
        $this->CellFitSpace(42,7,'Sabado',1, 0 , 'C', true);
 

    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(7,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(7);
            $this->CellFitSpace(30,13, utf8_decode($fila['Hora']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }
  function datosHorizontalLunes($datos)
    {
        $this->SetXY(40,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(37);
            $this->CellFitSpace(42,13, utf8_decode($fila['Lunes']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }
  function datosHorizontalMartes($datos)
    {
        $this->SetXY(87,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(79);
            $this->CellFitSpace(42,13, utf8_decode($fila['Martes']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }
   function datosHorizontalMiercoles($datos)
    {
        $this->SetXY(127,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(121);
            $this->CellFitSpace(42,13, utf8_decode($fila['Miercoles']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }

  function datosHorizontalJueves($datos)
    {
        $this->SetXY(167,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(163);
            $this->CellFitSpace(42,13, utf8_decode($fila['Jueves']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }

  function datosHorizontalViernes($datos)
    {
        $this->SetXY(207,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(205);
            $this->CellFitSpace(42,13, utf8_decode($fila['Viernes']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }

  function datosHorizontalSabado($datos)
    {
        $this->SetXY(247,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
			$this->SetX(247);
            $this->CellFitSpace(42,13, utf8_decode($fila['Sabado']),1, 0 , 'C', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }

    }

    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal, $datosHorizontalLunes,$datosHorizontalMartes,$datosHorizontalMiercoles,$datosHorizontalJueves,$datosHorizontalViernes, $datosHorizontalSabado )
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
        $this->datosHorizontalLunes($datosHorizontalLunes);
        $this->datosHorizontalMartes($datosHorizontalMartes);
        $this->datosHorizontalMiercoles($datosHorizontalMiercoles);
        $this->datosHorizontalJueves($datosHorizontalJueves);
        $this->datosHorizontalViernes($datosHorizontalViernes);
        $this->datosHorizontalSabado($datosHorizontalSabado);
    }
 
    //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//************** Fin del código para ajustar texto *****************
//******************************************************************
} // FIN Class PDF
?>