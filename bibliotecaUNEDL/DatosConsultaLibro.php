<?php
//Mantiene el inicio de sesion y manda a la pagina dependiendo el tipo de usuario
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
	<!--Head de la pagina y sus estilos-->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Libros</title>
    <link rel="stylesheet" href="css/estilos.css">
	</head>
	<body>
		<header>
			<!--Header donde se encuentra el logo y los estilos-->
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
			<!--Menu de navegacion--> 
				<ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
				</ul>
			 </nav>
			<!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
			<!--Div para datos de los libros-->	
		<div class="contenedor-form">
			<div class="toggle2">
        	</div>
        	<div class="formulario">
			
			<h1>Datos del libro</h1>
			<p>Estructura: TÍTULO-AUTOR-PLANTEL-AÑO-ESTATUS</p>
			 <form action="aceptarReservaLibro.php" method="post">
			 	<select id="librosConsulta" name="consultaLibros" class="contenedor-form" required>
			 		<option value="">Seleccione un libro de la consulta:</option>
			 <!--Realiza el Query a la BDD-->		
			<?php

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
					//Valida si el libro que fue consultado no esta en la BDD disponible
					//SI no lo encuentra lo manda a la siguiente pagina consultaNoExitosa.php
					$validarlibro = "SELECT * FROM libros WHERE titulo LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'"> * '.$row[titulo].' - '.$row[autor_autores].' - '.$row[plantel].' - '.$row[ano].' - '.$row[estatus].'</option>';
						}	
					}else
					{
						header("Location: consultaNoExitosa.php");
					}
					//Validacion por autor
				}elseif ($modalidadbusqueda == "Autor")
				{
					$validarlibro = "SELECT * FROM libros WHERE autor_autores LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 1)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'"> * '.$row[titulo].' - '.$row[autor_autores].' - '.$row[plantel].' - '.$row[ano].' - '.$row[estatus].'</option>';
						}
					}else
					{
						header("Location: consultaNoExitosa.php");
					}
					//Validacion por codigo Dewey
				}elseif ($modalidadbusqueda == "Dewey")
				{
					$validarlibro = "SELECT * FROM libros WHERE codigo_dewey LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 1)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'">'.$row[codigo_dewey].' * '.$row[titulo].' - '.$row[autor_autores].' - '.$row[plantel].' - '.$row[ano].' - '.$row[estatus].'</option>';
						}	
					}else
					{
						header("Location: consultaNoExitosa.php");
					}
				}
				mysqli_close($conn);	
			?>
			 	</select>
			 	<!--Botones-->
                <input type="submit" value="Reservar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='consulta.php'">
              </form>
            </div>
          
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>