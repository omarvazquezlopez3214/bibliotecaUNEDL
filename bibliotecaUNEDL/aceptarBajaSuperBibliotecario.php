<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$id=$_POST['Id'];
	
	$validarid = "SELECT id_usuario FROM usuarios WHERE id_usuario = '".$id."' ";
	$resultado = $conn->query($validarid);
	$row = mysqli_num_rows($resultado);
	if( $row == 1)
	{
	$sql = "DELETE FROM usuarios WHERE id_usuario = '".$id."' ";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		header("Location:exitoBajaSuperBibliotecario.php");
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}	
	}else
	{
		
		header("Location: noexitoAceptarBajaSuperBibliotecario.php");
	}
	mysqli_close($conn);
	
?>