<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$id=$_POST['Id'];
	
	$validarid = "SELECT id FROM libros WHERE id = '".$id."' ";
	$resultado = $conn->query($validarid);
	$row = mysqli_num_rows($resultado);
	if( $row == 1)
	{
	$sql = "DELETE FROM libros WHERE id = '".$id."' ";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		header("Location:exitoBajaSuper.php");
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}	
	}else
	{
		
		header("Location: noexitoAceptarBajaSuper.php");
	}
	mysqli_close($conn);
	
?>