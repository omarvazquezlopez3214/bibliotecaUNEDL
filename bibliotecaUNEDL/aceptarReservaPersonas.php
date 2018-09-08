<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$personaReserva = $_POST['personaLibrosEnReserva'];
	
	$sqlestado = "SELECT * FROM libros WHERE id = '".$personaReserva."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($fila['estatus'] == "RESERVADO")
	{
	$sqlreservalibro = "SELECT * FROM reservalibros WHERE id_libro = '".$personaReserva."'";
	$resultado = $conn->query($sqlreservalibro);
	$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	
	
	$sql = "INSERT INTO devolucionlibros(id_libro,titulo, autor, editorial, ano, usuario, nombre_completo , correo_electronico, matricula, carrera, telefono, fecha_devolucion) 
    VALUES ('".$row['id_libro']."','".$row['titulo']."','".$row['autor']."','".$row['editorial']."','".$row['ano']."','".$row['usuario']."','".$row['nombre_completo']."','".$row['correo_electronico']."' ,'".$row['matricula']."','".$row['carrera']."','".$row['telefono']."', now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaReserva."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = 'PRESTAMO' WHERE id = '".$personaReserva."'";
			$conn->query($sqlCambioEstatus);
			$sqlBorrarReserva = "DELETE FROM reservalibros WHERE id_libro = '".$personaReserva."'";
			$conn->query($sqlBorrarReserva);
			header("Location:exitoPrestamoLibro.php");
		}
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}else
	{
	header("Location: noexitoPrestamoLibro.php");
	}
	mysqli_close($conn);
?>