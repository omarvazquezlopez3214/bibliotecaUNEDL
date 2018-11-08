<?php
	@session_start();
	if(!isset($_SESSION["matricula"])) 
	{
		header("Location: log-in.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>No exito reserva de libro</title>
    <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
	<header>
			<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl2.png" alt="" />
						<a href="MenuUsuario.php" ></a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			
				<ul class="menu-navegacion">
                    <li><a href="http://unedl.edu.mx/portal/contacto.php?">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
	<div class="contenedor-form">
	<div class="registroexitoso">
	<br />
	<h3>TU LIBRO NO SE PUEDE RESERVAR POR QUE ALCANZASTE EL MAXIMO DE 3 LIBROS POR ALUMNO</h3>
	<h3>NO PODRAS RESERVAR</h3>
	<h3>HASTA DEVOLVER UNO O TODOS LOS LIBROS EN PRESTAMO O LOS LIBROS QUE TIENES RESERVADOS</h3>
	<br />
	<h3>Menu principal.</h3>
	</div>
	<br />
	<div class="logo">
		<a href="MenuUsuario.php"><img src="img/casa.png" width="120" height="120" /></a>
	</div>
	<br />
	</div>
</body>
</html>