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
</head>
<body>
	<header>
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
			
				<ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="ConsultaAdmin.php">Consultar libro</a></li>
                    <li><a href="MenuAdmin.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
			<?php
				
			?>
			<div class="contenedor-form">
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
	
	<h3>TIENES 12 HORAS PARA SOLICITAR EL LIBRO EN LA BIBLIOTECA,</h3>
	<h3>DE LO CONTRARIO SE CANCELARA LA RESERVA</h3>
	<h3>Tienes 3 dias hábiles para la devolucion del libro,</h3>
	<h3>de lo contrario se cobraran $5 por dia transcurrido.</h3>
	<br />
	<h3>Menu principal.</h3>
	</div>
	<div class="logo">
		<a href="MenuAdmin.php"><img src="img/casa.png" width="120" height="120" /></a>
	</div>
	<br />
	<div class="registroexitoso">
    <h3>Consultar otro libro.</h3>
	<br />
	</div>
	<div class="logo">
		<a href="ConsultaAdmin.php"><img src="img/regresar.png" width="120" height="120" /></a>
	</div>
	<br />
    </div>
</body>
</html>