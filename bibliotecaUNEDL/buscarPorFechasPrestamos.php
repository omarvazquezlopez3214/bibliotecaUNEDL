<?php
//Mantiene el inicio de sesion y manda a la pagina dependiendo el tipo de usuario
	@session_start();
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
<html lang="en">
	<head> <!--Head de la pagina y sus estilos-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Personas con libros prestados</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
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
			<div class="contenedor-form">
				<div class="toggle2">
				</div>
        	    <div class="formulario">
			 <h1>Prestamos</h1>
			 <p>Persona y sus libros prestados.</p>
			 <form action="aceptarPrestamoPersonas.php" method="post">
			 	<select id="personaReservaLibro" name="personaLibrosEnPrestamo" class="contenedor-form" required>
			 		<?php
			 		echo '<option value="">Seleccione un libro reservado del usuario:</option>';
			 		include("conexionbdd.php");
					if($conn->connect_error)
					{
						die("<br /> Fallo el intento de conexión a la base de datos: "
					 								.$conn->connect_error . "<br />");
					}
                    //Query donde se hace la busqueda en la BDD dependiendo la fecha que se ingreso
					$startDate = $_POST['start_date'];
					$endDate = $_POST['end_date'];

					$fecha = "SELECT * FROM prestamoslibros WHERE DATE(fecha_prestamo) BETWEEN '$startDate' AND '$endDate'";
                    $re = $conn->query($fecha);
                    $fil = mysqli_num_rows($re);
                    //Si se encuentra en la BDD regresa la informacion del libro y del usuario
					if($fil > 0)
					{
						while($row = mysqli_fetch_array($re, MYSQLI_ASSOC))
						{
						echo '<option value ="'.$row[id_libro].'">'.$row[titulo].' - '.$row[autor].' - '.$row[plantel].' - '.$row[ano].' - '.$row[nombre].' - '.$row[apellidos].' - '.$row[correo_electronico].' - '.$row[matricula].' - '.$row[carrera].' - '.$row[telefono].' - '.$row[fecha_prestamo].'</option>';
						}	
					}else
					{ //Si falla manda a no exito de busqueda
						header("noexitoBusquedaFechaPrestamos.php");
					}

					mysqli_close($conn);
					
			 		?>
			 		
			 	</select>
			 	<!--Estatus de los libros al ser regresados-->
			 	<select id="personaReservaLibro" name="personaEstatusEnPrestamo" class="contenedor-form" required>
			 	<option value="">Selecciona el estatus para la devolucion del libro *</option>
			 	<option value="DISPONIBLE">Disponible</option>
			 	<option value="CONSULTA INTERNA">Consulta Interna</option>
			 	<option value="RESERVADO">Reservado</option>
			 	<option value="PRESTAMO">Prestamo</option>
			 	</select>
                <!--Botones-->
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='prestamos.php'">
				</form>
			</div>
            </div>
		</div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>