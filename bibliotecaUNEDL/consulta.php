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
    <title>Consulta de libros</title>
    <link rel="stylesheet" href="css/estilos.css" />
	</head>
		<body>
			<header>
				<nav class="menu">
			  <div class="contenido-menu">
				<div class="logo">
					<div class="logo-nombre">
						<img src="img/unedl2.png" alt="" />
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
                     <li><a href="dewey.php" target="_blank">Dewey</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
		<div class="contenedor-form">
			<div class="toggle2">
             <span></span>
        	 </div>
			 <div class="formulario">
			 <h1>Consulta de libros</h1>
			 <br />
			 <p>Escribe en el campo conforme a la modalidad de búsqueda.</p>
			 <form action="DatosConsultaLibro.php">
			 	
			 	<select class="contenedor-form" name="modalidadBusqueda" required title="Modalidad de busqueda"> 
                	<option value="">Selecciona una modalidad de búsqueda</option>
                	<option value="Titulo">Título del libro</option>
                	<option value="Autor">Autor del libro</option>
                	<option value="Dewey">Código dewey</option>
                	</select>
                <input type="text" name="busqueda" placeholder="Título, Autor ó Código Dewey"  title="Solo letras mayusculas o digitos" required>
				<br /> <br />
                <input type="submit" value="Buscar"> <br /> <br />
                
                <input type="submit" value="Cancelar" onclick="location.href='MenuUsuario.php'">
              </form>
            </div>
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>