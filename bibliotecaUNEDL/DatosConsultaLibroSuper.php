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
	<meta charset="UTF-8">
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
			<h1>Datos del libro y Usuario</h1>
			<p>Id*CodigoDewey*Titulo-Autor-Editorial-Plantel-Año-Estatus</p>
			 <form action="aceptarReservaLibroSuper.php" method="post">
			 	<select id="librosConsulta" name="consultaLibros" class="contenedor-form" required>
			 		<?php
			 		//consulta en la base de datos el libro que se busca
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
				//Modalidad de busqueda por titulo
				if ($modalidadbusqueda == "Titulo")
				{
					$validarlibro = "SELECT * FROM libros WHERE titulo LIKE '%".$busqueda."%' ";
					$result = $conn ->query($validarlibro);
					if($result-> num_rows > 0)
					{
						while($row = mysqli_fetch_array($result))
						{//Trai los datos del libro
							echo '<option value ="'.$row[id].'">'.$row[id].'*'.utf8_encode($row[codigo_dewey]).' * '.utf8_encode($row[titulo]).' - '.utf8_encode($row[autor_autores]).' - '.utf8_encode($row[editorial]).' - '.utf8_encode($row[plantel]).' - '.$row[ano].' - '.$row[estatus].'</option>';
							
						}	
					}else
					{//SI hay error 
						header("Location: consultaNoExitosaSuper.php");
					}
					//Modalidad de busqueda por autor
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
						header("Location: consultaNoExitosaSuper.php");
					}//Modalidad de busqueda por Dewey
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
						header("Location: consultaNoExitosaSuper.php");
					}
				}
				mysqli_close($conn);	
			?>
			 	</select>
			 	<!--Botones-->
                <input type="submit" value="Reservar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='ConsultaSuper.php'">
              </form>
            </div>
          
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>