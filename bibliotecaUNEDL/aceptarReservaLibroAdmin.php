<?php
//inicia la sesion
	@session_start();
?>
<?php
//Incluye la conexion a la base de datos 
    include("conexionbdd.php");
	if($conn->connect_error)
	{//si falla manda un mensaje que fallo la conexion a la base de datos.
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$consulta = $_POST['consultaLibros'];
	//Query donde realiza una busqueda en la tabla libros donde el identificador sea igual al $consulta
	$sqlestado = "SELECT * FROM libros WHERE id = '".$consulta."'";
	$result = $conn->query($sqlestado);
	$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
	//si el estatus es diferente de disponible o igual a consulta interna mandara al no exito de reserva ya que no se puede realizar esta operaacion
	if($fila['estatus'] != "DISPONIBLE" || $fila['estatus'] == "CONSULTA INTERNA")
	{
		header("Location: noexitoReservaLibroAdmin.php");
	}else
	{
	//query donde se busca en la tabla de reservaa de libros el usuario no tenga mas reservas
	$sqlreservas = "SELECT * FROM reservalibros WHERE matricula = '".$_SESSION["matricula"]."' ";
	$resu = $conn->query($sqlreservas);
	$sqlprestamos = "SELECT * FROM prestamoslibros WHERE matricula = '".$_SESSION["matricula"]."' ";
	$res = $conn->query($sqlprestamos);
	$f = $resu-> num_rows;
	$p = $res -> num_rows;

	$suma = $f + $p;
	//$suma = $row + $fil;
	if($suma >= 3)
	{//si el usuario tiene mas de 3 libros reservados no puede reservar mas hasta que devuelva los otros que ya tiene
		header("Location: noexitoMaximoLibrosAdmin.php");
	}else
	{
		//si no tiene reservas inserta en la tabla de reserva libros el libro que el usuario quiere reservar
	$sql = "INSERT INTO reservalibros(id_libro, titulo, autor, plantel, ano, nombre, apellidos , correo_electronico, matricula, carrera, telefono, fecha_reservacion) 
    VALUES ('".$fila['id']."','".$fila['titulo']."','".$fila['autor_autores']."','".$fila['plantel']."','".$fila['ano']."','".$_SESSION["nombre"]."','".$_SESSION["apellidos"]."','".$_SESSION["correoelectronico"]."' ,'".$_SESSION["matricula"]."','".$_SESSION["carrera"]."','".$_SESSION["telefono"]."', now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		$sqlestatus = "SELECT * FROM libros WHERE id = '".$consulta."' ";
		if($resultado = $conn->query($sqlestatus) == TRUE)
		{//cambia el estatus de disponible a reservado
			$sqlCambioEstatus = "UPDATE libros SET estatus = 'RESERVADO' WHERE id = '".$consulta."'";
			$conn->query($sqlCambioEstatus);
			header("Location:exitoReservaLibroAdmin.php");
		}
	}else
	{//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
}
	mysqli_close($conn);
	}
?>