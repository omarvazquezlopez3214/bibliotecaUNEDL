<?php
//Mantiene el inicio de sesion y manda a la pagina dependiendo el tipo de usuario
	@session_start();
	if(!isset($_SESSION["matricula"])) 
	{
	header("Location: log-in.php");	
	}else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'C') 
	    {
	        header("Location: MenuAdmin.php");
	    }
	  else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'D') 
	    {
	        header("Location: MenuSuperUsuario.php");
	    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Head de la pagina y sus estilos-->
		<title>Menu Usuario</title>
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
	    maximun-scale1.0, minimum-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/nivo-slider.css" />
		<link rel="stylesheet" href="css/mi-slider.css" />
	    <link rel="stylesheet" href="css/estilos.css" />
	    
	    <script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/jquery.nivo.slider.js"></script>

	    <script type="text/javascript"> 
			$(window).on('load', function() {
		    $('#slider').nivoSlider(); 
			}); 
		</script>
	</head>

	<body>
		<!--Header donde se encuentra el logo y los estilos-->
			<header>
				<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl2.png" alt="" />
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			<!--Menu de navegacion--> 
				<ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
				</ul>
			 </nav>
			 <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<br />
<!--Slider --> <!---->
<!--Slider con las imagenes publicitarias de unedl-->
		<div class="slider-wrapper theme-mi-slider">
			<div id="slider" class="nivoSlider">     
		    	<img src="img/generaciones.jpg" alt="" title="#htmlcaption1" />    
		    	<img src="img/maestrias-02.jpg" alt="" title="#htmlcaption2" />    
		    	<img src="img/santander-unedl.jpg" alt="" title="#htmlcaption3" />
		    	<!--<img src="img/example2.jpg" alt="" title="#htmlcaption4" /> -->     
			</div>
		</div><!--Aqui termina el slider-->
			<br /><br /><br /><br /><br /><br /><br /><br /><br />
			<!--cintilla azul claro arriba del footer-->
			<div class="cinta2"></div>
			<div class="footer">
				<!--Contenido del Footer-->
				<p class="texto-footer">
					<br />
					<a href="https://www.unedl.edu.mx/portal/planteles.php">Contáctanos en nuestros diferentes planteles</a>
					<h3 style="color: white; float: left;"><b>¡Llámanos! Tel.</b> 018009990395</h3>
					<br /><br />
					<a href="mailto:unedl.universidad@unedl.edu.mx" style="float: left;">unedl.universidad@unedl.edu.mx</a>
					<br /><br />
					<div class="copyright">© Universidad Enrique Díaz de León <!--2014, Innsoft, All rights reserved--></div>
				</p>
				<div class="face">
					<a title="Pagina inicio UNEDL" href="https://www.unedl.edu.mx/portal/"><img src="img/unedl.png" /></a>
					<a title="Pagina de facebook" href="https://www.facebook.com/unedl.universidad"><img src="img/facebook.png" /></a>
                    <a href="https://twitter.com/UnedlU?lang=es"><img src="img/twitter.png" title="Pagina de twitter UNEDL" alt="" /></a>
				</div>
			</div>
			
	</body>
</html>