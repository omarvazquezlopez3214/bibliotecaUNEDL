<?php
//Inicia la sesion
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
	//Query donde realiza una busqueda en la tabla libros donde el identificador sea igual al ID
	$validarid = "SELECT * FROM libros WHERE id = '".$id."' ";
	$resultado = $conn->query($validarid);

	if($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
	{
		//Si en el arreglo de $row es igual a $resultado entra y realiza un query donde inserta en la tabla de eliminados el libro que quiere darse de baja
	$sql = "INSERT INTO eliminados(Id_libro,codigo_dewey, titulo, autor, plantel, matricula, nombre, fecha_eliminacion)
    	VALUES ('".$row['id']."','".$row['codigo_dewey']."','".$row['titulo']."','".$row['autor_autores']."','".$row['plantel']."','".$_SESSION["matricula"]."','".$_SESSION["nombre"]."',now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		//se elimina con el delete from el libro anterior dado de baja
		$sql2 = "DELETE FROM libros WHERE id = '".$id."' ";
		if($conn->query($sql2) == TRUE)
		{

			header("Location:exitoBajaSuper.php");
		}else
		{//Si todo falla entonces muestra mensaje de no exito aceptar baja
			header("Location: noexitoAceptarBajaSuper.php");
		}
	}else
	{
//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}	
	}else
	{
		
		echo "<br /> Error : ". $row . "<br />". $conn->error."<br />";
	}
	mysqli_close($conn);
	
?>