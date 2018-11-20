<?php
    @session_start();
	  if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'A') 
	    {
	        header("Location: MenuUsuario.php");
	    }
	  else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'B') 
	    {
	        header("Location: MenuUsuario.php");
	    }
	  else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'D') 
	    {
	        header("Location: MenuSuperUsuario.php");
	    }else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'C') 
	    {
	        header("Location: MenuAdmin.php");
	    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Menu Principal</title>
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
	    maximun-scale1.0, minimum-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/fontawesome-all.min.css" />
	    <link rel="stylesheet" href="css/estilos.css" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="/fonts.css" />
	</head>

	<body>
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
			
				<ul class="menu-navegacion">
                    <li><a href="http://unedl.edu.mx/portal/contacto.php?">Contacto</a></li>
                    <li><a href="MenuPrincipal.php">Inicio</a></li>
                    <li><a href="log-in.php">Iniciar sesion o registrate</a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
			
			
			<div class="main">
		<div class="slides">
		<img src="img/maestrias-02.jpg" alt="" />
		<img src="img/siaru-unedl.jpg" alt="" />
		<img src="img/santander-unedl.jpg" alt="" />
		<img src="img/generaciones.jpg" alt="" />
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="js/jquery.slides.js"></script>
	<script>
		$(function(){
			$(".slides").slidesjs({
				play:{
					active: true,
					effect: "slides",
					interval: 5000,
					auto: true,
					swap: true,
					pauseOnHover: false,
					restartDelay: 2500
					
				}
				});
		});
	</script>
	        <br />
			<br /><br /><br /><br /><br /><br /><br /><br /><br />
			<div class="cinta2"></div>
			<div class="footer">
				<p class="texto-footer">
					<br />
					Dirección: Av Enrique Díaz de León Nte, Zona Centro, 44100<br />
					Guadalajara, Jal.<br />
                    Teléfono: 01 33 3825 7580
				</p>
				
				<div class="face">
					<a title="Pagina inicio UNEDL" href="https://www.unedl.edu.mx/portal/"><img src="img/unedl.png" /></a>
					<a title="Pagina de facebook" href="https://www.facebook.com/unedl.universidad"><img src="img/facebook.png" /></a>
                    <a href="https://twitter.com/UnedlU?lang=es"><img src="img/twitter.png" title="Pagina de twitter UNEDL" alt="" /></a>
					
					
				</div>
			</div>
			
	</body>
</html>