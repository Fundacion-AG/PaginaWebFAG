<?php
include("../conexion/conexion.php");

  $nombre    = $_POST['nombre'];
  $cedula    = $_POST['cedula'];
  $telefono  = $_POST['telefono'];
  $email     = $_POST['email'];
  $deposito  = $_POST['deposito'];
  $ced_orig  = $_POST['ced_orig'];
  
  //extrae de la tabla, el registro correcto para luego agregarlo como uno nuevo
  //  teniendo la diferencia de que los campos nuevos cambiarán

  //asistente
  $sql=mysql_query("INSERT INTO asistente (Identificacion,Nombre,Profesion,TelefonoM,TelefonoF
,Email,Residencia) (SELECT @Identificacion:='$cedula',@Nombre:='$nombre',Profesion,@TelefonoM:='$telefono',TelefonoF
,@Email:='$email',Residencia FROM asistente WHERE Identificacion = '$ced_orig');");
 
  //inscripcion
  $sql2=mysql_query("INSERT INTO inscripcion (idAsistente,NroDeposito,FechaInscripcion,Aprobado)
   (SELECT @idAsistente:='$cedula',@NroDeposito:='$deposito',FechaInscripcion,Aprobado
    FROM inscripcion WHERE idAsistente = '$ced_orig');");

  //inscripcion
  $sql_del2=mysql_query("DELETE FROM inscripcion WHERE idAsistente = '$ced_orig' ");
  //asistente
  $sql_del=mysql_query("DELETE FROM asistente WHERE Identificacion = '$ced_orig' ");
  
	if($sql && $sql2 && $sql_del && $sql_del2)
	  {
	   header("location:../administrador/listarPersonas.php");
	  }
    else
	  {
	   header("location:../administrador/listarPersonas.php?error=1");
	  }
?>