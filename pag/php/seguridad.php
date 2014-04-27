<?php
SESSION_START();

if($_SESSION['autentificado']!="1"){
header("location:sesion.php");
exit();
}
?>