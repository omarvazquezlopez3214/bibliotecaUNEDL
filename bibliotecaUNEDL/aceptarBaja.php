<?php
//inicia la sesion
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
	$id=$_POST['Id'];
	//Query donde realiza una busqueda en la tabla libros donde el identificador sea igual al identificador 
	$validarid = "SELECT * FROM libros WHERE id = '".$id."' ";
	$resultado = $conn->query($validarid);
	//Si en el arreglo de $row es igual a $resultado entonces se inserta en la tabla de eliminados el libro seleccionado
	if($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
	{
	$sql = "INSERT INTO eliminados(Id_libro,codigo_dewey, titulo, autor, plantel, matricula, nombre, fecha_eliminacion)
    	VALUES ('".$row['id']."','".$row['codigo_dewey']."','".$row['titulo']."','".$row['autor_autores']."','".$row['plantel']."','".$_SESSION["matricula"]."','".$_SESSION["nombre"]."',now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		//si la sentencia de eliminar libro es igual al ID manda al exito de baja o si no lo es al que no es exitosa
		$sql2 = "DELETE FROM libros WHERE id = '".$id."' ";
		if($conn->query($sql2) == TRUE)
		{
			header("Location:exitoBaja.php");
		}else
		{
			header("Location: noexitoAceptarBaja.php");
		}
	}else
	{
		//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}	
	}else
	{
		//Si todo falla entonces muestra mensaje de no exito devolucion.
		echo "<br /> Error : ". $row . "<br />". $conn->error."<br />";
	}
	mysqli_close($conn);
	
?>