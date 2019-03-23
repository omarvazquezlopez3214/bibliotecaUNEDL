<?php
//Mantiene el inicio de sesion  
	@session_start();
	//manda a la pagina dependiendo el tipo de usuario
    if(!isset($_SESSION["matricula"])) 
	{
	header("Location: log-in.php");	
	}
	  else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'C') 
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
						<a href="MenuUsuario.php" ></a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			<!--Menu de navegacion usuario--> 
				<ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
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
	<!--contenido del body-->
	<h3>TU LIBRO NO SE PUEDE RESERVAR POR QUE YA SE ENCUENTRA EN ESTADO RESERVADO O ES DE CONSULTA INTERNA</h3>
	<h3>CONSULTA OTRO LIBRO</h3>
	<br />
	<h3>Menu principal.</h3>
	<br />
	</div>
	<!--boton menu principal-->
	<div class="logo">
		<a href="MenuUsuario.php"><img src="img/casa.png" width="120" height="120" /></a>
	</div>
	<br />
	<div class="registroexitoso">
    <h3>Consultar otro libro.</h3>
	</div>
	<br />
	<!--boton para regresar-->
	<div class="logo">
		<a href="consulta.php"><img src="img/regresar.png" width="120" height="120" /></a>
	</div>
	<br />
	</div>
</body>
</html>