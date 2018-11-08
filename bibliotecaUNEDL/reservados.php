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
    <title>Personas con libros reservados</title>
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
						<a href="MenuAdmin.php" ></a>
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
                    <li><a href="prestamos.php">Prestamos</a></li>
                    <li><a><?php echo $_SESSION["nombre"]; ?></a></li>
                    <li><a href="logout.php">Cerrar sesion</a></li>
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
			<h1>Reservaciones de libros</h1>
			<p>Si quieres obtener todas las reservas de libros, solo presiona el boton de "Buscar todos".</p>
			<br />
			 <form action="DatosPersonasReservadas.php" method="get">
                <input id="usuario" type="text" name="matricula" placeholder="Escriba la matricula del alumno *" required>

                <input type="submit" value="Buscar por persona"> <br /> <br />
                
                <input type="submit" value="Cancelar" onclick="location.href = 'MenuAdmin.php'">
              </form>
            </div>
            <div class="formulario">
			<br />
			<h1>Reservaciones de libros</h1>
			<p>Si quieres obtener todas las reservas de libros, solo presiona el boton de "Buscar todos".</p>
			<br />
			 <form action="DatosPersonasReservadasTodos.php" method="get">

                <input type="submit" value="Buscar todos"> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href = 'MenuAdmin.php'">
              </form>
            </div>
          
		</div>
            <br />
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>