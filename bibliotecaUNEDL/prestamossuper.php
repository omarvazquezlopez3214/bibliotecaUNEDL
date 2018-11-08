<?php
	@session_start();
	if(!isset($_SESSION["matricula"])) 
	{
		header("Location: log-in.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
    <title>Personas con libros prestados</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
		<body>
			<header>
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
			
				<ul class="menu-navegacion">
                    <li><a href="#">Libros</a>
                    	<ul class="submenu">
                    		<li><a href="altalibrosuper.php">Dar de alta</a></li>
                    		<li><a href="bajalibrosuper.php">Dar de baja</a></li>
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
			<br /><br />
			<div class="contenedor-form">
			<div class="toggle">
				<span>Buscar Todos</span>
        	</div>
        	<div class="formulario">
			<br />
			<h1>Prestamos de libros</h1>
			<p>Si quieres obtener todas los prestamos de libros, solo presiona el boton de "Buscar todos".</p>
			<br />
			 <form action="DatosPersonasPrestamosSuper.php" method="get">
                <input id="usuario" type="text" name="matricula" placeholder="Escriba la matricula del alumno *" required>

                <input type="submit" value="Buscar por persona"> <br /> <br />
                
                <input type="submit" value="Cancelar" onclick="location.href = 'MenuSuperUsuario.php'">
              </form>
            </div>
            <div class="formulario">
			<br />
			<h1>Prestamos de libros</h1>
			<p>Si quieres obtener todas los prestamos de libros, solo presiona el boton de "Buscar todos".</p>
			<br />
			 <form action="DatosPersonasPrestamosTodosSuper.php" method="get">

                <input type="submit" value="Buscar todos"> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href = 'MenuSuperUsuario.php'">
              </form>
            </div>
          
		</div>
            <br />
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>