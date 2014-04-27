<?php
	$cn=mysql_connect("localhost","root","")  or die("Error en conexion");
	mysql_select_db("mydb")  or die("Error en base de datos : ".mysql_error());
	//nombre cedula tlfF tlfM email origen ocupacion boucher
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$ocupacion=$_POST['ocupacion'];
	$tlfM=$_POST['tlfM'];
	$tlfF=$_POST['tlfF'];
	$email=$_POST['email'];
	$origen=$_POST['origen'];
	$asist="insert into asistente values('$cedula','$nombre','$ocupacion',
		'$tlfM','$tlfF','$email','$origen')";
	mysql_query($asist) or die("Error en query asist : ".mysql_error());
	$boucher=$_POST['boucher'];
	//pendiente con segundo paramtro, ID EVENTO dinamico
	$insc="insert into inscripcion values('$cedula',1,'$boucher',curdate(),0)";
	mysql_query($insc) or die("Error en query insc : ".mysql_error());
	echo "OK";	
	mysql_close($cn);

	//capturar errores: clave primaria asistentene, email unico asistente.
?>