<?php
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
    <meta charset="UTF-8">
    <title>Página reserva libro exitosa</title>
    <link rel="stylesheet" href="css/estilos.css" />
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
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="consulta.php">Consultar libro</a></li>
                    <li><a href="MenuUsuario.php">Inicio</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
			<div class="contenedor-form">
				<div class="registroexitoso">
				<br />
				<h3>NO EXISTE EL LIBRO QUE QUIERES CONSULTAR</h3>
				<p>CONSULTA OTRO LIBRO</p>
				<br />
				<h3>Menu principal.</h3>
				</div>
				<div class="logo">
				<a href="MenuUsuario.php"><img src="img/casa.png" width="120" height="120" /></a> <!--AQUI VA LA PAGINA DE MENU EN VES DE INDEX.HTML-->
				</div>
				<br />
				<div class="registroexitoso">
    			<h3>Consultar otro libro</h3>
				</div>
				<div class="logo">
				<a href="consulta.php"><img src="img/regresar.png" width="120" height="120" /></a>
				</div>
				<br />
			</div>
</body>
</html>