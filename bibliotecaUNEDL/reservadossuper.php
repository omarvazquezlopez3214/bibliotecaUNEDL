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
    <title>Personas con libros reservados</title>
    <link rel="stylesheet" href="css/estilos.css">
    </head>
        <body>
            <header>  <!--Header donde se encuentra el logo y los estilos-->
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
            <br /><br />
            <div class="contenedor-form">
            <div class="toggle3">
            </div>
            <div class="formulario">
            <br />
            <h1>Reservaciones de libros</h1>
            <p>Introduce la matricula del alumno o colaborador.</p>
            <br />
            <!--Formulario-->
             <form action="DatosPersonasReservadasSuper.php" method="get">
                <!--aqui se ingresa la matricula del usuario-->
                <input id="usuario" type="text" name="matricula" placeholder="Escriba la matricula del alumno *" required>
                <div> <!--botones para hacer la busqueda-->
                <input type="submit" value="Buscar por persona" > <br /> <br />
                <input type="button" value="Buscar por fechas" onclick="location.href = 'DatosDeLibrosReservadosSuper.php'">
                <input type="button" value="Cancelar" onclick="location.href = 'MenuSuperUsuario.php'">
                </div>
              </form>
            </div>
            
            <br />
        </div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>

</body>
</html>