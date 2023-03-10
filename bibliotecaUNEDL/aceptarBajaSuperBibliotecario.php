<?php
//Incluye la conexion a la base de datos 
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		//si falla manda un mensaje que fallo la conexion a la base de datos.
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$id=$_POST['Id'];
	//Query donde realiza una busqueda en la tabla de usuarios donde sea igual $id
	$validarid = "SELECT id_usuario FROM usuarios WHERE id_usuario = '".$id."' ";
	$resultado = $conn->query($validarid);
	$row = mysqli_num_rows($resultado);
	if( $row == 1)
	{
		//elimina de la tabla de usuarios al usuario que se bussco
	$sql = "DELETE FROM usuarios WHERE id_usuario = '".$id."' ";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		header("Location:exitoBajaSuperBibliotecario.php");
	}else
	{//Si entra al else entonces ocurrio un error en la conexion a la base de datos.
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}	
	}else
	{
		//Si todo falla entonces muestra mensaje de no exito aceptar baja
		header("Location: noexitoAceptarBajaSuperBibliotecario.php");
	}
	mysqli_close($conn);
	
?>