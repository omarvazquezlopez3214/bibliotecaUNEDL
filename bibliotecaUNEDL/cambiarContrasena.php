<?php
//Incluye la conexion a la base de datos y si falla manda un mensaje que fallo la conexion a la base de datos
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$matricula=$_POST['matricula'];
	$newContrasena =$_POST ['newPassword'];
//query para validar la matricula de la tabla de usuarios
	$validarmatricula = "SELECT * FROM usuarios WHERE matricula = '".$matricula."'";
	$resultado = $conn->query($validarmatricula);
	$row = mysqli_num_rows($resultado);
	if($row == 1)
	{//hace un update con la nueva contrasea que el usuario ingresara
		$cambiarcontrasena = "UPDATE usuarios SET contrasena = '".$newContrasena."' WHERE matricula = '".$matricula."'";// si se hace el cambio correctamente manda el exito de cambiar contraseña
		$conn->query($cambiarcontrasena);
		header("Location:exitoNewPassword.html");
	}else
	{//si no se haace el cambio manda aqui
		header("Location: noexitoCambiarContrasena.php");
	}
	mysqli_close($conn);
?>