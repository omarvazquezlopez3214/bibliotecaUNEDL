<?php
	@session_start();
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
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Baja bibliotecarios</title>
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
						<img src="img/unedl2.png" alt="" />
						
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
			</header>
		<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$matricula=$_GET['Matricula'];
	
	$validarid = "SELECT * FROM usuarios WHERE matricula = '".$matricula."' ";
	if($resultado = $conn->query($validarid))
	{
		$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		if(!$row['matricula'] == $matricula )
		{
			header("Location: noexitoAceptarBajaSuperBibliotecario.php");
		}	
	}else
	{
		
	}
	mysqli_close($conn);
?>
<div class="contenedor-form">
			 <div>
			 <h1>Baja de bibliotecarios</h1>
			 <h4>Datos del bibliotecario para dar de baja.</h4>
			 <br />
			 <form action="aceptarBajaSuperBibliotecario.php" method="post">
                <input type="text" name="Id" value="<?php echo $row['id_usuario']; ?>" readonly required>
                
                <input type="text" name="Nombre" value="<?php echo $row['nombre']; ?>" readonly required>
                
                <input type="text" name="Apellidos" value="<?php echo $row['apellidos']; ?>" readonly required>

                <input type="text" name="Correo_electronico" value="<?php echo $row['correo_electronico']; ?>" readonly required>

                <input type="text" name="Matricula" value="<?php echo $row['matricula']; ?>" readonly required>

                <input type="text" name="Carrera" value="<?php echo $row['carrera']; ?>" readonly required>

                 <input type="text" name="Telefono" value="<?php echo $row['telefono']; ?>" readonly required>

                  <input type="text" name="Fecha_registro" value="<?php echo $row['fecha_registro']; ?>" readonly required>
                
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='bajabibliotecario.php'">
				</form>
            </div>
		</div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>