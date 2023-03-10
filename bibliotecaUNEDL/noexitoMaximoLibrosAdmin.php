<?php
//Mantiene el inicio de sesion  
	@session_start();
	if(!isset($_SESSION["matricula"])) 
	{
		header("Location: log-in.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--Head de la pagina y sus estilos-->
    <meta charset="UTF-8">
    <title>No exito reserva de libro</title>
    <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
	<header>
		<!--Header donde se encuentra el logo y los estilos-->
			<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl2.png" alt="" />
						<a href="MenuAdmin.php" ></a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			<!--Menu de navegacion Administrador-->
				<ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="ConsultaAdmin.php">Consultar libro</a></li>
                    <li><a href="MenuAdmin.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			 <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
	<div class="contenedor-form">
	<div class="registroexitoso">
	<br />
	<!--Contenido del body-->
	<h3>TU LIBRO NO SE PUEDE RESERVAR POR QUE ALCANZASTE EL MAXIMO DE 3 LIBROS POR ALUMNO</h3>
	<h3>NO PODRAS RESERVAR</h3>
	<h3>HASTA DEVOLVER UNO O TODOS LOS LIBROS EN PRESTAMO O LOS LIBROS QUE TIENES RESERVADOS</h3>
	<br />
	<h3>Menu principal.</h3>
	</div>
	<br />
	<!--boton para regresar a menu-->
	<div class="logo">
		<a href="MenuAdmin.php"><img src="img/casa.png" width="120" height="120" /></a>
	</div>
	<br />
	</div>
</body>
</html>