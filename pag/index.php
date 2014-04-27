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
      <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
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
  <div class="large-12 columns">
    <div class="row">
            <!-- Thumbnails -->
      <div class="large-3 small-6 columns">
        <a href="inscripcion.php"><img src="img/inscripcio.jpg"></a>
      </div>
      <div class="large-3 small-6 columns">
        <a href="condiciones.php"><img src="img/termino.jpg"></a>
      </div>
      <div class="large-3 small-6 columns">
                <a href="servicios.html"><img src="img/serv.jpg"></a>
      </div>
      <div class="large-3 small-6 columns">
        <a href="contactenos.php"><img src="img/contact.jpg"></a>
        <h6></h6>  
      </div><!-- End Thumbnails -->
    </div>
  </div>
</div>
                 
<div class="row">
  <div style="margin-top:20px;" class="large-12 columns">
    <div class="row">
      <div class="large-8 columns">
        <div class="row">         <!-- Slider -->
         <div class="large-12 hide-for-small">
           <div id="featured" data-orbit>
<?php
$link = mysql_connect("localhost", "root",""); 
mysql_select_db("evento", $link);
              $resultado = mysql_query("SELECT * FROM `evento`.`slide`", $link)or die(mysql_error()); 
while ($recorrido = mysql_fetch_array($resultado)){
  echo '<img src="img/'.$recorrido['imagen'].'" alt="slide image">';
}
?>
           </div>
         </div>
        </div>  
      </div>
                                 <!-- End Slider -->
                         <!-- Twitter -->
      <div class="large-4 columns hide-for-small">
       <a class="twitter-timeline" href="https://twitter.com/TyOMotos" data-widget-id="422415856664985601">Tweets por @TyOMotos</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
                   <!-- End Twitter --> 
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
            <a href="contactenos.php">Contactenos</a>
          </li>
          <li>
            <a href="creditos.php">Créditos</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
              <!-- Fin Pie de pagina-->
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
					<!-- Fin Modal -->
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
