<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	$usuario = $_POST['us'];
	$contrasena = $_POST['pa'];
	
	
	$consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
	$result = $conn ->query($consultaUsuario);
	if($result -> num_rows > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			@session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION["usuario"]=$row["usuario"];
			$_SESSION["idusuario"]=$row["id_usuario"];
			$_SESSION["nombrecompleto"]=$row["nombre_completo"];
			$_SESSION["correoelectronico"]=$row["correo_electronico"];
			$_SESSION["matricula"]=$row["matricula"];
			$_SESSION["carrera"]=$row["carrera"];
			$_SESSION["telefono"]=$row["telefono"];
			$_SESSION["tipousuario"]=$row["tipo_usuario"];
			
			
			if($_SESSION["tipousuario"] == 'A' || $_SESSION["tipousuario"] == 'B')
			{
				header("Location: MenuUsuario.php");
			}else
			{
				header("Location: MenuAdmin.php");
			}
		}
	}else
	{
		header("Location: noexitoLogIn.php");	
	}
?>