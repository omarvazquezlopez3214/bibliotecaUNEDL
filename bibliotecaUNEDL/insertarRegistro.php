<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$user=$_POST['usuario'];
	$name=$_POST['nombre'];
	$pass=$_POST['contrasena'];
	$email=$_POST['correo'];
	$matri=$_POST['matricula'];
	$licenciatura=$_POST['carrera'];
	$telefono=$_POST['telefono'];

	$validarcorreo = "SELECT correo_electronico FROM usuarios WHERE correo_electronico = '".$email."'";
	$re = $conn->query($validarcorreo);
	$fil = mysqli_num_rows($re);
	if($fil == 1)
	{
		header("Location: noexitoCorreoElectronico.php");
	}else{

	$validarmatricula = "SELECT matricula FROM usuarios WHERE matricula = '".$matri."' ";
	$result = $conn->query($validarmatricula);
	$fila = mysqli_num_rows($result);
	if($fila == 1)
	{
		header("Location: noexitoMatricula.php");
	}else{


	$validarUsuario = "SELECT usuario FROM usuarios WHERE usuario = '".$user."' ";
	$resultado = $conn->query($validarUsuario);
	$row = mysqli_num_rows($resultado);
	if( $row == 1)
	{
		header("Location: noexitoUsuario.php");
	}else
	{
	
	if(preg_match("/^([0-9]{2}[A|B][L])[0-9]{7}$/", $matri))
	{
		$tipousuario='A'; //Alumno 	
	}else
		{
			$tipousuario='B'; //Maestro
		}
	if($tipousuario == 'B')
	{
		$licenciatura = "Maestro o colaborador";
	}

	$sql = "INSERT INTO usuarios(usuario, nombre_completo, contrasena, correo_electronico, matricula, carrera, telefono , tipo_usuario) 
	VALUES ('".$user."','".$name."','".$pass."','".$email."','".$matri."','".$licenciatura."','".$telefono."','".$tipousuario."')";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		header("Location:exitoreg.html");
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
				}
			}
		}
}
	mysqli_close($conn);
?>