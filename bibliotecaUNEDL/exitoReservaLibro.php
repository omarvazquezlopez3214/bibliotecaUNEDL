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
    <meta charset="UTF-8">
    <title>Página reserva libro exitosa</title>
    <link rel="stylesheet" href="css/estilos.css" />
	    <link rel="stylesheet" href="css/estilos2.css" />
</head>
<body>
	<header>
			<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl.png" alt="" />
						<a href="MenuAdmin.php" >BIBLIOTECA </a>
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
                    <li><a><?php echo $_SESSION["usuario"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			</header>
	<div class="logo">
		<img src="img/índice.jpg" />
	</div>
	<div class="registroexitoso">
	<h3>TU LIBRO SE RESERVO CON EXITO</h3>
	<h3>Tienes 3 dias hábiles para la devolucion del libro, de lo contrario se cobraran $5 por dia transcurrido.</h3>
	<br />
	<h3>Boton para regresar al menu principal.</h3>
	</div>
	<div class="logo">
		<a href="MenuUsuario.php"><img src="img/boton-regresar.png" width="246" height="80" /></a>
	</div>
	<br />
	<div class="registroexitoso">
    <h3>Boton para consultar otro libro.</h3>
	</div>
	<div class="logo">
		<a href="consulta.php"><img src="img/boton_libros.png" width="128" height="128" /></a>
	</div>
</body>
</html>