<?php
	$cn=mysql_connect("localhost","root","")  or die("Error en conexion");
	mysql_select_db("evento")  or die("Error en base de datos : ".mysql_error());
	$idA = $_POST['idA'];
	$setStatus_query="update inscripcion set Aprobado=if(Aprobado=0,1,0) where idAsistente='$idA';";
	$setStatus=mysql_query($setStatus_query) or die("Error en query setStatus_query : ".mysql_error());
	if($setStatus)
		echo "OK";
	else
		echo "Error";
	mysql_close($cn);

?>