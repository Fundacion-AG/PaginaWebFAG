
<?php
	session_start();
	$cn=mysql_connect("localhost","root","")  or die("Error en conexion");
	mysql_select_db("evento")  or die("Error en base de datos : ".mysql_error());

	//no aprobados/aprobados/todos
	if($_POST['OPC']==0 || $_POST['OPC']==1 || $_POST['OPC']==2){
		$OPC="";
		switch ($_POST['OPC']) {
			case 0://no aprobados
				$OPC="where i.Aprobado=0";  
				break;

			case 1://aprobados
				$OPC="where i.Aprobado=1";  
				break;
		}		
		//**PAGINACION
		$per_page=10;	
		//verifica a cual direccion va
		switch ($_POST['PAG']) {
			//-1 izquierda (menor)		
			case -1:
				//si la pagina es mayor a 1 se puede disminuir
				if($_SESSION['PAG']>1)			
					$_SESSION['PAG']-=1;
				break;
			//si es 0 es porque se cambio la OPC, sino sigue siendo la misma
			// y debe seguir con el siguiente id, por eso no modifica aca la Session PAG.
			case 0:
				$_SESSION['PAG']=1; 
				//se calcula cuantas paginas se pueden sacar
				//	se podria optimizar teniendo una tabla que contenga un campo diciendo cuantos
				//		registros tiene la tabla inscripcion/asistene.
				//sino, siempre buscara todos y se pierde tiempo de procesamiento
				$setFilter_query="SELECT * FROM inscripcion i JOIN asistente a ON a.Identificacion=i.idAsistente 
					".$OPC." ORDER BY i.idAsistente";
				$query_count=mysql_query($setFilter_query);
				$count = mysql_num_rows($query_count);
				$_SESSION['pages']= ceil($count/$per_page);
				break;
			//1 derecha (mayor)		
			case 1:
				//si la pagina es menor que el maximo de paginas se puede aumentar
				if($_SESSION['PAG']<$_SESSION['pages'])
					$_SESSION['PAG']+=1;
				break;
		}
		//**PAGINACION
		
		$start= ($_SESSION['PAG'] - 1) * $per_page;
		$setFilter_query="SELECT * FROM inscripcion i JOIN asistente a ON a.Identificacion=i.idAsistente 
			".$OPC." ORDER BY i.idAsistente LIMIT $start,$per_page";
		//die($setFilter_query);
		$setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 0-2 : ".mysql_error());
		// tabla de inscripciones
	      echo '<table width="100%" border="2" cellpadding="0" >
	       <tr>
	          <td><h6><b>Nombre</h6></td>
	          <td><h6><b>Cédula</h6></td>
	          <td><h6><b>Email</h6></td>
	          <td><h6><b>Lugar de origen</h6></td>
	          <td><h6><b>Ocupación</h6></td>
	          <td><h6><b>Fecha Inscripción</h6></td>
	          <td><h6><b>Número de Voucher</h6></td> 
	          <td><h6><b>Status</h6></td>
	          <td></td>
	        </tr>';      
	        //falta condicion para EVENTO : id.
	        //  trae el id asistente dos veces, por los nombres de los campos.*
	        //setStatusIncs(".$cont.",'".$Filter_row['idAsistente']."','".$Filter_row['idEvento']."')
	        $cont=1;
	        //$Filter_row='';
	        $first=true;
	         while ($Filter_row=mysql_fetch_assoc($setFilter)){
	         	//guarda el id del primero que coloque (para <)
	         	if($first)
					$_SESSION['id_menor']=$Filter_row['idAsistente'];
				//guarda el id del ultimo que coloque (para >)
				$_SESSION['id_mayor']=$Filter_row['idAsistente'];
	        	echo "<tr>
		          <td>".htmlentities($Filter_row['Nombre'])."</td>
		          <td>".htmlentities($Filter_row['idAsistente'])."</td>
		          <td>".htmlentities($Filter_row['Email'])."</td> 
		          <td>".htmlentities($Filter_row['Residencia'])."</td> 
		          <td>".htmlentities($Filter_row['Profesion'])."</td>
		          <td>".htmlentities($Filter_row['FechaInscripcion'])."</td> 
		          <td>".htmlentities($Filter_row['Nro.Deposito'])."</td>
		          <td class='estados' id='status".$cont."'>".($Filter_row['Aprobado']==0 ? "No Aprobado":"Aprobado")."</td>
		          <td> <a onClick=\"setStatusIncs(".$cont.",'".$Filter_row['idAsistente']."')\"> Aprobar / Desaprobar </a> </td> 
	              </tr>";
				$cont++;
	    	}	    	
	      echo "</table>";
	//estadisticas/configuraciones
    }else{
    	//estadisticas
    	if($_POST['OPC']==3){
		// tabla
	      echo '<table width="100%" border="2" cellpadding="0">
	      <tr align="center"><td><h6>Inscripciones Aprobadas</h6></td>';
	      //el numero de aprobados
	      $setFilter_query="select count(i.Aprobado) ap from inscripcion i where i.Aprobado=1;";
	      $setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 3/1 : ".mysql_error());
	      if($Filter_row=mysql_fetch_assoc($setFilter)){
	      	$ap=$Filter_row['ap'];
	      	echo '<td>'.$Filter_row['ap'].'</td>';
	      }
	      echo '<td><h6>Inscripciones No Aprobadas</h6></td>';
	      //el numero de no aprobados
	      $setFilter_query="select count(i.Aprobado) nap from inscripcion i where i.Aprobado=0;";
	      $setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 3/2 : ".mysql_error());
	      if($Filter_row=mysql_fetch_assoc($setFilter)){
	      	echo '<td>'.$Filter_row['nap'].'</td>';
	      }
	      //numero total de inscripciones
	      echo '<td><h6>Inscripciones Totales</h6></td><td>'.($ap+$Filter_row['nap']).'</td></tr>';
	      echo '<tr align="center"><td colspan="2"><h6>Fecha Primera Inscripción</h6></td>';
	      //la fecha de inscripcion mas reciente
	      $setFilter_query="select i.FechaInscripcion as FI from inscripcion i order by i.FechaInscripcion asc limit 1;";
	      $setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 3/3 : ".mysql_error());
	      if($Filter_row=mysql_fetch_assoc($setFilter)){
	      	echo '<td >'.$Filter_row['FI'].'</td>';
	      }
	      echo '<td><h6>Fecha Última Inscripción</h6></td>';
	      //la fecha de inscripciopn mas vieja.
	      $setFilter_query="select i.FechaInscripcion as FF from inscripcion i order by i.FechaInscripcion desc limit 1;";
	      $setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 3/4 : ".mysql_error());
	      if($Filter_row=mysql_fetch_assoc($setFilter)){
	      	echo '<td colspan="2">'.$Filter_row['FF'].'</td></tr>';
	      }
	      echo '<tr align="center"><td colspan="6"><h6>Listado Ocupación Asistentes</h6></td></tr>';
	      //un listado de todas las profesiones, sin repetir
	      $setFilter_query="select a.profesion from inscripcion i inner join asistente a on a.Identificacion=i.idAsistente group by profesion;";
	      $setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 3/5 : ".mysql_error());
	      while ($Filter_row=mysql_fetch_assoc($setFilter)){
	      	echo '<tr align="center"><td colspan="6">'.$Filter_row['profesion'].'</td></tr>';
	      }
	      echo '<tr align="center"><td colspan="6"><h6>Listado Residencia Asistentes</h6></td></tr>';
	      //un listado de todas las residencias, sin repetir
	      $setFilter_query="select a.residencia from inscripcion i inner join asistente a on a.Identificacion=i.idAsistente group by residencia;";
	      $setFilter=mysql_query($setFilter_query) or die("Error en query setFilter_query 3/6 : ".mysql_error());
	      while ($Filter_row=mysql_fetch_assoc($setFilter)){
	      	echo '<tr align="center"><td colspan="6">'.$Filter_row['residencia'].'</td></tr>';
	      }
	      echo "</table>";   				
	    //configuraciones
		}else{
			$setFilter1_query="SELECT e.CuposMax CMAX,DATE_FORMAT(e.FechaMin,'%d/%m/%Y') as 
				FI,DATE_FORMAT(e.FechaMax,'%d/%m/%Y') as FF FROM det_inscripcion e";
  			$setFilter2_query="SELECT COUNT(i.Aprobado) CMIN FROM inscripcion i";
		  
	      $setFilter1=mysql_query($setFilter1_query) or die("Error en query setFilter1_query 4 : ".mysql_error());
	      $setFilter2=mysql_query($setFilter2_query) or die("Error en query setFilter2_query 4 : ".mysql_error());
	      $Filter1_row=mysql_fetch_assoc($setFilter1);
	      $Filter2_row=mysql_fetch_assoc($setFilter2);
	      if($Filter1_row && $Filter2_row){	
	      //date('d/m/y',strtotime($Filter_row['FF'])      	
			echo '<table width="70%" border="2" cellpadding="0" align="center">
			<tr align="center"><td colspan="2"><h6>Intervalo de Fechas para Inscripciones</h6></td>
				<td><h6>Límite de Cupos</h6></td>
			</tr>
			<tr align="center">
				<td><br>Fecha Inicial
                        <input  style="width:160px" type="text" id="fecha1_mod" name="fecha1_mod" value="'.$Filter1_row['FI'].'" readonly="readonly">

                        <input class="cal" style="width:30px"type="image"  style="width:31px; height:31px" src="../img/cal.png" border="0"  style="text-decoration:none" title="Calendario " name="fecha1" id="fecha1"  value="Calendario" >
            	</td>
            
                <td><br>Fecha Final 
                		<input  style="width:160px" type="text" id="fecha2_mod" name="fecha2_mod" value="'.$Filter1_row['FF'].'" readonly="readonly">
                        <input class="cal" style="width:30px"type="image"  style="width:31px; height:31px" src="../img/cal.png" border="0"  style="text-decoration:none" title="Calendario " name="fecha2" id="fecha2"  value="Calendario" >
            	</td>
            	<td>
            	<input type="number" min="'.$Filter2_row['CMIN'].'" value="'.$Filter1_row['CMAX'].'" id="cupos" pattern="[0-9.]+"  />
            	</td>
            
            <td colspan="3">
            <a onClick="setConfiguracion()" class="small radius button">Guardar</a>
            </td>
            </tr>
            </table>';

			echo '<script type="text/javascript">
            Calendar.setup({
              inputField     :    "fecha1_mod",   // id del campo de texto
              ifFormat       :    "%d/%m/%Y",      // formato de la fecha
              button         :    "fecha1"      // el id del bot&oacute;n que lanzar&aacute; el calendario

                });


          

            Calendar.setup({
              inputField     :    "fecha2_mod",   // id del campo de texto
              ifFormat       :    "%d/%m/%Y",      // formato de la fecha
              button         :    "fecha2"      // el id del bot&oacute;n que lanzar&aacute; el calendario
                });

             
         </script>'; 
		}//if hay configuraciones
	}//else configuraciones 4
  }//estadisticas/configuraciones


	// tabla
	mysql_close($cn);

?>

