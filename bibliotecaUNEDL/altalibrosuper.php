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
<!--Head de la pagina y sus estilos-->
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="Expires" content="0" >
    <title>Alta de Libros</title>
    <link rel="stylesheet" href="css/estilos.css" />
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
		<div class="contenedor-form">
			 <div class="toggle2">
             <span></span>
        	 </div>
        	<div class="formulario">
			<h1><a style="font-family: Calibri">Alta de Libros</h1>
			<br />
            <!--Formulario para dar de alta un libro-->
			<h2>Datos principales</h2>
			<h4>(*) Campos obligatorios</h4>
			 <form action="altaLibrosSuper.php" method="post" id="altalibros">
			 	
			 	<input type="number" name="Id" placeholder="ID *" required>
			 	
                <input type="text" name="Dewey" placeholder="Dewey (Ej. 330 DES) *" maxlength="7" required>
                
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
                	<!--Lista de disponibilidad de un libro-->
                    <option value="">Seleccione Estatus *</option>
                	<option value="DISPONIBLE">Disponible</option>
                	<option value="CONSULTA INTERNA">Consulta Interna</option>
                	<option value="RESERVADO">Reservado</option>
                </select> <br /> <br />
                
                <!--Botones-->
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="submit" value="Cancelar" onclick="location.href='MenuSuperUsuario.php'">
              </form>
            </div>
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
	</body>
</html>
