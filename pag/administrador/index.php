<?php
 if($_GET['error']==1){
   ?><<script language="javascript">alert("Error En El Inicio, Por Favor Vuelva a Intentarlo.");</script><?php
 }
?>
<link rel="stylesheet" type="text/css" href="../css/foundation.css">
<link rel="stylesheet" type="text/css" href="../css/foundation.min.css">
<link rel="stylesheet" type="text/css" href="../css/normalize.css">
<script type="text/javascript" src="../js/foundation.min.js">
</script><script type="text/javascript" src="../js/jquery.js">
</script><script type="text/javascript" src="../js/modernizr.js"></script>
   
<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<script>
      function checkRegistration(){        
         if (document.form.usuario.value.length==0){ 
			alert("Tiene que escribir su nombre") 
      	 return false; 
		} 
		if (document.form.clave.value.length==0){ 
			alert("Tiene que escribir su clave") 
      	 return false; 
		}
   	document.form.submit(); 
      }
  </script> 
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fundacion Amigos Del Gesto</title>
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
  </nav>
     </div>
</div><br>

<div class="large-12 columns"> 
  <div class="row">
		<div class="panel"> 
		<h4 style="text-align:center"><b>Inicio De Sesión</h4>
			<form name="form" action="../php/verificar_usuario.php" method="post" onSubmit="return checkRegistration()">
            	<table width="400" border="0" cellpadding="0" style=" margin-left:30%">
					<tr>
						<td>Usuario:</td>
						<td><input name="usuario" type="text" size="15" maxlength="15"></td>
					</tr>
					<tr>
						<td>Clave:</td>
						<td><input name="clave" type="password" size="15" maxlength="15"></td>
					</tr>
					<tr>
					<td>&nbsp;</td>
						<td><input class="small radius button" value="Enviar" name="" type="submit" ></td>
					</tr>
				</table>
          </form>	
		</div>
	</div>
</div>

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
              <!-- Fin Pie de pagina-->
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
