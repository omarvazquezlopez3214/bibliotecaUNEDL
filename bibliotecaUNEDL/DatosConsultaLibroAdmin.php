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
	<meta charset="UTF-8">
    <title>Prestamos</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilos.css">
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
                    <li><a href="ConsultaAdmin.php">Consultar libro</a></li>
                    <li><a href="MenuAdmin.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["usuario"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			</header>
		<div class="contenedor-form">
			<div class="toggle2">
        	</div>
        	<div class="formulario">
			<h1>Datos del libro y Usuario</h1>
			<p>CodigoDewey*Titulo-Autor-Editorial-Plantel-Año-Estatus</p>
			<br />
			 <form action="aceptarReservaLibro.php" method="post">
			 	<select id="librosConsulta" name="consultaLibros" class="contenedor-form">
			 		<?php
				echo '<option value="0">Seleccione un libro de la consulta:</option>';
			    include("conexionbdd.php");
				if($conn->connect_error)
				{
					die("<br /> Fallo el intento de conexión a la base de datos: "
				 								.$conn->connect_error . "<br />");
				}
				//Recuperar las variables
				$busqueda=$_GET['busqueda'];
				$modalidadbusqueda = $_GET['modalidadBusqueda'];
				
				if ($modalidadbusqueda == "Titulo")
				{
					$validarlibro = "SELECT * FROM libros WHERE titulo LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 1)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'">'.$row[codigo_dewey].' * '.$row[titulo].' - '.$row[autor_autores].' - '.$row[editorial].' - '.$row[plantel].' - '.$row[ano].' - '.$row[estatus].'</option>';
							
						}	
					}else
					{
						header("Location: consultaNoExitosaAdmin.php");
					}
					
				}elseif ($modalidadbusqueda == "Autor")
				{
					$validarlibro = "SELECT * FROM libros WHERE autor_autores LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 1)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'">'.$row[codigo_dewey].' * '.$row[titulo].' - '.$row[autor_autores].' - '.$row[editorial].' - '.$row[plantel].' - '.$row[ano].' - '.$row[estatus].'</option>';
						}
					}else
					{
						header("Location: consultaNoExitosaAdmin.php");
					}
				}elseif ($modalidadbusqueda == "Dewey")
				{
					$validarlibro = "SELECT * FROM libros WHERE codigo_dewey LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 1)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'">'.$row[codigo_dewey].' * '.$row[titulo].' - '.$row[autor_autores].' - '.$row[editorial].' - '.$row[plantel].' - '.$row[ano].' - '.$row[estatus].'</option>';
						}	
					}else
					{
						header("Location: consultaNoExitosaAdmin.php");
					}
				}
				mysqli_close($conn);	
			?>
			 	</select>
			 	
                <input type="button" value="Regresar " onclick="location.href = 'ConsultaAdmin.php'">
                
                <input type="button" value="Cancelar" onclick="location.href='ConsultaAdmin.php'">
              </form>
            </div>
          
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>