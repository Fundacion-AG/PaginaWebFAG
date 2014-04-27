<?php 
include ('../php/seguridad.php');
?>
<?php
 if($_GET['error']==1){
   ?><<script language="javascript">alert("Error En El Inicio, Por Favor Vuelva a Intentarlo.");</script><?php
 }
?>
<link rel="stylesheet" type="text/css" href="../css/foundation.css">
<link rel="stylesheet" type="text/css" href="../css/foundation.min.css">
<link rel="stylesheet" type="text/css" href="../css/normalize.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<script type="text/javascript" src="../js/foundation.min.js">
</script><script type="text/javascript" src="../js/jquery.js">
</script><script type="text/javascript" src="../js/modernizr.js"></script>
    
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
          <a href="#">
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
        <li><a href="">Usuario</a></li>
      </ul>
    </section>
  </nav>
 
</div><br>
<div class="large-12 columns"> 
  <div class="row">
  
  <div class="panel"> 
  <p ><h1 style="text-align:center"><b>Listado De Inscritos</h1></p>
<?php
	include("../conexion/conexion.php");
	$result = mysql_query("SELECT identificacion, nombre, TelefonoM, Email FROM asistente", $conexion);
	echo "<table style=' margin-left:auto; margin-right:auto;' border = '1'> \n";
	echo "<tr> \n";
	echo "<td><b>Cédula</b></td> \n";
	echo "<td><b>Nombre</b></td> \n";
	echo "<td><b>Teléfono</b></td> \n";
	echo "<td><b>Email</b></td> \n";
	echo "</tr> \n";
  while ($row = mysql_fetch_row($result)){
	echo "<tr> \n";
	echo "<td>$row[0]</td> \n";
	echo "<td>$row[1]</td> \n";
	echo "<td>$row[2]</td> \n";
	echo "<td>$row[3]</td> \n";
	echo "<td><a href='editar.php?nombre=$row[0]'>Editar</a></td> \n";
	echo "</tr> \n";
	}
 echo "</table> \n";
?>
</div></div></div>
<!-- Footer -->

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