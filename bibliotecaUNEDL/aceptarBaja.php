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
	$id=$_POST['Id'];
	
	$validarid = "SELECT * FROM libros WHERE id = '".$id."' ";
	$resultado = $conn->query($validarid);

	if($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC))
	{
	$sql = "INSERT INTO eliminados(Id_libro,codigo_dewey, titulo, autor, plantel, matricula, nombre, fecha_eliminacion)
    	VALUES ('".$row['id']."','".$row['codigo_dewey']."','".$row['titulo']."','".$row['autor_autores']."','".$row['plantel']."','".$_SESSION["matricula"]."','".$_SESSION["nombre"]."',now())";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
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
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}	
	}else
	{
		
		echo "<br /> Error : ". $row . "<br />". $conn->error."<br />";
	}
	mysqli_close($conn);
	
?>