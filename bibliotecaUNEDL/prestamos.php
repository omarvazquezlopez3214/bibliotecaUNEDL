<?php
//Mantiene el inicio de sesion y manda a la pagina dependiendo el tipo de usuario
	@session_start();
    if(!isset($_SESSION["matricula"])) 
	{
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
<html lang="en">
	<head> <!--Head de la pagina y sus estilos-->
	<meta charset="UTF-8">
    <title>Personas con libros prestados</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
		<body>
			<header> <!--Header donde se encuentra el logo y los estilos-->
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
			<!--Menu de navegacion Admin--> 
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
			 </nav> <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<br /><br />
			<div class="contenedor-form">
			<div class="toggle2">
        	</div>
        	<div class="formulario">
			<br />
			<h1>Prestamos de libros</h1>
			<p>Introduce la matricula del alumno o colaborador.</p>
			<br />
			<!--Formulario-->
			 <form action="DatosPersonasPrestamos.php" method="get">
                <input id="usuario" type="text" name="matricula" placeholder="Escriba la matricula del alumno *" required>
            <!--Botones para hacer la busqueda-->
                <input type="submit" value="Buscar por persona"> <br /> <br />
                <input type="button" value="Buscar por fechas" onclick="location.href = 'DatosDeLibrosPrestamos.php'">
                <input type="button" value="Cancelar" onclick="location.href = 'MenuAdmin.php'">
              </form>
            </div>
		</div>
            <br />
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>