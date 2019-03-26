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
		<header> <!--Header donde se encuentra el logo y los estilos-->
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
            <div class="toggle2">
                </div>
            <div class="formulario">
				<br />
				<h1>Reservaciones de libros</h1>
   			<br />
    		<form action="aceptarReservaPersonasSuper.php" method="post">
    			 <div style="text-align: center;">
      			 	<select id="personaReservaLibro" name="personaLibrosEnReserva" class="contenedor-form" required>
      			 		<?php
			 		echo '<option value="">Seleccione un libro reservado del usuario:</option>';
			 		include("conexionbdd.php");
					if($conn->connect_error)
					{
						die("<br /> Fallo el intento de conexión a la base de datos: "
					 								.$conn->connect_error . "<br />");
					}
                    //Query donde se busca en la BDD en base a la fecha que se ingreso
					$startDate = $_POST['start_date'];
					$endDate = $_POST['end_date'];

					$fecha = "SELECT * FROM reservalibros WHERE DATE(fecha_reservacion) BETWEEN '$startDate' AND '$startDate'";
                    $re = $conn->query($fecha);
                    $fil = mysqli_num_rows($re);
                    //se regresan los datos del libro y del usuario si lo encuentra en la BDD
					if($fil > 0)
					{

						while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
						{
						echo '<option value ="'.$row[id_libro].'">'.$row[titulo].' - '.$row[autor].' - '.$row[plantel].' - '.$row[nombre].' - '.$row[apellidos].' - '.$row[correo_electronico].' - '.$row[matricula].' - '.$row[carrera].' - '.$row[telefono].' - '.$row[fecha_reservacion].'</option>';
						}	
					}else
					{ //si falla manda a no exito
						header("noexitoBusquedaFechaSuper.php");
					}

					mysqli_close($conn);
					
			 		?>
      			 	</select>
           </div> <!--Botones-->
                <input type="submit" value="Aceptar "> <br /> <br />
                
                <input type="button" value="Cancelar" onclick="location.href='reservadossuper.php'">
			</form>
		</div>
	</div>

    	<script src="js/jquery-3.1.1.min.js"></script>    
    	<script src="js/main.js"></script>
    	<script src="bootstrap-3.3.7/js/jQuery-2.1.4.min.js"></script>
    	<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>