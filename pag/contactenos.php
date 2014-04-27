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
    
    <script type="text/javascript">

function valida_envia(){ 

   	//valido el nombre 

   	if (document.Formulario.nombre.value.length==0){ 
      	 alert("Debe escribir su nombre!!"); 
      	 document.Formulario.nombre.focus(); 
      	 return false; 
   	} 

	//valido el email
	if (document.Formulario.email.value.length==0)
		{
		 var sim='@.';
		 alert("E-mail no valido!!"); 
      	 document.Formulario.email.focus(); 
      	 return false; 
		}

	//valido el asunto
	if (document.Formulario.asunto.value.length==0){ 
      	 alert("Debe escribir el asunto del mensaje!!") 
      	 document.Formulario.asunto.focus() 
      	 return false; 
   	} 
		
	//valido el comentario
	if (document.Formulario.mensaje.value.length==0){ 
      	 alert("No ha escrito nada para enviar!!") 
      	 document.Formulario.mensaje.focus() 
      	 return false; 
   	} 
   	//el formulario se envia 
   	alert("Muchas gracias por escribirnos!!"); 
   	document.Formulario.submit(); 
} 

</script>
<?php

  if(isset($_GET['error'])){
    if($_GET['error']==0){
       ?><script language="javascript">alert("Error en el envio de correo, Por Favor Vuelva a Intentarlo.");</script><?php
    }else{ 
      if($_GET['error']==1){?> 
         <script language="javascript">alert("Su mensaje Fue Enviado Con exito, Espere mientras revisamos su mensaje");</script><?php
      } 
    }
  }    
?>
    
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
       <li> <a href="#">Contactanos</a></li>
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
        <div class="large-12 columns" align="center">
		 
       		<h1>Contactanos</h1> 
		
		</div>
      </div>
	  </div>
    <!-- Three-up Content Blocks -->
 
<div class="large-12 columns"> 
  <div class="row">
	
    <div >
      <div class="panel"> 
      <h4 align="center">Déjenos su mensaje y le responderemos a la maxima brevedad posible:</h4>
      
      
      
      
     <!---------------------AQUI INICIA EL FORMULARIO. DEBE RECIBIR EN ESTA MISMA WEB LOS DATOS Y ENVIARLOS AL EMAIL.-------------------> 
  <form name="Formulario" id="Formulario" action="php/mailContacto.php" method="post">
  <img style="float:left; padding-left:3%;" alt="" src="img/cont.png"></img>
 <table style="float:left; margin-left:20px;" width="60%" border="0" cellpadding="0">
  <tr>
    <td width="50">Indique su nombre: (*)</td>
    <td width="156" style="padding-right:30px"><label for="textfield"></label>
      <input type="text" name="nombre" id="nombre"></td>
  </tr>
  <tr>
    <td>Indique su Email: (*)</td>
    <td  style="padding-right:30px"><input type="text" name="email" id="email"></td>
  </tr>
  <tr>
    <td>Asunto del mensaje: (*)</td>
    <td  style="padding-right:30px"><textarea name="asunto"  style="resize: none;" id="asunto"></textarea>  </td>
  </tr>
  <tr>
    <td>Escriba su mensaje: (*)</td>
    <td  style="padding-right:30px"><textarea  style="resize: none;" name="mensaje" id="mensaje"></textarea> </td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="padding-right:30px">
	<spam id="notificacion" style="padding-right:30px"> (*) Todos estos campos son obligatorios </spam> 
	<a href="#" name="enviar" onclick="valida_envia()" class="small radius button"><b>Enviar</a></td>
  </tr>
  
  <!---------------------------------->
  </table>
  </form>
   
       <div style="clear:both"></div>
   
      
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
            <a href="#">Contactenos</a>
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
</html>
