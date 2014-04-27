<?php
include("../conexion/conexion.php");
 session_start();
  $cont = 0;
  $usuario  = $_POST['usuario'];
  $clave    = $_POST['clave'];
  
  $cedula=0;
 $result = mysql_query("SELECT login, pass FROM usuario", $conexion);
    while ($row = mysql_fetch_row($result)){
	    if($row[0] == $usuario and $row[1] == $clave)
		  { 
		   $cedula = $row[2];
		   $cont = 1;
		   break;
		  }
	}
	if($cont == 1)
	  {
	   $_SESSION['autentificado']="1";
       $_SESSION['user']= $usuario;
       $_SESSION['pass']= $clave;
	   header("location:../administrador/adminevento.php?lugar=evento");
	  }
    else
	  {
	   header("location:../administrador/index.php?error=1");
	  }
?>