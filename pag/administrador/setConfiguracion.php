<?php
	$cn=mysql_connect("localhost","root","")  or die("Error en conexion");
	mysql_select_db("evento")  or die("Error en base de datos : ".mysql_error());
	$FI = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['FI'])));
	$FF = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['FF'])));
	$cupos = $_POST['cupos'];
	$setConfiguracion_query="update det_inscripcion set CuposMax=".$cupos.",FechaMin='".$FI."',FechaMax='".$FF."';";
	$setConfiguracion=mysql_query($setConfiguracion_query) or die("Error en query setConfiguracion_query : ".mysql_error());
	if($setConfiguracion)
		echo "OK";
	else
		echo "Error";
	mysql_close($cn);

?>