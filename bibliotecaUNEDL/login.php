<?php
//Incluye la conexion a la base de datos y si falla manda un mensaje que fallo la conexion a la base de datos
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	$matricula_colaborador = $_POST['mn'];
	$contrasena = $_POST['pa'];
	//query donde valida la matricula y la contraseña en la bdd
	$consultaUsuario = "SELECT * FROM usuarios WHERE matricula = '$matricula_colaborador' AND contrasena = '$contrasena'";
	$result = $conn ->query($consultaUsuario);
	if($result -> num_rows > 0)
	{
		while($row = mysqli_fetch_array($result))
		{//inicia la sesion con las vaariables
			@session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION["nombre"]=$row["nombre"];
			$_SESSION["idusuario"]=$row["id_usuario"];
			$_SESSION["apellidos"]=$row["apellidos"];
			$_SESSION["correoelectronico"]=$row["correo_electronico"];
			$_SESSION["matricula"]=$row["matricula"];
			$_SESSION["carrera"]=$row["carrera"];
			$_SESSION["telefono"]=$row["telefono"];
			$_SESSION["tipousuario"]=$row["tipo_usuario"];
			//depende el tipo de usuario mandara al menu necesario
			if($_SESSION["tipousuario"] == 'A' || $_SESSION["tipousuario"] == 'B')
			{
				header("Location: MenuUsuario.php");
			}else if($_SESSION["tipousuario"] == 'C')
			{
				header("Location: MenuAdmin.php");
			}else
			{
				header("Location: MenuSuperUsuario.php");
			}
		}
	}else//si entra aqui es por que no se ingreso correctamente algo
	{
		header("Location: noexitoLogIn.php");	
	}
?>