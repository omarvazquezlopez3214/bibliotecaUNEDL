<?php
//Mantiene el inicio de sesion  
	@session_start();
	//manda a la pagina dependiendo el tipo de usuario
    if(!isset($_SESSION["matricula"])) 
	{
	header("Location: log-in.php");	
	}else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'A') 
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
	<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
    <title>Eliminados</title>
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
        	<div class="formulario">
			<!--Contenido del body-->
			<h1>Datos del libro</h1>
			<br />
			<p>Id-CodigoDewey-Titulo-Autor-Plantel-Matricula-Nombre</p>
			 <form action="#" method="post">
			 	<select id="librosConsulta" name="consultaLibros" class="contenedor-form" required>
			 		<option value="">Libros eliminados: </option>
			<?php
			//Revisa la conexion a la BDD
			    include("conexionbdd.php");
				if($conn->connect_error)
				{
					die("<br /> Fallo el intento de conexión a la base de datos: "
				 								.$conn->connect_error . "<br />");
				} 
//Hace un select de la tabla de "Eliminados" y regresa la informacion en una lista
					$validarEliminados = "SELECT * FROM eliminados";
					if($result = $conn ->query($validarEliminados))
					{
						while($row = mysqli_fetch_array($result))
						{
							echo '<option value ="'.$row[Id_libro].'"> '.$row[Id_libro].' - '.$row[codigo_dewey].' - '.$row[titulo].' - '.$row[autor].' - '.$row[plantel].'-'.$row[matricula].'-'.$row[nombre].'-'.$row[fecha_eliminacion].'</option>';
						}	
					}else
					{
						
					}
					
				
				mysqli_close($conn);	
			?>
			 	</select>
                <!--Boton para Regresar-->
                <input type="button" value="Regresar" onclick="location.href='MenuSuperUsuario.php'">
              </form>
            </div>
          
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>