<?php
$link = mysql_connect("localhost", "root",""); 
mysql_select_db("evento", $link);



if ((strcmp($_GET["lugar"],'banco')==0)&&(strcmp($_GET["accion"],'crear')==0)){
    $results = mysql_query( "SELECT * FROM `evento`.`banco` WHERE `nombre`='$_POST[nombre]' and `cuenta`='$_POST[cuenta]';", $link) or die('ok');
  if(mysql_num_rows(@$results) < 1){
mysql_query("INSERT INTO  `evento`.`banco` (`idbanco` ,`nombre` ,`cuenta`,`tipo` ,`titular` ,`cedula`)VALUES (NULL, '$_POST[nombre]', '$_POST[cuenta]', '$_POST[tipo]','$_POST[titular]', '$_POST[cedula]');", $link)or die(mysql_error()); 
}
}
if ((strcmp($_GET["lugar"],'banco')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){
mysql_query("DELETE FROM `evento`.`banco` WHERE `banco`.`idbanco` = '$_GET[id]'", $link)or die(mysql_error()); 
}



if ((strcmp($_GET["lugar"],'evento')==0)&&(strcmp($_GET["accion"],'crear')==0)){
    $results = mysql_query( "SELECT * FROM `evento`.`evento`;", $link) or die('ok');
  if(mysql_num_rows(@$results) > 0){
mysql_query("DELETE FROM `evento`.`evento` LIMIT 1", $link)or die(mysql_error());  
}  
mysql_query("INSERT INTO  `evento`.`evento` (`nombre` ,`lugar` ,`ciudad` ,`estado` ,`pais` ,`precio`)VALUES ('$_POST[nombre]', '$_POST[lugar]','$_POST[ciudad]', '$_POST[estado]', '$_POST[pais]', '$_POST[precio]');", $link)or die(mysql_error()); 
}


if ((strcmp($_GET["lugar"],'evento')==0)&&(strcmp($_GET["accion"],'finalizar')==0)){
 $results = mysql_query("SELECT * FROM `evento`.`evento`", $link)or die(mysql_error()); 
$recorrido = mysql_fetch_array($results);
    if(mysql_num_rows(@$results) > 0){
        mysql_query("INSERT INTO  `evento`.`eventospasados` (`id` ,`nombre` ,`lugar` ,`ciudad` ,`estado` ,`pais`)VALUES (NULL,'$recorrido[nombre]', '$recorrido[lugar]','$recorrido[ciudad]', '$recorrido[estado]', '$recorrido[pais]');", $link)or die(mysql_error()); 
        mysql_query("DELETE FROM `evento`.`evento` LIMIT 1", $link)or die(mysql_error());
          $results = mysql_query("SELECT  MAX(idevento) AS idevento FROM `evento`.`historial`;", $link)or die(mysql_error());
        $reco = mysql_fetch_array($results);
            if(mysql_num_rows(@$results) > 0){
        $aux=$reco["idevento"];
        $aux=$aux+1;
    }else{
        $aux=0;
        }          
          $results = mysql_query("SELECT * FROM `evento`.`asistente`", $link)or die(mysql_error()); 
    while ($recorrid = mysql_fetch_array($results)){
        mysql_query("INSERT INTO  `evento`.`historial` (`idhistorial` ,`idevento` ,`nombreevento` ,`cedula` ,`nombre` ,`profesion` 
            ,`telefonom`,`telefonof`,`correo`,`residencia`)VALUES (NULL,'$aux','$recorrido[nombre]','$recorrid[Identificacion]',
             '$recorrid[Nombre]','$recorrid[Profesion]', '$recorrid[TelefonoM]', '$recorrid[TelefonoF]', '$recorrid[Email]', '$recorrid[Residencia]');", $link)or die(mysql_error()); 
    }
 $results = mysql_query("DELETE FROM  `evento`.`inscripcion`", $link)or die(mysql_error());   
$results = mysql_query("DELETE FROM `evento`.`asistente`", $link)or die(mysql_error()); 
    }  
}


if ((strcmp($_GET["lugar"],'ponente')==0)&&(strcmp($_GET["accion"],'crear')==0)){
 mysql_query("INSERT INTO  `evento`.`ponente` (`idponente` ,`nombre`,`descripcion`)VALUES (NULL, '$_POST[nombre]', '$_POST[descripcion]');", $link)or die(mysql_error()); 
}
if ((strcmp($_GET["lugar"],'ponente')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){
mysql_query("DELETE FROM `evento`.`ponente` WHERE `ponente`.`idponente` = '$_GET[id]'", $link)or die(mysql_error()); 
}




if ((strcmp($_GET["lugar"],'area')==0)&&(strcmp($_GET["accion"],'crear')==0)){
 mysql_query("INSERT INTO  `evento`.`area` (`idarea` ,`idponente` ,`descripcion`)VALUES (NULL, '$_GET[id]', '$_POST[descripcion]');", $link)or die(mysql_error()); 
 header ("Location: adminevento.php?lugar=ponente");
}
if ((strcmp($_GET["lugar"],'area')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){
mysql_query("DELETE FROM `evento`.`area` WHERE `area`.`idarea` = '$_GET[id]'", $link)or die(mysql_error());
header ("Location: adminevento.php?lugar=ponente");
}


if ((strcmp($_GET["lugar"],'tema')==0)&&(strcmp($_GET["accion"],'crear')==0)){
    $results = mysql_query( "SELECT * FROM `evento`.`tema` WHERE `descripcion`='$_POST[descripcion]';", $link) or die('ok');
  if(mysql_num_rows(@$results) < 1){
mysql_query("INSERT INTO  `evento`.`tema` (`idtema` ,`descripcion`)VALUES (NULL, '$_POST[descripcion]');", $link)or die(mysql_error()); 
}
}
if ((strcmp($_GET["lugar"],'tema')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){
mysql_query("DELETE FROM `evento`.`tema` WHERE `tema`.`idtema` = '$_GET[id]'", $link)or die(mysql_error()); 
}




if ((strcmp($_GET["lugar"],'dirigido')==0)&&(strcmp($_GET["accion"],'crear')==0)){
    $results = mysql_query( "SELECT * FROM `evento`.`dirigido` WHERE `descripcion`='$_POST[descripcion]';", $link) or die('ok');
  if(mysql_num_rows(@$results) < 1){
mysql_query("INSERT INTO  `evento`.`dirigido` (`iddirigido` ,`descripcion`)VALUES (NULL, '$_POST[descripcion]');", $link)or die(mysql_error()); 
}
}
if ((strcmp($_GET["lugar"],'dirigido')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){
mysql_query("DELETE FROM `evento`.`dirigido` WHERE `dirigido`.`iddirigido` = '$_GET[id]'", $link)or die(mysql_error()); 
}




if ((strcmp($_GET["lugar"],'fecha')==0)&&(strcmp($_GET["accion"],'crear')==0)){
    $results = mysql_query( "SELECT * FROM `evento`.`fecha` WHERE `fecha`='$_POST[fecha]';", $link) or die('ok');
  if(mysql_num_rows(@$results) < 1){
mysql_query("INSERT INTO  `evento`.`fecha` (`idfecha` ,`fecha`)VALUES (NULL, '$_POST[fecha]');", $link)or die(mysql_error()); 
}
}
if ((strcmp($_GET["lugar"],'fecha')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){
mysql_query("DELETE FROM `evento`.`fecha` WHERE `fecha`.`idfecha` = '$_GET[id]'", $link)or die(mysql_error()); 
}



if ((strcmp($_GET["lugar"],'header')==0)&&(strcmp($_GET["accion"],'crear')==0)){

     $status = "";
    if ($_POST["action"] == "upload") {
        // obtenemos los datos del archivo
        $tamano = $_FILES["foto"]['size'];
        $tipo = $_FILES["foto"]['type'];
        $archivo = $_FILES["foto"]['name'];
        $prefijo = substr(md5(uniqid(rand())),0,6);
       
        if ($archivo != "") {
            // guardamos el archivo a la carpeta files
            $destino =  "../img/".$archivo;
            $lugar =  $archivo;
            if (copy($_FILES['foto']['tmp_name'],$destino)) {
				$status = "Archivo subido: <b>".$archivo."</b>";
				rename("../img/".$archivo,"../img/slide2.jpg");
            } else {
                $status = "Error al subir el archivo";
            }
        } else {
            $status = "Error al subir archivo";
        }
    }
   
}

if ((strcmp($_GET["lugar"],'certificado')==0)&&(strcmp($_GET["accion"],'crear')==0)){

     $status = "";
    if ($_POST["action"] == "upload") {
        // obtenemos los datos del archivo
        $tamano = $_FILES["foto"]['size'];
        $tipo = $_FILES["foto"]['type'];
        $archivo = $_FILES["foto"]['name'];
        $prefijo = substr(md5(uniqid(rand())),0,6);
       
        if ($archivo != "") {
            // guardamos el archivo a la carpeta files
            $destino =  "../administrador/nuevoPDF/fpdf17/".$archivo;
            $lugar =  $archivo;
            if (copy($_FILES['foto']['tmp_name'],$destino)) {
				$status = "Archivo subido: <b>".$archivo."</b>";
				rename("../administrador/nuevoPDF/fpdf17/".$archivo,"../administrador/nuevoPDF/fpdf17/formato.png");
            } else {
                $status = "Error al subir el archivo";
            }
        } else {
            $status = "Error al subir archivo";
        }
    }
   
}

if ((strcmp($_GET["lugar"],'slider')==0)&&(strcmp($_GET["accion"],'crear')==0)){
    $status = "";
    if ($_POST["action"] == "upload") {
        // obtenemos los datos del archivo
        $tamano = $_FILES["foto"]['size'];
        $tipo = $_FILES["foto"]['type'];
        $archivo = $_FILES["foto"]['name'];
        $prefijo = substr(md5(uniqid(rand())),0,6);
       
        if ($archivo != "") {
            // guardamos el archivo a la carpeta files
            $destino =  "../img/".$prefijo."_".$archivo;
            $lugar =  "".$prefijo."_".$archivo;
            if (copy($_FILES['foto']['tmp_name'],$destino)) {
   $status = "Archivo subido: <b>".$archivo."</b>";
mysql_query("INSERT INTO  `evento`.`slide` (`idslide`,`patrocinante`,`imagen`)VALUES (NULL,'$_POST[patrocinante]','$lugar');", $link)or die(mysql_error()); 

                    
            } else {
                $status = "Error al subir el archivo";
            }
        } else {
            $status = "Error al subir archivo";
        }
    }
   


}
if ((strcmp($_GET["lugar"],'slider')==0)&&(strcmp($_GET["accion"],'eliminar')==0)){

unlink("img/".$_GET['imagen']);

mysql_query("DELETE FROM `evento`.`slide` WHERE `slide`.`idslide` = '$_GET[id]'", $link)or die(mysql_error()); 
}




if (strcmp($_GET["lugar"],'area')!=0){
header ("Location: adminevento.php?lugar=".$_GET["lugar"]);
}
?>