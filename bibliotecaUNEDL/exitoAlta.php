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
    <title>Página alta de libro exitoso</title>
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
	<div class="logo">
		<img src="img/índice.jpg" />
	</div>
	<div class="registroexitoso">
	<h3>TU LIBRO SE DIO DE ALTA CON EXITO</h3>
	<br />
	<h3>Boton para regresar al menu principal.</h3>
	</div>
	<div class="logo">
		<a href="MenuAdmin.php"><img src="img/boton-regresar.png" width="246" height="80" /></a> <!--AQUI VA LA PAGINA DE MENU EN VES DE INDEX.HTML-->
	</div>
	<br />
	<div class="registroexitoso">
    <h3>Boton para agregar otro libro.</h3>
	</div>
	<div class="logo">
		<a href="altalibro.php"><img src="img/boton_libros.png" width="128" height="128" /></a>
	</div>
</body>
</html>