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
    else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'D') 
    {
        header("Location: MenuSuperUsuario.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="Expires" content="0" >
    <title>Alta de Libros</title>
    <link rel="stylesheet" href="css/estilos.css" />
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
                    <li><a href="MenuAdmin.php">Inicio</a></li>
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
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
				</ul>
			 </nav>
			 <div class="cinta"></div>
			</header>
		<div class="contenedor-form">
			 <div class="toggle2">
             <span></span>
        	 </div>
        	<div class="formulario">
			<h1><a style="font-family: Calibri">Alta de Libros</h1>
			<br />
			<h2 style="font-family: Calibri">Datos principales</h2>
			<h4 style="font-family: Calibri">(*) Campos obligatorios</h4>
			 <form action="altaLibros.php" method="post" id="altalibros">
			 	
			 	<input type="number" name="Id" placeholder="ID *" required>
			 	
                <input type="text" name="Dewey" placeholder="Dewey (Ej. 330 DES)*" maxlength="7" required>
                
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
