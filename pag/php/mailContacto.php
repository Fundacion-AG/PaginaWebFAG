<?php
include ('../conexion/conexion.php');

$ml     = $_POST['email'];
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

if(isset($_POST['email'])) {
$result = mysql_query("SELECT email FROM usuario ", $conexion);
	while ($row = mysql_fetch_row($result)){
				$email    = $row[4];
		       break;
	}
$email_to = "destinatario@sudominio.com";
$email_subject = "Contacto desde el sitio web";


$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $nombre . "\n";
$email_message .= "Apellido: " . $asunto . "\n";
$email_message .= "E-mail: " . $mensaje . "\n";

$valido=@mail($ml, $email, $email_message, "Contacto");

if($valido){
 header("location:../inscripcion.php?error=1");
}else{header("location:../inscripcion.php?error=0");}
?>