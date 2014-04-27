<?php
	$cn=mysql_connect("localhost","root","")  or die("Error en conexion");
	mysql_select_db("evento")  or die("Error en base de datos : ".mysql_error());
	//nombre cedula tlfF tlfM email origen ocupacion boucher
	
	$valid1_query="SELECT COUNT(i.Aprobado) CMIN FROM inscripcion i;";
    $setvalid1=mysql_query($valid1_query) or die("Error en query valid1_query : ".mysql_error());
    $setvalid1_row=mysql_fetch_assoc($setvalid1);
	$valid1_query2="SELECT e.CuposMax CMAX FROM det_inscripcion e;";
	$setvalid2=mysql_query($valid1_query2) or die("Error en query valid1_query : ".mysql_error());
	$setvalid1_row2=mysql_fetch_assoc($setvalid2);
    if($setvalid1_row['CMIN'] >= $setvalid1_row2['CMAX']){
    	header("location:../inscripcion.php?valido=0&error=1");
    }
    else{
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$ocupacion=$_POST['ocupacion'];
		$tlfM=$_POST['tlfM'];
		$tlfF=$_POST['tlfF'];
		$email=$_POST['email'];
		$origen=$_POST['origen'];	
		$validAsis_query="SELECT idAsistente from inscripcion WHERE idAsistente='$cedula'";
		$setvalidAsis=mysql_query($validAsis_query) or die("Error en query validAsis_query : ".mysql_error());
		if(!(mysql_num_rows($setvalidAsis)>0)){
			$asist="insert into asistente values('$cedula','$nombre','$ocupacion','$tlfM','$tlfF','$email','$origen')";
			mysql_query($asist) or die("Error en query asist : ".mysql_error());
			$boucher=$_POST['boucher'];
			$insc="insert into inscripcion values('$cedula','$boucher',curdate(),0)";
			$resultado = mysql_query($insc);
			if($resultado){ 
			   header("location:../inscripcion.php?valido=1&error=0");	
			}else{
			   header("location:../inscripcion.php?valido=0&error=1");
			}
		}else{
			header("location:../inscripcion.php?valido=0&error=2");
		}
	}
	mysql_close($cn);
?>