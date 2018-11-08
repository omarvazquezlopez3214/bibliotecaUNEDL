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
	if($fila['estatus'] != "DISPONIBLE" || $fila['estatus'] == "CONSULTA INTERNA")
	{
		header("Location: noexitoReservaLibroAdmin.php");
	}else
	{
	
	$sqlreservas = "SELECT * FROM reservalibros WHERE matricula = '".$_SESSION["matricula"]."' ";
	$resu = $conn->query($sqlreservas);
	$sqlprestamos = "SELECT * FROM prestamoslibros WHERE matricula = '".$_SESSION["matricula"]."' ";
	$res = $conn->query($sqlprestamos);
	$f = $resu-> num_rows;
	$p = $res -> num_rows;

	$suma = $f + $p;
	//$suma = $row + $fil;
	if($suma >= 3)
	{
		header("Location: noexitoMaximoLibrosAdmin.php");
	}else
	{
	$sql = "INSERT INTO reservalibros(id_libro, titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_reservacion) 
    VALUES ('".$fila['id']."','".$fila['titulo']."','".$fila['autor_autores']."','".$fila['plantel']."','".$fila['ano']."','".$_SESSION["nombre"]."','".$_SESSION["apellidos"]."','".$_SESSION["correoelectronico"]."' ,'".$_SESSION["matricula"]."','".$_SESSION["carrera"]."','".$_SESSION["telefono"]."', now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$consulta."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{
			$sqlCambioEstatus = "UPDATE libros SET estatus = 'RESERVADO' WHERE id = '".$consulta."'";
			$conn->query($sqlCambioEstatus);
			header("Location:exitoReservaLibroAdmin.php");
		}
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
}
	mysqli_close($conn);
	}
?>