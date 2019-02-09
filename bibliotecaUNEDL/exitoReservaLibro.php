<?php
	@session_start();
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
						<a href="MenuUsuario.php" ></a>
					</div>
					<div class="icono-menu">
						<a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
					</div>
				</div>
			  </div>
			
				<ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
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
							echo '<h3>Tu libro:</h3>';
							echo '<h3>"'.$row['titulo'].'"</h3>';
							echo '<h3>Se reservó con éxito</h3>';
							echo '<h3>Se encuentra en el plantel: <p style=" color: blue;">"'.$row['plantel'].'"</p></h3>';
						//}
					}
		?>
	
	<h3 style="color: red;">Tienes 12 horas para </h3>
    <h3 style="color: red;">solicitar el libro en la biblioteca,</h3>
	<h3 style="color: red;">de lo contrario se cancelará la reserva</h3>
	<h3>Tienes 3 días hábiles para la devolución del libro,</h3>
	<h3>de lo contrario se cobrarán $5.00 por día transcurrido.</h3>
	<br />
	<h3>Menú principal.</h3>
	</div>
	<div class="logo">
		<a href="MenuUsuario.php"><img src="img/casa.png" width="120" height="120" /></a>
	</div>
	<br />
	<div class="registroexitoso">
    <h3>Consultar otro libro.</h3>
	<br />
	</div>
	<div class="logo">
		<a href="consulta.php"><img src="img/regresar.png" width="120" height="120" /></a>
	</div>
	<br />
    </div>
</body>
</html>