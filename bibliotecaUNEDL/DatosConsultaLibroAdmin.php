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
	<meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="css/estilos.css">
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
				</ul>
			 </nav>
			   <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
		<div class="contenedor-form">
			<div class="toggle2">
        	</div>
        	<div class="formulario">
        		<!--Formulario de los datos de libro consultado-->
			<h1>Datos del libro y Usuario</h1>
			<p>Id*CodigoDewey*Titulo-Autor-Editorial-Plantel-Año-Estatus</p>
			 <form action="#" method="post">
			 	<select id="librosConsulta" name="consultaLibros" class="contenedor-form" required>
			 		<?php
				echo '<option value="">Seleccione un libro de la consulta:</option>';
			    include("conexionbdd.php");
				if($conn->connect_error)
				{
					die("<br /> Fallo el intento de conexión a la base de datos: "
				 								.$conn->connect_error . "<br />");
				}
				//Recuperar las variables
				$busqueda=$_GET['busqueda'];
				$modalidadbusqueda = $_GET['modalidadBusqueda'];
				//Valida si el libro que fue consultado no esta en la BDD disponible
				//SI no lo encuentra lo manda a la siguiente pagina consultaNoExitosaAdmin.php
				if ($modalidadbusqueda == "Titulo")
				{
					$validarlibro = "SELECT * FROM libros WHERE titulo LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[id].'">'.$row[id].'*'.utf8_encode($row[codigo_dewey]).' * '.utf8_encode($row[titulo]).' - '.utf8_encode($row[autor_autores]).' - '.utf8_encode($row[editorial]).' - '.utf8_encode($row[plantel]).' - '.$row[ano].' - '.$row[estatus].'</option>';
							
						}	
					}else
					{
						header("Location: consultaNoExitosaAdmin.php");
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
							echo '<option value ="'.$row[id].'">'.$row[id].'*'.utf8_encode($row[codigo_dewey]).' * '.utf8_encode($row[titulo]).' - '.utf8_encode($row[autor_autores]).' - '.utf8_encode($row[editorial]).' - '.utf8_encode($row[plantel]).' - '.$row[ano].' - '.$row[estatus].'</option>';
						}
					}else
					{
						header("Location: consultaNoExitosaAdmin.php");
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
							echo '<option value ="'.$row[id].'">'.$row[id].'*'.utf8_encode($row[codigo_dewey]).' * '.utf8_encode($row[titulo]).' - '.utf8_encode($row[autor_autores]).' - '.utf8_encode($row[editorial]).' - '.utf8_encode($row[plantel]).' - '.$row[ano].' - '.$row[estatus].'</option>';
						}	
					}else
					{
						header("Location: consultaNoExitosaAdmin.php");
					}
				}
				mysqli_close($conn);	
			?>
			 	</select>
			 	<!--Botones-->
                <input type="button" value="Regresar " onclick="location.href = 'ConsultaAdmin.php'">
                
                <input type="button" value="Cancelar" onclick="location.href='ConsultaAdmin.php'">
              </form>
            </div>
          
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>