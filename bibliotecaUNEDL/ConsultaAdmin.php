<?php
//Mantiene la sesion iniciada
	@session_start();
    //dependiendo la matricula define el tipo de usuario que le dara
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
    else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'D') 
    {
        header("Location: MenuSuperUsuario.php");
    }
?>
<!DOCTYPE html>
<!--el formato de los estilos en CSS-->
<html lang="en">
	<head>
	<meta charset="UTF-8">
    <title>Consulta de libros</title>
    <link rel="stylesheet" href="css/estilos.css" />
	</head>
		<body>
			<header>
                <!--estilos en CSS del Header-->
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
		<div class="contenedor-form">
			<div class="toggle2">
             <span></span>
        	 </div>
			 <div class="formulario">
                <!--Formulario para consulta de libros-->
			 <h1><a style="font-family: Calibri">Consulta de libros</h1>
			 <br />
			 <h2>Escribe en el campo conforme a la modalidad de búsqueda.</h2>
			 <form action="DatosConsultaLibroAdmin.php">
			 	<!--Lista de modalidad de busqueda-->
			 	 <select class="contenedor-form" name="modalidadBusqueda" required title="Modalidad de busqueda"> 
                	<option value="">Selecciona una modalidad de búsqueda</option>
                	<option value="Titulo">Título del libro</option>
                	<option value="Autor">Autor del libro</option>
                	<option value="Dewey">Código dewey</option>
                	</select>
			 	<!--Espacio para escribir Título, Autor ó Código Dewey-->
                <input type="text" name="busqueda" placeholder="Título, Autor ó Código Dewey" title="Solo letras mayusculas o digitos" required>
                <br /> <br />
                <!--Boton de Buscar-->
                <input type="submit" value="Buscar"> <br /> <br />
                <!--Boton de cancelar-->
                <input type="submit" value="Cancelar" onclick="location.href='MenuAdmin.php'">
              </form>
            </div>
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>