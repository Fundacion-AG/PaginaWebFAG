<link rel="stylesheet" type="text/css" href="css/foundation.css">
<link rel="stylesheet" type="text/css" href="css/foundation.min.css">
<link rel="stylesheet" type="text/css" href="css/normalize.css">
<script type="text/javascript" src="js/foundation.min.js">
</script><script type="text/javascript" src="js/jquery.js">
</script><script type="text/javascript" src="js/modernizr.js"></script>
 <link rel="stylesheet" href="css/main.css">      
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
    <!-- form validation --> 
    <script>
      function checkRegistration(){        
         if (document.form.nombre.value.length==0){ 
			alert("Debe escribir su nombre") 
      	 return false; 
		} 
		if (document.form.cedula.value.length==0){ 
			alert("Debe escribir su cédula") 
      	 return false; 
		}
		if (document.form.email.value.length==0){ 
			alert("Debe escribir su email") 
      	 return false; 
		}
		if (document.form.boucher.value.length==0){ 
			alert("Debe escribir su numero de Voucher") 
      	 return false; 
		}
		if (document.form.tlfM.value.length==0){ 
			alert("Debe escribir su teléfono") 
      	 return false; 
		}
   	document.form.submit(); 
      }
  </script>     
    <!-- form validation -->
  </head>
  <body>
    

 <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="#">
            <img alt="" src="img/amigos8.png"></img></a></li>
          </a>
        </h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menú</span></a></li>
    </ul>
 
  <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
	  <li class="divider"></li>
       <li> <a href="contactenos.php">Contactanos</a></li>
        <li class="divider"></li>
       <li> <a href="#">  <img alt="" src="img/facebook2.png"></img></a></li>
        <li class="divider"></li>
       <li> <a href="#modal-text" class="call-modal">  <img alt="" src="img/insta2.png"></img></a></li>
	    <li class="divider"></li>
        <li> <a href="#">  <img alt="" src="img/twitter2.png"></img></a></li>
      </ul>
    </section>
  </nav>
  <div style="width:100%;"><img width="100%;" src="img/slide2.jpg"></div>
     </div>
</div><br>
    


<div class="row">
 
 <div class="large-12 columns">

</div>

<div class="row">
  <div style="margin-top:20px;" class="large-12 columns">
    <div class="row">
      <!-- Content -->
	   <div class="large-12 columns">    
      <div class="row">
        <div class="large-12 columns">
		 
       		<h1>Inscripciones</h1> 
		
		</div>
      </div>
	  </div>
    <!-- Three-up Content Blocks -->
 
<div class="large-12 columns"> 
  <div class="row">
	
    <div >
      <div class="panel"> 
      <h4>Todos los datos son Obligatorios.Recuerde Leer Antes los <a href="condiciones.php">Términos y Condiciones.</a></h4>
      <p style="margin-left:10%;"> <table width="80%" border="0" cellpadding="0">

 
<?php

  if(isset($_GET['error']) && isset($_GET['valido'])){
    if($_GET['error']==1){
       ?><script language="javascript">alert("Error En El Registro, Por Favor Vuelva a Intentarlo.");</script><?php
    }else{ 
      if($_GET['error']==2){?> 
         <script language="javascript">alert("Error En El Registro, Cédula en uso. Por Favor Vuelva a Intentarlo..");</script><?php
      }else{ 
        if($_GET['valido']==1){?> 
         <script language="javascript">alert("Se Ha Registrado Exitosamente, Espere mientras revisamos su N° de Voucher.");</script><?php
        }
      }
    }
  }

  $cn=mysql_connect("localhost","root","")  or die("Error en conexion");
  mysql_select_db("evento")  or die("Error en base de datos : ".mysql_error()); 
  $valid1_query="SELECT e.CuposMax CMAX,DATE_FORMAT(e.FechaMin,'%d/%m/%Y') as 
FI,DATE_FORMAT(e.FechaMax,'%d/%m/%Y') as FF,curdate() as hoy FROM det_inscripcion e";
  $valid2_query="SELECT COUNT(i.Aprobado) CMIN FROM inscripcion i";
  $setvalid1=mysql_query($valid1_query) or die("Error en query valid1_query : ".mysql_error());
  $setvalid2=mysql_query($valid2_query) or die("Error en query valid2_query : ".mysql_error());
  $valid1_row=mysql_fetch_assoc($setvalid1);
  $valid2_row=mysql_fetch_assoc($setvalid2);
  if($valid1_row && $valid2_row){
    echo "<p>*Cupos Inscritos/Cupos Maximos : ".$valid2_row['CMIN']."/".$valid1_row['CMAX']."<br>*Cupos Disponibles: ".
    ($valid1_row['CMAX']-$valid2_row['CMIN'])."<br>*Inscripciones desde ".$valid1_row['FI']." hasta ".$valid1_row['FF']."</p>";
    $FI = date('Y-m-d', strtotime(str_replace('/', '-', $valid1_row['FI'])));
    $FF = date('Y-m-d', strtotime(str_replace('/', '-', $valid1_row['FF'])));
    $hoy = date('Y-m-d', strtotime(str_replace('/', '-', $valid1_row['hoy'])));

    if($hoy>=$FI && $hoy<=$FF && ($valid1_row['CMAX']-$valid2_row['CMIN'])>0){
  ?>

  <!-- FOMRULARIO -->
 <form name="form" action="php/registro asistente.php" method="post" onsubmit="return checkRegistration()">
  <tr>
    <td width="143">Nombre:</td>
    <td width="186">
      <input type="text" value="" name="nombre" ></td>
  </tr>
  <tr>
    <td>Cédula:</td>
    <td><input type="text" id="textfield2" name="cedula"></td>
  </tr>
  <tr>
    <td>Teléfono Fijo:</td>
    <td><input type="text" id="textfield3" name="tlfF"></td>
  </tr>
  <tr>
  <tr>
    <td>Teléfono Móvil:</td>
    <td><input type="text" id="textfield4" name="tlfM"></td>
  </tr>
  <tr>
  <tr>
    <td>Email:</td>
    <td><input type="email" id="textfield5" name="email"></td>
  </tr>
  <tr>
    <td>Lugar de origen:</td>
    <td><input type="text" id="textfield6" name="origen"></td>
  </tr>
  <tr>
    <td>Ocupación:</td>
    <td><input type="text" id="textfield7" name="ocupacion"></td>
  </tr>
  <tr>
    <td>Número de Voucher:</td>
    <td><input name="boucher" type="text" id="textfield8" maxlength="10"></td>
  </tr>
  <tr>
    <td><div id="info" style="visibility:hidden">
        <h4>Complete todos los campos</h4>   
        </div></td>
    <td><input class="small radius button" value="Registrar" type="submit"> </td>
  </tr>
</table>
</form>
<!-- FOMRULARIO -->
<?php
    }//cierra if correcto hora
    else {//sino es posible crear la inscripcion por fecha, o por limite de cupos
        echo "<p><h1>No se puede registrar la inscripción porque no se encuentra en".
        " el rango de fechas correcto o no hay más cupos</h1></p>";
    }
  }//cierra if hay datos validacion
?>

      </p>
      <p></p>
	  </div>
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
      <div class="large-6 columns">
        <ul class="inline-list right">
          <li>
            <a href="index.php">Inicio</a>
          </li>
          <li>
            <a href="inscripcion.php">Inscripción</a>
          </li>
          <li>
            <a href="servicios.html">Servicios</a>
          </li>
          <li>
            <a href="contacto.html">Contactenos</a>
          </li>
          <li>
            <a href="creditos.php">Créditos</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- Inicio Modal -->
<section class="semantic-content" id="modal-text"
					tabindex="-1" role="dialog" aria-labelledby="modal-label"
					aria-hidden="true">

				<div class="modal-inner">
					<header>
						<h2 id="modal-label">Contactenos</h2>
					</header>

					<div class="modal-content">
						<iframe src="http://widget.stagram.com/in/anttonietag/?s=200&w=3&h=3&b=1&p=10" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:660px; height: 660px" ></iframe> <!-- websta - web.stagram.com -->
					</div>

					<footer>
						<p>
							<a href="#modal-embed" class="open-modal"
									title="Open another modal"
									role="button">Ir a Instagram</a>
							<a href="#!" class="close-action"
									title="Close this modal"
									data-dismiss="modal">Cerrar</a>
						</p>
					</footer>
				</div>

				<!-- Use Hash-Bang to maintain scroll position when closing modal -->
				<a href="#!" class="modal-close" title="Close this modal"
						data-dismiss="modal" data-close="Close">&times;</a>
</section>
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
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
  </body>
  <?php mysql_close($cn); ?>
</html>
