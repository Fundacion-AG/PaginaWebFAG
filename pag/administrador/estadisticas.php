<?php
	
	/*if( $_REQUEST["idA"] )
	{
	   $idA = $_REQUEST['idA'];
	echo "hola ".$idA;
	}else
	echo "error";*/

	$cn=mysql_connect("localhost","root","")  or die("Error en conexion");
	mysql_select_db("mydb")  or die("Error en base de datos : ".mysql_error());	
	$OPC="";
	switch ($_POST['OPC']) {
		case 0://no aprobados
			$OPC="where i.Aprobado=0";  
			break;

		case 1://aprobados
			$OPC="where i.Aprobado=1";  
			break;		
	}
	$setFilter_query="select * from inscripcion i join asistente a on a.Identificacion=i.idAsistente ".$OPC." order by i.idAsistente;";
	$setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query : ".mysql_error());
	// tabla de inscripciones
      echo '<table width="100%" border="2" cellpadding="0" >
       <tr>
          <td><h6>Nombre</h6></td>
          <td><h6>'.htmlentities("Cédula").'</h6</td>
          <td><h6>Email</h6</td>
          <td><h6>Lugar de origen</h6</td>
          <td><h6>Ocupación</h6</td>
          <td><h6>Fecha Inscripción</h6</td>
          <td><h6>Número de Voucher</h6</td> 
          <td><h6>Status</h6</td>
          <td></td>
        </tr>';      
        //falta condicion para EVENTO : id.
        //  trae el id asistente dos veces, por los nombres de los campos.*
        //setStatusIncs(".$cont.",'".$Filter_row['idAsistente']."','".$Filter_row['idEvento']."')
        $cont=1;
         while ($Filter_row=mysql_fetch_assoc($setFilter)){
        	echo "<tr>
	          <td>".htmlentities($Filter_row['Nombre'])."</td>
	          <td>".htmlentities($Filter_row['idAsistente'])."</td>
	          <td>".htmlentities($Filter_row['Email'])."</td> 
	          <td>".htmlentities($Filter_row['Residencia'])."</td> 
	          <td>".htmlentities($Filter_row['Profesion'])."</td>
	          <td>".htmlentities($Filter_row['FechaInscripcion'])."</td> 
	          <td>".htmlentities($Filter_row['Nro.Deposito'])."</td>
	          <td class='estados' id='status".$cont."'> ".($Filter_row['Aprobado']==0 ? "No Aprobado":"Aprobado")."</td>
	          <td> <a onClick=\"setStatusIncs(".$cont.",'".$Filter_row['idAsistente']."','".$Filter_row['idEvento']."')\"> Aprobar / Desaprobar </a> </td> 
              </tr>";
			$cont++;
    	}
      echo "</table>";
	// tabla de inscripciones
	mysql_close($cn);
?>