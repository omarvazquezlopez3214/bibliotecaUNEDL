<?php
	@session_start();
?>
<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$consulta = $_POST['consultaLibros'];
	
	$sqlestado = "SELECT * FROM libros WHERE id = '".$consulta."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($fila['estatus'] != "DISPONIBLE")
	{
		header("Location: noexitoReservaLibro.php");
	}else
	{
	
	$sql = "INSERT INTO reservaLibros(id_libro, titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_reservacion) 
    VALUES ('".$fila['id']."','".$fila['titulo']."','".$fila['autor_autores']."','".$fila['plantel']."','".$fila['ano']."','".$_SESSION["nombre"]."','".$_SESSION["apellidos"]."','".$_SESSION["correoelectronico"]."' ,'".$_SESSION["matricula"]."','".$_SESSION["carrera"]."','".$_SESSION["telefono"]."', now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$consulta."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = 'RESERVADO' WHERE id = '".$consulta."'";
			$conn->query($sqlCambioEstatus);
			header("Location:exitoReservaLibro.php");
		}
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	mysqli_close($conn);
	}
?>