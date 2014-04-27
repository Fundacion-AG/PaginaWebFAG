<?php
include("../conexion/conexion.php");

  $nombre    = $_POST['nombre'];
  $apellido    = $_POST['apellido'];
  $login  = $_POST['login'];
  $clave     = $_POST['clave'];
  $email  = $_POST['email'];
  
  $sql =  mysql_query("UPDATE usuario SET nombre= '$nombre', apellido = '$apellido', login='$login',pass='$clave' ,email= '$email' WHERE nombre = '$nombre' ");
	if($sql)
	  {
	   header("location:../administrador/guardarUsuario.php");
	  }
    else
	  {
	   header("location:../administrador/listarPersonas.php?error=1");
	  }
?>