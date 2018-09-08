<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$usuario=$_POST['usuario'];
	$newContrasena =$_POST ['newPassword'];

	$validarusuario = "SELECT * FROM usuarios WHERE usuario = '".$usuario."'";
	$resultado = $conn->query($validarusuario);
	$row = mysqli_num_rows($resultado);
	if($row == 1)
	{
		$cambiarcontrasena = "UPDATE usuarios SET contrasena = '".$newContrasena."' WHERE usuario = '".$usuario."'";
		$conn->query($cambiarcontrasena);
		header("Location:exitoNewPassword.html");
	}else
	{
		header("Location: noexitoCambiarContrasena.php");
	}
	mysqli_close($conn);
?>