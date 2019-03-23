<?php
//Mantiene la sesion iniciada
	@session_start();
	if(!isset($_SESSION["matricula"])) 
	{
		//dependiendo la matricula define el tipo de usuario que le dara
	header("Location: log-in.php");	
	}else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'A') 
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
	    }
?>
<!DOCTYPE html>
<!--el formato de los estilos en CSS-->
<html lang="en">
	<head>
		<title>Menu Admin</title>
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
		<!--estilos en CSS del Header-->
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
			<!--Menu de navegacion del administrador-->
				<ul class="menu-navegacion">
                    <li><a href="MenuAdmin.php">Inicio</a></li>
                    <li><a href="#">Libros</a>
                    	<ul class="submenu">
                    		<li><a href="altalibro.php">Dar de alta</a></li>
                    		<li><a href="bajalibro.php">Dar de baja</a></li>
                    	</ul>
                    </li>
                    <li><a href="ConsultaAdmin.php">Consultar Libro</a></li>
                    <li><a href="reservados.php">Reservados</a></li>
                    <li><a href="prestamos.php">Prestamos</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			  <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			 <!--Cintilla arriba donde se encuentran los datos de UNEDL-->
			<div class="cinta2"></div>
			<div class="footer">
				<p class="texto-footer">
					<br />
					<!--footer de la pagina-->
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