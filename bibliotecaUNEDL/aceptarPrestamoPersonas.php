<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$personaPrestamo = $_POST['personaLibrosEnPrestamo'];
	$estatusPrestamo = $_POST['personaEstatusEnPrestamo'];
	
	$sqlestado = "SELECT * FROM libros WHERE id = '".$personaPrestamo."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($fila['estatus'] == "PRESTAMO")
	{
	$sqlprestamolibro = "SELECT * FROM prestamoslibros WHERE id_libro = '".$personaPrestamo."'";
	$resultado = $conn->query($sqlprestamolibro);
	$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

	if($estatusPrestamo == 'DISPONIBLE' || $estatusPrestamo == 'CONSULTA INTERNA')
	{
		$sql = "INSERT INTO devolucionlibros(id_libro,titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_devolucion) 
    VALUES ('".$row['id_libro']."','".$row['titulo']."','".$row['autor']."','".$row['plantel']."','".$row['ano']."','".$row['nombre']."','".$row['apellidos']."','".$row['correo_electronico']."' ,'".$row['matricula']."','".$row['carrera']."','".$row['telefono']."', now())";
    if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaPrestamo."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = '".$estatusPrestamo."' WHERE id = '".$personaPrestamo."'";
			$conn->query($sqlCambioEstatus);
			$sqlBorrarPrestamo = "DELETE FROM prestamoslibros WHERE id_libro = '".$personaPrestamo."'";
			$conn->query($sqlBorrarPrestamo);
			header("Location:exitoDevolucionLibro.php");
		}
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}elseif ($estatusPrestamo == 'RESERVADO') 
	{
		$sql = "INSERT INTO reservalibros(id_libro,titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_reservacion)
    VALUES ('".$row['id_libro']."','".$row['titulo']."','".$row['autor']."','".$row['plantel']."','".$row['ano']."','".$row['nombre']."','".$row['apellidos']."','".$row['correo_electronico']."' ,'".$row['matricula']."','".$row['carrera']."','".$row['telefono']."', now())";
    if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaPrestamo."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = '".$estatusPrestamo."' WHERE id = '".$personaPrestamo."'";
			$conn->query($sqlCambioEstatus);
			$sqlBorrarPrestamo = "DELETE FROM prestamoslibros WHERE id_libro = '".$personaPrestamo."'";
			$conn->query($sqlBorrarPrestamo);
			header("Location:exitoDevolucionLibro.php");
		}
	}
    else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}

	}elseif ($estatusPrestamo == 'PRESTAMO') 
	{
		$sql = "UPDATE prestamoslibros SET fecha_prestamo = now() WHERE id_libro = '".$personaPrestamo."'";
    if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaPrestamo."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = '".$estatusPrestamo."' WHERE id = '".$personaPrestamo."'";
			$conn->query($sqlCambioEstatus);
			header("Location:exitoDevolucionLibro.php");
		}
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}else
	{
	header("Location: noexitoDevolucionLibro.php");
	}
	}
	mysqli_close($conn);
?>