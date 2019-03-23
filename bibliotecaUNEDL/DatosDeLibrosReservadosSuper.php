<?php
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
	<head>
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Personas con libros reservados</title>
		<meta name="description" content="">
		<meta name="author" content="Omar">
		<link href="css/estilos.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">  
   		<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
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
			 <div class="cinta"></div>
		</header>
		<div class="contenedor-form">
            <div class="toggle2">
                </div>
            <div class="formulario">
				<br />
				<h1>Reservaciones de libros</h1>
   			<br />
    		<form action="buscarPorFechasSuper.php" method="post">
               <h3>Fecha Inicio</h3>
               <input type="date" name="start_date" id="start_date" required title="Selecciona una fecha." class="form-control" /><br />
               <h3>Fecha Fin</h3>
               <input type="date" name="end_date" id="end_date" required title="Selecciona una fecha." class="form-control" /><br />
               
            <input type="submit" name="search" id="search" value="Buscar" class="btn btn-info active"/><br /><br />
            <input type="button" value="Cancelar" class="btn btn-info active" onclick="location.href = 'reservadossuper.php'"> 
            
			</form>
            </div>
		</div>

    	<script src="js/jquery-3.1.1.min.js"></script>    
    	<script src="js/main.js"></script>
    	<script src="bootstrap-3.3.7/js/jQuery-2.1.4.min.js"></script>
    	<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
