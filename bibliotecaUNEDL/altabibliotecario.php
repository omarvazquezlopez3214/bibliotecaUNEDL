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
    else if(isset($_SESSION["matricula"]) && $_SESSION["tipousuario"] == 'C') 
    {
        header("Location: MenuAdmin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0" >
    <title>Alta bibliotecario UNEDL</title>
    <link rel="stylesheet" href="css/estilos.css" />
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
                    <li><a class="face" href=""><img src="img/ico-directorio-3.png" alt="" /></a></li>
                </ul>
             </nav>
             <div class="cinta">
                
            </div>
            </header>
    <div class="contenedor-form">
        <div class="toggle2">
        </div>
        <div class="formulario">
            <h2>Crear cuenta de bibliotecarios</h2>
            <h4>Pasar cursor encima del campo 
            	para checar requerimientos.</h4>
            <h4>(*) Campos obligatorios</h4>	
            	<br />
            <form id="registro" action="insertarRegistro.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre *"
                maxlength="50" pattern="[A-Za-z]*" required>
                
                <input type="text" name="apellidos" placeholder="Apellidos *" 
                maxlength="50" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$" required>
                
                <input type="password" name="contrasena" placeholder="Contraseña *" 
                maxlength="50" required pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
                title="La contraseña debe comenzar con una letra mayuscula o minuscula y contener al menos un dígito, sin carácteres extraños [$%-%^@] y sin espacios con un minimo de 8 caracteres y un maximo de 15">
                
                <input type="email" name="correo" placeholder="Correo Electronico *" 
                maxlength="50" required>
                
                <input type="text" id="matri" name="matricula" placeholder="Matrícula o Numero de colaborador *" 
                maxlength="50" pattern="*[A-Za-z0-9]" required title="Solo letras y números">

                <p>Por favor presionar el boton para validar la matrícula.</p>
            
                <input class = "bibliotecario" type="button" value="Validar Matrícula" formnovalidate>

                <br />
                <div id="noexiste" style="display: none">;
                <h4>No es una matricula valida</h4>;
                </div>

                <select id="carre" style="display: none" class="contenedor-form" name="carrera" title="Selecciona una carrera" required> 
                	<option value="">Selecciona plantel *</option>
                	<option value="Nutricion">Nutricion</option>
                	<option value="Centro Universitario">Centro Universitario</option>
                	<option value="Derecho">Derecho</option>
                	<option value="Gastronomia">Gastronomia</option>
                    <option value="Preparatoria">Preparatoria</option>
                	</select><br /> <br />
                	<input type="tel" name="telefono" placeholder="Teléfono *"
                pattern="[0-9]{10}" required>
                	<input type="submit" value="Registrar"> <br /> <br />
                	<input type="submit" value="Cancelar" onclick="location.href='MenuSuperUsuario.php'">
                    </form>
        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>