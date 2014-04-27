<?php 
include ('../php/seguridad.php');
?>
<link rel="stylesheet" type="text/css" href="../css/foundation.css">
<link rel="stylesheet" type="text/css" href="../css/foundation.min.css">
<link rel="stylesheet" type="text/css" href="../css/normalize.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<script type="text/javascript" src="../js/foundation.min.js">
</script><script type="text/javascript" src="../js/jquery.js">
</script><script type="text/javascript" src="../js/modernizr.js"></script>
<SCRIPT type="text/javascript">
<!--
function previsualizar(imagen){
    document.getElementById("preImg").src = imagen.value;
}
//-->
</SCRIPT>
<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fundación Amigos Del Gesto</title>

    
    <meta name="description" content="Documentation and reference library for ZURB Foundation. JavaScript, CSS, components, grid and more." />
    
    <meta name="author" content="ZURB, inc. ZURB network also includes zurb.com" />
    <meta name="copyright" content="ZURB, inc. Copyright (c) 2013" />

    <link rel="stylesheet" href="../assets/css/templates/foundation.css" />
    <script src="../assets/js/modernizr.js"></script>
  </head>
  <body>
    

 <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="../index.php">
            <img alt="" src="../img/amigos8.png"></img></a></li>
          </a>
        </h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>
 
  <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
       <li> <a href="#"><?php echo "Bienvenido: "; echo $_SESSION['user'];  ?></a></li>
	   <li><a href="../php/salir.php">Cerrar Sesión</a></li>
      </ul>
    </section>
  </nav>
  
  <nav class="top-bar" data-topbar>
    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="left">
        <li class="divider"></li>
        <li class="has-dropdown">
          <a href="#">Inscripciones</a>
          <ul class="dropdown">
              <li><a href="adminIns.php" >Gestión Inscripción</a></li>
			  <li><a href="listarPersonas.php" >Listado de Personas</a></li>
          </ul>
        </li>
        <li class="divider"></li>
          <li class="has-dropdown">
          <a href="#">Reportes</a>
          <ul class="dropdown">
       <li class="has-dropdown">
              <a href="#" class="">Certificados</a>
              <ul class="dropdown">
                 <li class="has-dropdown">
		              <a href="#" class=""> Imprimir Certificados</a>
        		      <ul class="dropdown">
                		<li><a href="nuevoPDF/fpdf17/CertificadosAsistencia.php">Todos certificado</a></li>
		                <li><a href="certificadosindividuales.php">Certificado Individual</a></li>
		              </ul>
        	    </li>
                <li><a href="ModificacionListado.php">Modificar certificado</a></li>
              </ul>
            </li>
           <li><a href="nuevoPDF/fpdf17/ListadoA.php">Lista de inscritos</a></li>
       <li><a href="nuevoPDF/fpdf17/ListadoP.php">Ponentes</a></li>  
          </ul>
        </li>
    <li class="divider"></li>
    <li class="has-dropdown">
          <a href="#">Imágenes</a>
          <ul class="dropdown">
           <li><a href="adminevento.php?lugar=header">Header</a></li>
       <li><a href="adminevento.php?lugar=slider">Slider</a></li>  
	   <li><a href="adminevento.php?lugar=certificado">Certificado</a></li>
          </ul>
        </li>
    <li class="divider"></li>
    <li class="has-dropdown">
    <a href="#">Términos y condiciones</a> 
      <ul class="dropdown">
           <li><a href="adminevento.php?lugar=banco">Bancos</a></li>
       <li><a href="adminevento.php?lugar=evento">Evento</a></li>
       <li><a href="adminevento.php?lugar=ponente">Ponentes</a></li>  
       <li><a href="adminevento.php?lugar=tema">Temas</a></li>  
       <li><a href="adminevento.php?lugar=dirigido">Público</a></li>  
       <li><a href="adminevento.php?lugar=fecha">Fechas</a></li>    
	   <li><a href="adminevento.php?lugar=historial">Historial</a></li>
          </ul></li>
        <li class="divider"></li>
    <li class="divider"></li>
        <li><a href="guardarUsuario.php">Usuario</a></li>
      </ul>
    </section>
  </nav>
 
</div><br>
    


<div class="row">
 
 <div class="large-12 columns">
      <br>
  <div class="large-12 columns">
    <!-- Three-up Content Blocks -->
 
<div class="large-12 columns"> 
  <div class="row">
  
  <div class="panel"> 
       <?php
$link = mysql_connect("localhost", "root",""); 
mysql_select_db("evento", $link);
if (isset($_GET["lugar"])) {
if (strcmp($_GET["lugar"],'banco')==0){
$resultado = mysql_query("SELECT * FROM `evento`.`banco`", $link)or die(mysql_error()); 
 echo' 
  
   <th></th>
   <th></th>
   <th></th>
   <th></th>
   <th></th>
   <th> </th>
   </tr></thead><tbody>';
   echo '<p ><h1 style="text-align:center"><b>Bancos</h1><br />';
  echo ' <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
<td><p><b>Banco</b></p> </td>
<td><p><b>Nro de Cuenta</b></p> </td>
<td><p><b>Tipo de cuenta</b></p> </td>
<td><p><b>Titular</b></p> </td>
<td><p><b>Cédula</b></p> </td>
<td ><p><b>Eliminar</b></p> </td>
</tr>';
while ($recorrido = mysql_fetch_array($resultado)){
  echo '<tr><td><p>'.$recorrido['nombre'].'</p> </td>';
  echo '<td><p>'.$recorrido['cuenta'].'</p> </td>';
  echo '<td><p>'.$recorrido['tipo'].'</p> </td>';  
  echo '<td><p>'.$recorrido['titular'].'</p> </td>'; 
  echo '<td><p>'.$recorrido['cedula'].'</p> </td>';
  echo '<td><p><a  href="registrar.php?lugar=banco&accion=eliminar&id='.$recorrido["idbanco"].'")> <img alt="" src="../img/delete.png"></img></a></p> </td></tr>' ;

}
echo'</table></p>';
echo '
<form method="POST" action="registrar.php?lugar=banco&accion=crear">
<table style="margin-left:auto; margin-right:auto;" border="1" width="80%"  cellpadding="0">
   <p style="text-align:center"><b>Nueva Cuenta Bancaria</b> </p>  
  <tr> 
  <td><p><b>Nombre:</p></td>
  <td><input type="TEXT" name="nombre"size=30 maxlength=100 required></td>
  </tr>
  <tr>
  <td><p><b>Nro de Cuenta:</p></td>
  <td><input type="TEXT" name="cuenta" size=30 maxlength=100 required></td> 
  </tr>
  <tr>
  <td><p><b>Tipo de cuenta:</p></td>
  <td><input type="TEXT" name="tipo" size=30 maxlength=50 required></td> 
  </tr>
  <tr>
  <td><p><b>Titular:</p></td>
  <td><input type="TEXT" name="titular" size=30 maxlength=50 required></td> 
  </tr>
  <tr>
  <td><p><b>Cédula:</p></td>
  <td><input type="text" name="cedula"size=30 maxlength=50 required></td>
  </tr>
  <tr >
  <td></td>
  <td align="center" ><input class="small radius button" type="SUBMIT" value="Crear"></td>
  
</table>  
</form>';
}



if (strcmp($_GET["lugar"],'evento')==0){
echo "<p><h1 style='text-align:center; '><b>Evento</h1></p>";
  $resultado = mysql_query("SELECT * FROM `evento`.`evento`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){

  echo "<table style='margin-left:auto; margin-right:auto;' border='1' width='80%' border='0' cellpadding='0'>";
  echo "<tr>";
  echo " <td><b>Nombre del evento:</td>";
  echo " <td>".$recorrido['nombre']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td><b>Lugar:</td>";
  echo "  <td>".$recorrido['lugar']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td><b>Ciudad:</td>";
  echo "  <td>".$recorrido['ciudad']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td><b>Estado:</td>";
  echo "  <td>".$recorrido['estado']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td><b>País:</td>";
  echo "  <td>".$recorrido['pais']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td><b>Precio:</td>";
  echo "  <td>".$recorrido['precio']."</td>";
  echo "</tr>";
  echo "</table>";
  echo '<form method="POST" action="registrar.php?lugar=evento&accion=finalizar">
  <p style="text-align:center"><input class="small radius button" type="SUBMIT" value="Finalizar evento"></p>
</form>';
}
echo "<table style='margin-left:auto; margin-right:auto;' border='1' width='80%' border='0' cellpadding='0'>";
echo "<form method='POST' action='registrar.php?lugar=evento&accion=crear'>";
echo "  <p style='text-align:center' ><b>Nuevo Evento: </p>";
echo "  <tr>";
echo "  <td><p><b>Nombre:</p></td><td><input type='TEXT' name='nombre' size=30 maxlength=100></td>";
echo "  </tr></tr>";
echo "  <td><p><b>Lugar:</p></td><td><input type='TEXT' name='lugar'   size=30 maxlength=100></td>";
echo "  </tr></tr>";
echo "  <td><p><b>Ciudad:</p></td><td><input type='TEXT' name='ciudad' size=30 maxlength=50></td>";
echo "  </tr></tr>";
echo "  <td><p><b>Estado:</p></td><td><input type='text' name='estado' size=30 maxlength=50></td>";
echo "  </tr></tr>";
echo "  <td><p><b>País:</p></td><td><input type='text' name='pais' size=30 maxlength=50></td>";
echo "  </tr></tr>";
echo "  <td><p><b>Precio:</p></td><td><input type='text' name='precio' size=30 maxlength=50></td>";
echo "  </tr></tr>";
echo " <td></td><td align='center'><input class='small radius button' type='SUBMIT' value='Crear'></td>";
echo "</form></table>";
}


if (strcmp($_GET["lugar"],'ponente')==0){
  echo '<p ><h1 style="text-align:center"><b>Ponentes </h1><br />';
    echo ' <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
<td><p><b>Ponente</b></p></td>
<td><p><b>Descripción</b></p></td>
<td><p><b>Areas</b></p></td>
<td><p><b>Agregar area</b></p></td>
<td><p><b>Eliminar</b></p></td>
</tr>';
  $resultado = mysql_query("SELECT * FROM `evento`.`ponente`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  echo "<tr><td><p>".$recorrido['nombre']."</p></td>";
  echo "<td><p>".$recorrido['descripcion']."</p></td><td>";
  $result= mysql_query("SELECT * FROM `evento`.`area` WHERE `idponente`=".$recorrido['idponente'], $link)or die(mysql_error());
  echo '<div style="margin-left:3%;">'; 
while ($recor = mysql_fetch_array($result)){
  echo '<p>'.$recor['descripcion'].'</p>';
}
  echo '</td><td><p><a href="adminevento.php?lugar=area&nombre='.$recorrido["nombre"].'&id='.$recorrido["idponente"].'")><img alt="" src="../img/check.png"></img></a></p></td>    ' ;
  echo '<td><p><a href="registrar.php?lugar=ponente&accion=eliminar&id='.$recorrido["idponente"].'")><img alt="" src="../img/delete.png"></img></a></p></td>' ;
echo "</div></tr>";
}
echo '</table> <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
<form method="POST" action="registrar.php?lugar=ponente&accion=crear">
   <p style="text-align:center"><b>Nuevo ponente</b><br />
  <td><p>Nombre:</p></td><td><input type="TEXT" name="nombre"size=30 maxlength=100></td>
  </tr><tr>
  <td><p>Descripción:</p></td><td><input type="TEXT" name="descripcion"size=50 maxlength=250></td>
  </tr><tr>
  <td></td>
  <td align="center"><input  class="small radius button" type="SUBMIT" value="Crear"></td></tr>
</form>
</table>
';
}



if (strcmp($_GET["lugar"],'area')==0){
  echo "<p style='text-align:center'> <b>Ponente:</b> ".$_GET["nombre"]."</p>";
 echo ' <table style="margin-left:auto; margin-right:auto;" border="1"><tr>
<td><p><b>Areas</b></p></td>
<td><p><b>Eliminar</b></p></td>
</tr>';
  $result= mysql_query("SELECT * FROM `evento`.`area` WHERE `idponente`='".$_GET["id"]."'", $link)or die(mysql_error()); 
echo '<div style="margin-left:3%;">'; 
while ($recor = mysql_fetch_array($result)){
  echo "<tr><td><p>".$recor['descripcion']."</p></td>";
    echo '<td><p><a href="registrar.php?lugar=area&accion=eliminar&id='.$recor["idarea"].'")><img alt="" src="../img/delete.png"></img></a></p></td></tr>' ;
}
echo "</div>";
echo '</table>
<table style="margin-left:auto; margin-right:auto;" rules="all" border="1"> <tr>
<form method="POST" action="registrar.php?lugar=area&accion=crear&id='.$_GET["id"].'">
   <p style="text-align:center"><b>Agregar nueva area</b><br />
   
  <td><p>Area de investigación:</p></td> <td><input type="TEXT" name="descripcion"size=30 maxlength=100></td></tr><tr><td></td>
  <td align="center"><input class="small radius button" type="SUBMIT" value="Crear"></td></tr>
  </table>
</form>';
}



if (strcmp($_GET["lugar"],'tema')==0){
  echo "<p ><h1 style='text-align:center'><b>Temas</h1><br />";
    echo ' <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
<td><p><b>Tema</b></p></td>
<td><p><b>Eliminar</b></p></td>
</tr>';
  $resultado = mysql_query("SELECT * FROM `evento`.`tema`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  echo "<tr><td><p>".$recorrido['descripcion']."</p></td>";
  echo '<td><p><a href="registrar.php?lugar=tema&accion=eliminar&id='.$recorrido["idtema"].'")><img alt="" src="../img/delete.png"></img></a></p></td></tr>' ;
}
echo '</table>
<table style="margin-left:auto; margin-right:auto;" rules="all" border="1"> <tr>
<form method="POST" action="registrar.php?lugar=tema&accion=crear">
   <p style="text-align:center"><b>Nuevo tema</b><br />
  <td><p><b>Tema:</p></td> <td><input type="TEXT" name="descripcion"size=30 maxlength=100></td></tr><tr><td></td>
  <td align="center" ><input class="small radius button" type="SUBMIT" value="Crear"><br /></td></tr></table>
</form>
';
}



if (strcmp($_GET["lugar"],'dirigido')==0){
 echo "<p><h1 style='text-align:center'><b>Publico</h1> </p><br />";
    echo ' <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
<td><p><b>Público</b></p></td>
<td><p><b>Eliminar</b></p></td>
</tr>';
  $resultado = mysql_query("SELECT * FROM `evento`.`dirigido`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  echo "<tr><td><p>".$recorrido['descripcion']."</p></td>";
  echo '<td><p><a href="registrar.php?lugar=dirigido&accion=eliminar&id='.$recorrido["iddirigido"].'")><img alt="" src="../img/delete.png"></img></a></p></td></tr>' ;
}

echo '</table>
<table style="margin-left:auto; margin-right:auto;" rules="all" border="1"> <tr>
<form method="POST" action="registrar.php?lugar=dirigido&accion=crear">
   <p style="text-align:center"><b>Nuevo publico</b><br />
  <td><p ><b>Público:</p></td><td><input type="TEXT" name="descripcion"size=30 maxlength=100></td></tr><tr><td></td>
  <td align="center"><input class="small radius button" type="SUBMIT" value="Crear"></td></tr></table>
</form>
';
}


if (strcmp($_GET["lugar"],'fecha')==0){
 echo "<p ><h1 style='text-align:center'><b>Fechas</h1> </p><br />";
    echo ' <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
<td><p><b>Fecha</b></p></td>
<td><p><b>Eliminar</b></p></td>
</tr>';
  $resultado = mysql_query("SELECT * FROM `evento`.`fecha`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  $fecha2=date("d-m-Y",strtotime($recorrido['fecha']));
  echo "<tr><td><p>".$fecha2."</p></td>";
  echo '<td><p><a href="registrar.php?lugar=fecha&accion=eliminar&id='.$recorrido["idfecha"].'")><img alt="" src="../img/delete.png"></img></a></p></td></tr>' ;
}
echo '</table>
<table style="margin-left:auto; margin-right:auto;" rules="all" border="1"> <tr>
<form method="POST" action="registrar.php?lugar=fecha&accion=crear">
   <p style="text-align:center"><b>Nueva fecha</b><br />
  <td><p><b>Fecha:</p></td><td><input type="date" name="fecha"size=30 maxlength=100></td></tr><tr><td></td>
  <td><input class="small radius button" type="SUBMIT" value="Crear"></td></tr></table>
</form>';
}


if (strcmp($_GET["lugar"],'historial')==0){
//**PAGINACION
    $per_page=2; 
    
    $dir_historial='ninguna';
    if (isset($_GET["direccion"]))
      $dir_historial=$_GET["direccion"];    
    //verifica a cual direccion va
    switch ($dir_historial) {
      case '<':
        //si la pagina es mayor a 1 se puede disminuir
        if($_SESSION['PAG_historial']>1)      
          $_SESSION['PAG_historial']-=1;
        break;
      case '>':
        //si la pagina es menor que el maximo de paginas se puede aumentar
        if($_SESSION['PAG_historial']<$_SESSION['pages_historial'])
          $_SESSION['PAG_historial']+=1;
        break;
        //sino se envia nada, se coloca por defecto en la primera
      default:
        $_SESSION['PAG_historial']=1; 
        //se calcula cuantas paginas se pueden sacar
        //  se podria optimizar teniendo una tabla que contenga un campo diciendo cuantos
        //    registros tiene la tabla inscripcion/asistene.
        //sino, siempre buscara todos y se pierde tiempo de procesamiento
        $query_historial="SELECT * FROM `evento`.`historial` ORDER BY `idevento`";
        $query_count_historial=mysql_query($query_historial);
        $count_historial = mysql_num_rows($query_count_historial);
        $_SESSION['pages_historial']= ceil($count_historial/$per_page);
    }
    //**PAGINACION

 echo "<p ><h1 style='text-align:center'><b>Historial</h1> </p><br />";
    echo ' <table style="margin-left:auto; margin-right:auto;" rules="all" border="1"><tr>
  <a href="adminevento.php?lugar=historial&direccion=<" > << Anterior </a>
  -
  <a href="adminevento.php?lugar=historial&direccion=>" > Siguiente >> </a>    
<td><p><b>Nombre</b></p></td>
<td><p><b>Cédula</b></p></td>
<td><p><b>Profesión</b></p></td>
<td><p><b>Teléfono 1</b></p></td>
<td><p><b>Teléfono 2</b></p></td>
<td><p><b>Correo</b></p></td>
<td><p><b>Certificado</b></p></td>
</tr>';
$start= ($_SESSION['PAG_historial'] - 1) * $per_page;
  $resultado = mysql_query("SELECT * FROM `evento`.`historial` ORDER BY `idevento` LIMIT $start,$per_page
    ", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  echo "<tr><td><p>".$recorrido['nombre']."</p></td>";
  echo "<td><p>".$recorrido['cedula']."</p></td>";
  echo "<td><p>".$recorrido['profesion']."</p></td>";
  echo "<td><p>".$recorrido['telefonom']."</p></td>";
  echo "<td><p>".$recorrido['telefonof']."</p></td>";
  echo "<td><p>".$recorrido['correo']."</p></td>";
 echo '<td><p><a href="registrar.php?lugar=fecha&accion=eliminar&id='.$recorrido["idhistorial"].'")><img alt="" src="../img/delete.png"></img></a></p></td></tr>' ;
}
echo '</table>';
}



if (strcmp($_GET["lugar"],'header')==0){
echo '
<form method="POST" action="registrar.php?lugar=header&accion=crear"  enctype="multipart/form-data">
   <p><b>Nuevo Header:<br />
   <div style="width:100%;"><img width="100%;" src="../img/slide2.jpg"></div><br>
   <table style="margin-left:auto; margin-right:auto;" width="80%" rules="all" border="1"><tr>
   <tr><td><p>Imagen</p></td><td> <input name="foto" type="file"/></td></tr><tr><td></td>
    <td align=center><input class="small radius button" type="SUBMIT" value="Cambiar"></td></tr></table>
      <input  name="action" type="hidden" value="upload" />
</form>';

}

if (strcmp($_GET["lugar"],'certificado')==0){
echo '

<form method="POST" action="registrar.php?lugar=certificado&accion=crear"  enctype="multipart/form-data">
   <p><b>Nuevo Certificado:<br />
   <div style="width:100%;"><img width="100%;" src="../administrador/nuevoPDF/fpdf17/formato.png"></div><br>
   <table style="margin-left:auto; margin-right:auto;" width="80%" rules="all" border="1"><tr>
   <tr><td><p>Imagen </p></td><td><input name="foto" type="file"/></td></tr><tr><td></td>
    <td align=center><input class="small radius button" type="SUBMIT" value="Cambiar"></td></tr></table>
      <input  name="action" type="hidden" value="upload" />
</form>';

}
if (strcmp($_GET["lugar"],'slider')==0){
   echo "<p><h1 style='Text-align:center'><b>Slider:</h1></p>";
    echo ' <table style="margin-left:auto; margin-right:auto;" width="80%" rules="all" border="1"><tr>
<td><p><b>Imagen</b></p></td>
<td><p><b>Patrocinante</b></p></td>
<td><p><b>Eliminar</b></p></td>
</tr>';
  $resultado = mysql_query("SELECT * FROM `evento`.`slide`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  echo "<tr><td><p style='text-align:center'><img src='../img/".$recorrido['imagen']."'alt='nombre' width='130' height='153' border='0' /></a></td>";
   echo "<td><p>".$recorrido['patrocinante']."</p></td>";
  echo ' <td><a href="registrar.php?lugar=slider&accion=eliminar&id='.$recorrido["idslide"].'&imagen='.$recorrido["imagen"].'")><img alt="" src="../img/delete.png"></img></a></p></td></tr>' ;
}
echo '</table>
   <p style="text-align:center"><b>Patrocinantes: <br /></p>
   <table style="margin-left:auto; margin-right:auto;" width="80%" rules="all" border="1"><tr>
<form method="POST" action="registrar.php?lugar=slider&accion=crear" enctype="multipart/form-data">   
  <td><p>Nuevo Nombre Patrocinante:</p></td><td> <input type="TEXT" name="patrocinante"size=30 maxlength=100></td></tr><tr>
<td><p>Imagen </p></td><td><input name="foto" type="file" /></td><tr><td></td>
  <td align="center"><input class="small radius button" type="SUBMIT" value="Guardar"></td></table>
  <input name="action" type="hidden" value="upload" />
</form>';
}

}else{
  echo '<iframe src="../img/slide2.jpg" width="100%" height="100%" frameborder="0" style="border:15">';
}
?>
     </iframe>  
  </div>
  </div>
   </div>

</div><!-- Footer -->

<footer class="row">
  <div class="large-12 columns">
    <hr>
    <div class="row">
      <div class="large-6 columns">
        <p>© Copyright Amigos Del Gesto. 2014</p>
      </div>
    </div>
  </div>
</footer>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/templates/foundation.js"></script>
    <script>
      $(document).foundation();

      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
    </script>
  
    <script>
  document.write('<script src=js/vendor/' +
  ('__proto__' in {} ? 'zepto' : 'jquery') +
  '.js><\/script>')
  </script>
  <script src="../js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
  
  </body>
</html>