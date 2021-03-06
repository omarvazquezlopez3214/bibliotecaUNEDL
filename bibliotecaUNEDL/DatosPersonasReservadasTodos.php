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
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Personas con libros reservados</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
		<link href="css/estilos2.css" rel="stylesheet" type="text/css" />
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
			<div class="contenedor-form">
			 <div>
			 <h1>Prestamos</h1>
			 <h4>Persona y sus libros reservados.</h4>
			 <br />
			 <form action="aceptarReservaPersonas.php" method="post">
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
					$validarusuario = "SELECT * FROM reservalibros";
					if($resultado = $conn->query($validarusuario))
					{
						while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
						{
						echo '<option value ="'.$row[id_libro].'">'.$row[titulo].' - '.$row[autor].' - '.$row[editorial].' - '.$row[ano].' - '.$row[usuario].' - '.$row[nombre_completo].' - '.$row[correo_electronico].' - '.$row[matricula].' - '.$row[carrera].' - '.$row[telefono].' - '.$row[fecha_reservacion].'</option>';
						}	
					}else
					{
						header("noexitoPersonasReservadas.php");
					}

					mysqli_close($conn);
					
			 		?>
			 	</select>
                
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='reservados.php'">
				</form>
            </div>
		</div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>