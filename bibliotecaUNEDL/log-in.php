<!DOCTYPE html>
<html lang="en">
<head> <!--Head de la pagina y sus estilos-->
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0" >
    <title>Login Biblioteca UNEDL</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                    </div>
                    <div class="icono-menu">
                        <a href="#" id="btn-menu" class="btn-menu"><samp class="fa fa-bars"></samp></a>
                    </div>
                </div>
              </div>
            <!--Menu de navegacion--> 
                <ul class="menu-navegacion">
                    <li><a href="http://buzon.unedl.edu.mx/indexbzn.html">Contacto</a></li>
                    <li><a href="MenuPrincipal.php">Inicio</a></li>
                    <li><a href="log-in.php">Inicia Sesión o Registrate</a></li>
                </ul>
             </nav> <!--Cintilla debajo del menu de navegacion-->
             <div class="cinta"> 
            </div>
            </header>
            <!--Formulario para crear cuenta-->
    <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        <!---->
        <div id="logi" class="formulario">
            <h2>Inicia Sesión</h2>
            <form action="login.php" method="post">
                <input type="text" name="mn" placeholder="Matrícula o Número de colaborador" required>
                <input type="password" name="pa" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión"> <br /> <br />
                <input type="submit" value="Cancelar" onclick="location.href= 'MenuPrincipal.php'">
            </form>
        </div>
        <!--Formulario para llenar con los datos requeridos-->
        <div class="formulario">
            <h2>Crea tu Cuenta</h2>
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
                <div id="resultado"></div>

                <select id="carre" style="display: none" class="contenedor-form" name="carrera" title="Selecciona una carrera" required>
                    <!--Los distintos programas academicos que tiene la universidad-->
                	<option value="">Seleccionar Programa Académico *</option>
                	<option value="Nutricion">Nutricion</option>
                	<option value="Psicologia">Psicologia</option>
                	<option value="Administracion de Empresas">Administracion de Empresas</option>
                	<option value="Arquitectura">Arquitectura</option>
                	<option value="Ciencias de la Comunicacion">Ciencias de la Comunicacion</option>
                	<option value="Contaduria Publica">Contaduria Publica</option>
                	<option value="Derecho">Derecho</option>
                	<option value="Diseño para la Comunicacion Grafica">Diseño para la Comunicacion Grafica</option>
                	<option value="Diseño Grafico y Digital">Diseño Grafico y Digital</option>
                	<option value="Gastronomia">Gastronomia</option>
                	<option value="Ingenieria de Software">Ingenieria de Software</option>
                	<option value="Mercadotecnia">Mercadotecnia</option>
                	<option value="Negocios Internacionales">Negocios Internacionales</option>
                	<option value="Turismo">Turismo</option>
                    <option value="Turismo">PosGrado</option>
                    <option value="Turismo">Preparatoria</option>
                	</select><br /> <br />
                	
                	<input type="tel" name="telefono" placeholder="Teléfono *"
                pattern="[0-9]{10}" required>
                <!--Botones-->
                	<input type="submit" value="Registrarse"> <br /> <br />
                	<input type="submit" value="Cancelar" onclick="location.href='log-in.php'">
                    </form>
        </div>
        <!-- formulario si se olvida la contraseña-->
        <div id="olvide-contra" class="reset-password">
            ¿Olvide mi Contraseña?
        </div>
        <div class="formulario2">
        	<h2>Recupera tu contraseña</h2>
        	<form id="recuperarPassword" action="recuperarContrasena.php" method="post">
        		<input type="email" name= "correo" placeholder="Correo Electronico *" required>
        		<input type="text" name= "matricula" placeholder="Matricula o Numero de colaborador *" required>
        		<!--boton-->
                <input type="submit" value="Enviar">
        	</form>
        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>