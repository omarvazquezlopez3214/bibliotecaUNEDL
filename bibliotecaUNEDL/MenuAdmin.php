<?php
	@session_start();
	if(!isset($_SESSION["usuario"])) 
	{
		header("Location: log-in.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Menu Admin</title>
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
	    maximun-scale1.0, minimum-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/fontawesome-all.min.css" />
	    <link rel="stylesheet" href="css/estilos.css" />
	    <link rel="stylesheet" href="css/estilos2.css" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="/fonts.css" />
	</head>

	<body>
			<header>
				<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl.png" alt="" />
						<a href="#" >BIBLIOTECA </a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			
				<ul class="menu-navegacion">
                    <li><a href="#">Libros</a>
                    	<ul class="submenu">
                    		<li><a href="altalibro.php">Dar de alta</a></li>
                    		<li><a href="bajalibro.php">Dar de baja</a></li>
                    	</ul>
                    </li>
                    <li><a href="ConsultaAdmin.php">Consultar Libro</a></li>
                    <li><a href="reservados.php">Reservados</a></li>
                    <li><a><?php echo $_SESSION["usuario"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			</header>
			<div class="main">
				<br /><br /><br />
		
	</div>
	
			<br /><br /><br /><br /><br /><br /><br /><br /><br />
			<div class="footer">
				<p class="texto-footer">
					<br />
					Dirección: Av Enrique Díaz de León Nte, Zona Centro, 44100<br />
					Guadalajara, Jal.<br />
                    Teléfono: 01 33 3825 7580
				</p>
				<div class="face">
					<a title="Pagina inicio UNEDL" href="http://unedl.edu.mx/portal/index.php"><img src="img/logo_unedl.png" /></a>
					<a href="https://www.facebook.com/unedl.universidad"><img src="img/facebook.png" title="Pagina de facebook UNEDL" alt="" /></a>
					<a href="https://twitter.com/UnedlU?lang=es"><img src="img/t.png" title="Pagina de twitter UNEDL" alt="" /></a>
					
				</div>
			</div>
			
	</body>
</html>