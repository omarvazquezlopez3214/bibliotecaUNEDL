<?php
//Mantiene iniciada la sesion del usuario
	@session_start();
	//valida que tipo de usuario es dependiendo su matricula
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
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Personas con libros reservados</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
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
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			 <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<div class="contenedor-form">
				<div class="toggle2">
				</div>
				<!--Formulario-->
			 <div class="formulario">
			 <h1>Reservados</h1>
			 <p>Persona y sus libros reservados.</p>
			 <form action="aceptarReservaPersonasSuper.php" method="post">
			 	<select id="personaReservaLibro" name="personaLibrosEnReserva" class="contenedor-form" required>
			 		<?php
			 		echo '<option value="">Seleccione un libro reservado del usuario:</option>';
			 		include("conexionbdd.php");
					if($conn->connect_error)
					{
						die("<br /> Fallo el intento de conexión a la base de datos: "
					 								.$conn->connect_error . "<br />");
					}
					//Recuperar las variables
					$validarmatricula = "SELECT * FROM reservalibros";
					if($resultado = $conn->query($validarmatricula))
					{
						while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
						{
						echo '<option value ="'.$row[id_libro].'">'.$row[titulo].' - '.$row[autor].' - '.$row[plantel].' - '.$row[ano].' - '.$row[nombre].' - '.$row[apellidos].' - '.$row[correo_electronico].' - '.$row[matricula].' - '.$row[carrera].' - '.$row[telefono].' - '.$row[fecha_reservacion].'</option>';
						}	
					}else
					{
						header("noexitoPersonasReservadasSuper.php");
					}

					mysqli_close($conn);
					
			 		?>
			 	</select>
                <!--Botones-->
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='reservadossuper.php'">
				</form>
            </div>
		</div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>