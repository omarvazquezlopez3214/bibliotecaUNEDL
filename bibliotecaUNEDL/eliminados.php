<?php
	@session_start();
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
	<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
    <title>Eliminados</title>
    <link rel="stylesheet" href="css/estilos.css">
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
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
			
		<div class="contenedor-form">
			<div class="toggle2">
        	</div>
        	<div class="formulario">
			
			<h1>Datos del libro</h1>
			<br />
			<p>Id-CodigoDewey-Titulo-Autor-Plantel-Matricula-Nombre</p>
			 <form action="#" method="post">
			 	<select id="librosConsulta" name="consultaLibros" class="contenedor-form" required>
			 		<option value="">Libros eliminados: </option>
			<?php
			    include("conexionbdd.php");
				if($conn->connect_error)
				{
					die("<br /> Fallo el intento de conexión a la base de datos: "
				 								.$conn->connect_error . "<br />");
				} 

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
                
                <input type="button" value="Regresar" onclick="location.href='MenuSuperUsuario.php'">
              </form>
            </div>
          
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>