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
    <title>Página reserva libro exitosa</title>
    <link rel="stylesheet" href="css/estilos.css" />
	    <link rel="stylesheet" href="css/estilos2.css" />
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
                    <li><a href="http://unedl.edu.mx/portal/contacto.php?">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			</header>
			<?php
				
			?>
	<div class="logo">
		<img src="img/índice.jpg" />
	</div>
	<div class="registroexitoso">
		<?php
			include("conexionbdd.php");
				if($conn->connect_error)
				{
					die("<br /> Fallo el intento de conexión a la base de datos: "
				 								.$conn->connect_error . "<br />");
				}
				$ultimoRegistrado = 'SELECT * FROM reservalibros order by id DESC limit 1 ';
				$result = $conn ->query($ultimoRegistrado);
					if($result-> num_rows > 0)
					{
						//while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						//{
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							echo '<h3>TU LIBRO: "'.$row['titulo'].'" SE RESERVO CON EXITO </h3>';
							echo '<h3>SE ENCUENTRA EN EL PLANTEL: "'.$row['plantel'].'"</h3>';
						//}
					}
		?>
	
	<h3>TIENES 12 HORAS PARA SOLICITAR EL LIBRO EN LA BIBLIOTECA, DE LO CONTRARIO SE CANCELARA LA RESERVA</h3>
	<h3>Tienes 3 dias hábiles para la devolucion del libro, de lo contrario se cobraran $5 por dia transcurrido.</h3>
	<br />
	<h3>Boton para regresar al menu principal.</h3>
	</div>
	<div class="logo">
		<a href="MenuUsuario.php"><img src="img/boton-regresar.png" width="246" height="80" /></a>
	</div>
	<br />
	<div class="registroexitoso">
    <h3>Boton para consultar otro libro.</h3>
	</div>
	<div class="logo">
		<a href="consulta.php"><img src="img/boton_libros.png" width="128" height="128" /></a>
	</div>
</body>
</html>