<?php
//Mantiene el inicio de sesion  
	@session_start();
	 //manda a la pagina dependiendo el tipo de usuario
    if(!isset($_SESSION["matricula"])) 
	{
	header("Location: log-in.php");	
	}
	else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'A') 
	    {
	        header("Location: MenuUsuario.php");
	    }
	else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'B') 
	    {
	        header("Location: MenuUsuario.php");
	    }
	else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'C') 
	    {
	        header("Location: MenuAdmin.php");
	    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--Head de la pagina y sus estilos-->
    <meta charset="UTF-8">
    <title>Página baja de libro exitoso</title>
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
						<a href="MenuSuperUsuario.php" ></a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			<!--Menu de navegacion Super usuario--> 
				<ul class="menu-navegacion">
					<li><a href="MenuSuperUsuario.php">Inicio</a></li>
                    <li><a href="#">Libros</a>
                    	<ul class="submenu">
                    		<li><a href="altalibrosuper.php">Dar de alta</a></li>
                    		<li><a href="bajalibrosuper.php">Dar de baja</a></li>
                    		<li><a href="eliminados.php">Eliminados</a></li>
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
				</ul>
			 </nav>
			 <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<div class="contenedor-form">
				<!--Contenido del body-->
				<div class="registroexitoso">
				<br />
				<h3>TU LIBRO SE DIO DE BAJA CON EXITO</h3>
				<br />
				<h3>Menu principal.</h3>
				</div>
				<!--Boton para regresar a Menu Principal-->
				<div class="logo">
				<a href="MenuSuperUsuario.php"><img src="img/casa.png" width="120" height="120" /></a> <!--AQUI VA LA PAGINA DE MENU EN VES DE INDEX.HTML-->
				</div>
				<br />
				<div class="registroexitoso">
    			<h3>Eliminar otro libro.</h3>
    			</div>
    			<!--Boton para regresar a Dar de baja un libro-->
				<div class="logo">
				<a href="bajalibrosuper.php"><img src="img/regresar.png" width="120" height="120" /></a>
				</div>
				<br />
			</div>
</body>
</html>