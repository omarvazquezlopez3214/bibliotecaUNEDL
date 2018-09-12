<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$matricula=$_POST['matricula'];
	$newContrasena =$_POST ['newPassword'];

	$validarmatricula = "SELECT * FROM usuarios WHERE matricula = '".$matricula."'";
	$resultado = $conn->query($validarmatricula);
	$row = mysqli_num_rows($resultado);
	if($row == 1)
	{
		$cambiarcontrasena = "UPDATE usuarios SET contrasena = '".$newContrasena."' WHERE matricula = '".$matricula."'";
		$conn->query($cambiarcontrasena);
		header("Location:exitoNewPassword.html");
	}else
	{
		header("Location: noexitoCambiarContrasena.php");
	}
	mysqli_close($conn);
?>