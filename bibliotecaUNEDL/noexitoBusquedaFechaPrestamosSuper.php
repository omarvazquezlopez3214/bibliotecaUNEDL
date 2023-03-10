<?php
//Mantiene el inicio de sesion y manda a la pagina dependiendo el tipo de usuario
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
<head> <!--Head de la pagina y sus estilos-->
    <meta charset="UTF-8">
    <title>No exito persona con prestamos</title>
    <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
	<header> <!--Header donde se encuentra el logo y los estilos-->
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
			<!--Menu de navegacion Super Usuario--> 
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
			 </nav> <!--Cintilla debajo del menu de navegacion-->
			 <div class="cinta"></div>
			</header>
	<div class="contenedor-form">
	<div class="registroexitoso">
	<br />
    <!--Contenido del body-->
	<h3>LA FECHA NO COINCIDE CON NINGUN REGISTRO.</h3>
	<br />
	<h3>Regresar.</h3>
	<br />
	</div>
    <!--Boton-->
	<div class="logo">
		<a href="DatosDeLibrosPrestamosSuper.php"><img src="img/regresar.png" width="120" height="120" /></a>
	</div>
	<br />
	</div>
</body>
</html>