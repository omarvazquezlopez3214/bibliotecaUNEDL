<?php
//Incluye la conexion a la base de datos y si falla manda un mensaje que fallo la conexion a la base de datos.
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$personaReserva = $_POST['personaLibrosEnReserva'];
	//Query donde realiza una busqueda en la tabla libros donde el identificador sea igual al identificador de la persona
	$sqlestado = "SELECT * FROM libros WHERE id = '".$personaReserva."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($fila['estatus'] == "RESERVADO")
	{
	$sqlreservalibro = "SELECT * FROM reservalibros WHERE id_libro = '".$personaReserva."'";
	$resultado = $conn->query($sqlreservalibro);
	$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	
	//Inserta los valores en la tabla de Prestamo 
	$sql = "INSERT INTO prestamoslibros(id_libro,titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_prestamo) 
    VALUES ('".$row['id_libro']."','".$row['titulo']."','".$row['autor']."','".$row['plantel']."','".$row['ano']."','".$row['nombre']."','".$row['apellidos']."','".$row['correo_electronico']."' ,'".$row['matricula']."','".$row['carrera']."','".$row['telefono']."', now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaReserva."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{//cambia el estatus ha prestamo y elimina el libro de la tabla de reservados
			$sqlCambioEstatus = "UPDATE libros SET estatus = 'PRESTAMO' WHERE id = '".$personaReserva."'";
			$conn->query($sqlCambioEstatus);
			$sqlBorrarReserva = "DELETE FROM reservalibros WHERE id_libro = '".$personaReserva."'";
			$conn->query($sqlBorrarReserva);
			header("Location:exitoPrestamoLibroSuper.php");
		}
	}else//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}else//Si todo falla entonces muestra mensaje de no exito devolucion.
	{
	header("Location: noexitoPrestamoLibroSuper.php");
	}
	mysqli_close($conn);
?>