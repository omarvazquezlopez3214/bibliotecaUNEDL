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
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Baja libros</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
		<link href="css/estilos2.css" rel="stylesheet" type="text/css" />
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
                    <li><a href="#">Libros</a>
                    	<ul class="submenu">
                    		<li><a href="altalibro.php">Dar de alta</a></li>
                    		<li><a href="bajalibro.php">Dar de baja</a></li>
                    	</ul>
                    </li>
                    <li><a href="ConsultaAdmin.php">Consultar Libro</a></li>
                    <li><a href="reservados.php">Reservados</a></li>
                    <li><a><?php echo $_SESSION["usuario"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			</header>
		<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$id=$_GET['Id'];
	
	$validarid = "SELECT * FROM libros WHERE id = '".$id."' ";
	if($resultado = $conn->query($validarid))
	{
		$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);	
	}else
	{
		header("Location: noexitoAceptarBaja.php");
	}
	mysqli_close($conn);
?>
<div class="contenedor-form">
			 <div>
			 <h1>Baja de Libros</h1>
			 <h4>Datos del libro para dar de baja.</h4>
			 <br />
			 <form action="aceptarBaja.php" method="post">
                <input type="text" name="Id" value="<?php echo $row['id']; ?>" readonly required>
                
                <input type="text" name="Titulo" value="<?php echo $row['titulo']; ?>" readonly required>
                
                <input type="text" name="Autor" value="<?php echo $row['autor_autores']; ?>" readonly required>

                <input type="text" name="Editorial" value="<?php echo $row['editorial']; ?>" readonly required>

                <input type="text" name="Ano" value="<?php echo $row['ano']; ?>" readonly required>

                <input type="text" name="Plantel" value="<?php echo $row['plantel']; ?>" readonly required>
                
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='bajalibro.php'">
				</form>
            </div>
		</div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>