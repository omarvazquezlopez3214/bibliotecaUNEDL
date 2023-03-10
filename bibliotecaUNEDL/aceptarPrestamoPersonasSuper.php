<?php
//Incluye la conexion a la base de datos y si falla manda un mensaje que fallo la conexion a la base de datos.
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$personaPrestamo = $_POST['personaLibrosEnPrestamo'];
	$estatusPrestamo = $_POST['personaEstatusEnPrestamo'];
	//Query donde realiza una busqueda en la tabla libros donde el identificador sea igual al identificador de la persona
	$sqlestado = "SELECT * FROM libros WHERE id = '".$personaPrestamo."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	//Si en el arreglo de $fila el estatus es igual a PRESTAMO entra y realiza un query donde obtiene el id del libro de la tabla de prestamoslibros
	if($fila['estatus'] == "PRESTAMO")
	{
	$sqlprestamolibro = "SELECT * FROM prestamoslibros WHERE id_libro = '".$personaPrestamo."'";
	$resultado = $conn->query($sqlprestamolibro);
	$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
//Si el estatus del libro prestado es igual a DISPONIBLE o es igual a CONSULTA INTERNA entonces realiza un insert a la tabla "devolucionlibros" con los valores del libro prestado
	if($estatusPrestamo == 'DISPONIBLE' || $estatusPrestamo == 'CONSULTA INTERNA')
	{
		$sql = "INSERT INTO devolucionlibros(id_libro,titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_devolucion) 
    VALUES ('".$row['id_libro']."','".$row['titulo']."','".$row['autor']."','".$row['plantel']."','".$row['ano']."','".$row['nombre']."','".$row['apellidos']."','".$row['correo_electronico']."' ,'".$row['matricula']."','".$row['carrera']."','".$row['telefono']."', now())";
   //Si conexion exitosa entonces entra
    if($conn->query ($sql) === TRUE)
	{//Si la consulta regresa un TRUE entonces entra y realiza un update al estatus de la tabla libros donde el identificador sea igual al de la persona que se le presto el libro;
		//Al igual que realiza un DELETE de la tabla de prestamos libros para eliminar el registro de esa tabla. si todo sale bien regresa una página para
		//mostrar mensaje de exito.
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaPrestamo."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = '".$estatusPrestamo."' WHERE id = '".$personaPrestamo."'";
			$conn->query($sqlCambioEstatus);
			$sqlBorrarPrestamo = "DELETE FROM prestamoslibros WHERE id_libro = '".$personaPrestamo."'";
			$conn->query($sqlBorrarPrestamo);
			header("Location:exitoDevolucionLibroSuper.php");
		}
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}elseif ($estatusPrestamo == 'RESERVADO') 
	{//Si el estatus del libro es RESERVADO entonces realiza un insert a la tabla de reservalibros con los datos del libro que pide la tabla
		$sql = "INSERT INTO reservalibros(id_libro,titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_reservacion)
    VALUES ('".$row['id_libro']."','".$row['titulo']."','".$row['autor']."','".$row['plantel']."','".$row['ano']."','".$row['nombre']."','".$row['apellidos']."','".$row['correo_electronico']."' ,'".$row['matricula']."','".$row['carrera']."','".$row['telefono']."', now())";
    //Si conexion exitosa entonces entra
    if($conn->query ($sql) === TRUE)
	{//Si la consulta regresa un TRUE entonces entra y realiza un update al estatus de la tabla libros donde el identificador sea igual al de la persona que se le presto el libro;
		//Al igual que realiza un DELETE de la tabla de prestamos libros para eliminar el registro de esa tabla. si todo sale bien regresa una página para
		//mostrar mensaje de exito.
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaPrestamo."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = '".$estatusPrestamo."' WHERE id = '".$personaPrestamo."'";
			$conn->query($sqlCambioEstatus);
			$sqlBorrarPrestamo = "DELETE FROM prestamoslibros WHERE id_libro = '".$personaPrestamo."'";
			$conn->query($sqlBorrarPrestamo);
			header("Location:exitoDevolucionLibroSuper.php");
		}
	}
    else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
//Si el estatus es en PRESTAMO entonces entra y realiza un UPDATE  a la tabla de prestamolibros con la fecha actual.
	}elseif ($estatusPrestamo == 'PRESTAMO') 
	{
		$sql = "UPDATE prestamoslibros SET fecha_prestamo = now() WHERE id_libro = '".$personaPrestamo."'";
    if($conn->query ($sql) === TRUE)
	{//Realiza un SELECT de la tabla de libros con el identificador del libro en prestamo de la persona
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$personaPrestamo."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{//Realiza un UPDATE a la tabla de libros seteando el estatus del libro en prestamo
			$sqlCambioEstatus = "UPDATE libros SET estatus = '".$estatusPrestamo."' WHERE id = '".$personaPrestamo."'";
			$conn->query($sqlCambioEstatus);
			header("Location:exitoDevolucionLibroSuper.php");
		}//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}else//Si todo falla entonces muestra mensaje de no exito devolucion.
	{
	header("Location: noexitoDevolucionLibroSuper.php");
	}
	}
	mysqli_close($conn);
?>