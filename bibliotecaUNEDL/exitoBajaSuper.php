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
    <title>Página baja de libro exitoso</title>
    <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
	<header>
				<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl2.png" alt="" />
						<a href="MenuSuperUsuario.php" ></a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			
				<ul class="menu-navegacion">
                    <li><a href="#">Libros</a>
                    	<ul class="submenu">
                    		<li><a href="altalibrosuper.php">Dar de alta</a></li>
                    		<li><a href="bajalibrosuper.php">Dar de baja</a></li>
                    	</ul>
                    </li>
                    <li><a href="#">Bibliotecarios</a>
                    	<ul class="submenu">
                    		<li><a href="altabibliotecario.php">Dar de alta</a></li>
                    		<li><a href="bajabibliotecario.php">Dar de baja</a></li>
                    	</ul>
                    </li>
                    <li><a href="ConsultaSuper.php">Consultar Libro</a></li>
                    <li><a href="reservadossuper.php">Reservados</a></li>
                    <li><a href="prestamossuper.php">Prestamos</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
			<div class="contenedor-form">
				<div class="registroexitoso">
				<br />
				<h3>TU LIBRO SE DIO DE BAJA CON EXITO</h3>
				<br />
				<h3>Menu principal.</h3>
				</div>
				<div class="logo">
				<a href="MenuSuperUsuario.php"><img src="img/casa.png" width="120" height="120" /></a> <!--AQUI VA LA PAGINA DE MENU EN VES DE INDEX.HTML-->
				</div>
				<br />
				<div class="registroexitoso">
    			<h3>Eliminar otro libro.</h3>
    			</div>
				<div class="logo">
				<a href="bajalibrosuper.php"><img src="img/regresar.png" width="120" height="120" /></a>
				</div>
				<br />
			</div>
</body>
</html>