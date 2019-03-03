<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$name=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$pass=$_POST['contrasena'];
	$email=$_POST['correo'];
	$matri=$_POST['matricula'];
	$licenciatura=$_POST['carrera'];
	$telefono=$_POST['telefono'];

	$validarcorreo = "SELECT correo_electronico FROM usuarios WHERE correo_electronico = '".$email."'";
	$re = $conn->query($validarcorreo);
	$fil = mysqli_num_rows($re);
	if($fil == 1 && preg_match("/^([0-9]{2}[A|B][L])[0-9]{7}$/", $matri) || preg_match("/^([0-9]){3,5}$/", $matri))
	{
		header("Location: noexitoCorreoElectronico.php");
	}else{

	$validarmatricula = "SELECT matricula FROM usuarios WHERE matricula = '".$matri."' ";
	$result = $conn->query($validarmatricula);
	$fila = mysqli_num_rows($result);
	if($fila == 1 && preg_match("/^([0-9]{2}[A|B][L])[0-9]{7}$/", $matri) || preg_match("/^([0-9]){3,5}$/", $matri))
	{
		header("Location: noexitoMatricula.php");
	}else if ($fila == 1 && preg_match("/^([B][I])[0-9]{3}$/", $matri)) {
		header("Location: noexitoMatriculaSuper.php");
	}else{
	
	if(preg_match("/^([0-9]{2}[A|B][L])[0-9]{7}$/", $matri))
	{
		$tipousuario='A'; //Alumno 	
	}else if(preg_match("/^([0-9]){1,5}$/", $matri))
		{
			$tipousuario='B'; //Maestro
		}else if(preg_match("/^([B][I])[0-9]{3}$/", $matri))
		{
			$tipousuario = 'C';
		}
	if($tipousuario == 'B')
	{
		$licenciatura = "Colaborador";
	}else if ($tipousuario == 'C') {
		$licenciatura = "Bibliotecario";
	}

	$sql = "INSERT INTO usuarios(nombre, apellidos, contrasena, correo_electronico, matricula, carrera, telefono , tipo_usuario, fecha_registro) 
	VALUES ('".$name."','".$apellidos."','".$pass."','".$email."','".$matri."','".$licenciatura."','".$telefono."','".$tipousuario."',now())";
	$conn->query ($sql);
    //Se ejecuta la sentencia de query
	if($tipousuario == 'C')
	{
		header("Location:exitoregbibliotecario.php");
	}else if($tipousuario == 'A' || $tipousuario == 'B')
	{
		header("Location:exitoreg.html");
	}
	else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
				}
			
		}
}
	mysqli_close($conn);
?>