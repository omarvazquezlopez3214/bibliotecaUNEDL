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
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Personas con libros prestados</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
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
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			  <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<div class="contenedor-form">
				<div class="contenedor-form">
					<div class="toggle2">
					</div>
					<!--Formulario-->
        	    		<div class="formulario">
			 				<h1>Prestamos</h1>
			 				<p>Persona y sus libros prestados.</p>
			                <form action="aceptarPrestamoPersonas.php" method="post">
			 	            <select id="personaReservaLibro" name="personaLibrosEnPrestamo" class="contenedor-form" required>
			 		        <?php
			 		        //Busca en la BDD todos los que estan en Prestamo
			 		          echo '<option value="">Seleccione un libro prestado del usuario:</option>';
			 		          include("conexionbdd.php");
					          if($conn->connect_error)
					          {
						      die("<br /> Fallo el intento de conexión a la base de datos: "
					 								.$conn->connect_error . "<br />");
					          }
					//Recuperar las variables
					          $matricula=$_GET['matricula'];
					          $validarmatricula = "SELECT * FROM prestamoslibros";
					          if($resultado = $conn->query($validarmatricula))
					          {
							  while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
							  {
							  	//Busca en la BDD por como estan en la base
							  echo '<option value ="'.$row[id_libro].'">'.$row[titulo].' - '.$row[autor].' - '.$row[plantel].' - '.$row[ano].' - '.$row[nombre].' - '.$row[apellidos].' - '.$row[correo_electronico].' - '.$row[matricula].' - '.$row[carrera].' - '.$row[telefono].' - '.$row[fecha_prestamo].'</option>';
							  }	
							  }else
							  {
							  header("Location: noexitoPersonasPrestamo.php");
					 		  }
							  mysqli_close($conn);
							?>
			 	        	</select>
			 	        	<!--Formulario para regresar los libros-->
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