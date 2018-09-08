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
	<meta charset="UTF-8">
	<meta http-equiv="Expires" content="0" >
    <title>Alta de Libros</title>
    <link rel="stylesheet" href="css/estilos.css" />
	    <link rel="stylesheet" href="css/estilos2.css" />
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
		<div class="contenedor-form">
			 <div class="toggle2">
             <span></span>
        	 </div>
        	<div class="formulario">
			<h1>Alta de Libros</h1>
			<br />
			<h2>Datos principales</h2>
			<h4>(*) Campos obligatorios</h4>
			 <form action="altaLibros.php" method="post" id="altalibros">
			 	
			 	<input type="number" name="Id" placeholder="ID *" required>
			 	
                <input type="text" name="Dewey" placeholder="Código Dewey *" maxlength="7" required>
                
                <input type="text" name="Titulo" placeholder="Título del libro *" maxlength="150" required>
                
                <input type="text" name="Autor" placeholder="Autor(es) *" maxlength="150" required>
                
                <input type="text" name="Editorial" placeholder="Editorial *" maxlength="50" required>
                
                <input type="text" name="Lugar" placeholder="Lugar de edición" maxlength="100" >
                
                <input type="number" name="Ano" placeholder="Año *" maxlength="15" required>
                
                <input type="text" name="Plantel" placeholder="Plantel *" maxlength="50" required>
                
                <input type="text" name="Material" placeholder="Tipo de material *" maxlength="50" required>
                
                <input type="text" name="Procedencia" placeholder="Procedencia *" maxlength="15" required>
                
                <input type="text" name="Comentario" placeholder="Comentario adicional" maxlength="200" >
                
                <select class="contenedor-form" name="Estatus" title="Seleccione Estatus" required>
                	<option value="">Seleccione Estatus *</option>
                	<option value="DISPONIBLE">Disponible</option>
                	<option value="CONSULTA INTERNA">Consulta Interna</option>
                	<option value="RESERVADO">Reservado</option>
                </select> <br /> <br />
                
                
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="submit" value="Cancelar" onclick="location.href='MenuAdmin.php'">
              </form>
            </div>
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>
