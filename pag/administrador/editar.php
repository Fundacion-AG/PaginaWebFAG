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
<script>
      function checkRegistration(){        
         if (document.form.nombre.value.length==0){ 
			alert("Tiene que escribir su nombre") 
      	 return false; 
		} 
		if (document.form.cedula.value.length==0){ 
			alert("Tiene que escribir su clave") 
      	 return false; 
		}
		if (document.form.email.value.length==0){ 
			alert("Tiene que escribir su email") 
      	 return false; 
		}
		if (document.form.telefono.value.length==0){ 
			alert("Tiene que escribir su teléfono") 
      	 return false; 
		}
		if (document.form.deposito.value.length==0){ 
			alert("Tiene que escribir su deposito") 
      	 return false; 
		}
   	document.form.submit(); 
      }
  </script>     
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
          </ul></li>
        <li class="divider"></li>
    <li class="divider"></li>
        <li><a href="">Usuario</a></li>
      </ul>
    </section>
  </nav>
 
</div><br>
    
<?php
	include("../conexion/conexion.php");
	$cedula = $_GET['nombre'];
	$result = mysql_query("SELECT identificacion, nombre, TelefonoM, Email FROM asistente ", $conexion);
	while ($row = mysql_fetch_row($result)){
	        if($row[0] == $cedula)
		      { 
			    $nombre = $row[1];
				$apellido = $row[2];
				$telefono = $row[3];
		       break;
		      }
		} 
	$result = mysql_query("SELECT `idAsistente`,`Nro.Deposito` FROM `inscripcion` ", $conexion);
	while ($row = mysql_fetch_row($result)){
	        if($row[0] == $cedula)
		      { 
			    $voucher = $row[1];
				
		       break;
		      }
		}
?>
<form name="form" action="../php/guardarEdicion.php" method="post" onSubmit="return checkRegistration()">
<table style=" margin-left:30%" width="600" border="0" cellpadding="0">

  <tr>
    <td>Identificación</td>
    <td><input name="ced_orig" value="<?php echo $cedula; ?>" type="text" maxlength="40" readonly></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><input name="nombre" value="<?php echo $nombre; ?>" type="text" maxlength="40"></td>
  </tr>
  <tr>
    <td>Cédula</td>
    <td><input name="cedula" type="text" value="<?php echo $cedula; ?>" maxlength="40"></td>
  </tr>
  <tr>
    <td>Teléfono</td>
    <td><input name="telefono" value="<?php echo $apellido; ?>" type="text" maxlength="20"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="email" value="<?php echo $telefono; ?>" type="text" maxlength="50"></td>
  </tr>
  <tr>
    <td>Número De Deposito:</td>
    <td><input name="deposito" value="<?php echo $voucher; ?>" type="text" maxlength="40"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input class="small radius button" value="Editar" name="" type="submit" ></td>
  </tr>
</table>
</form>
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