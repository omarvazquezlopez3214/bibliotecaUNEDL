<?php //inicia la sesion
	@session_start();
?>
<?php
//Incluye la conexion a la base de datos y si falla manda un mensaje que fallo la conexion a la base de datos.
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$consulta = $_POST['consultaLibros'];
	//Query donde realiza una busqueda en la tabla libros donde el identificador sea igual al $consulta
	$sqlestado = "SELECT * FROM libros WHERE id = '".$consulta."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	//si el estatus es diferente de disponible e igual a consulta interna mandara al no exito de reserva ya que no se puede realizar esta operacion
	if($fila['estatus'] != "DISPONIBLE" || $fila['estatus'] == "CONSULTA INTERNA")
	{
		header("Location: noexitoReservaLibroSuper.php");
	}else
	{
		//query donde inserta en la tabla reservalibros el libro que el usuario reservo
	$sql = "INSERT INTO reservalibros(id_libro, titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_reservacion) 
    VALUES ('".$fila['id']."','".$fila['titulo']."','".$fila['autor_autores']."','".$fila['plantel']."','".$fila['ano']."','".$_SESSION["nombre"]."','".$_SESSION["apellidos"]."','".$_SESSION["correoelectronico"]."' ,'".$_SESSION["matricula"]."','".$_SESSION["carrera"]."','".$_SESSION["telefono"]."', now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$consulta."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{//cambia el estatus del libro de disponible a reservado
			$sqlCambioEstatus = "UPDATE libros SET estatus = 'RESERVADO' WHERE id = '".$consulta."'";
			$conn->query($sqlCambioEstatus);
			header("Location:exitoReservaLibroSuper.php");
		}
	}else//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}

	mysqli_close($conn);
	}
?>