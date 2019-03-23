<?php
//Mantiene el inicio de sesion  
	@session_start();
	//manda a la pagina dependiendo el tipo de usuario
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
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Baja libros</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<!--Header donde se encuentra el logo y los estilos-->
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
		<?php
		//Recupera las variables al formulario para saber si es ese el libro
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
		header("Location: noexitoAceptarBajaSuper.php");
	}
	mysqli_close($conn);
?>
<div class="contenedor-form">
	<div class="toggle2">
             <span></span>
        	 </div>
        	 <!--Contenido del body y la informacion-->
			 <div class="formulario">
			 <h1>Baja de Libros</h1>
			 <h4>Datos del libro para dar de baja.</h4>
			 <br />
			 <!--Muestra los datos recuperados de la BDD-->
			 <form action="aceptarBajaSuper.php" method="post">
                <input type="text" name="Id" value="<?php echo $row['id']; ?>" readonly required>
                
                <input type="text" name="Titulo" value="<?php echo $row['titulo']; ?>" readonly required>
                
                <input type="text" name="Autor" value="<?php echo $row['autor_autores']; ?>" readonly required>

                <input type="text" name="Editorial" value="<?php echo $row['editorial']; ?>" readonly required>

                <input type="text" name="Ano" value="<?php echo $row['ano']; ?>" readonly required>

                <input type="text" name="Plantel" value="<?php echo $row['plantel']; ?>" readonly required>
                <!--Botones-->
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='bajalibrosuper.php'">
				</form>
			</div>
            </div>
		</div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>