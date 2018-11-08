<?php
    include("conexionbdd.php");
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//Recuperar las variables
	$id=$_POST['Id'];
	$dewey=$_POST['Dewey'];
	$titulo=$_POST['Titulo'];
	$autor=$_POST['Autor'];
	$editorial=$_POST['Editorial'];
	$lugar=$_POST['Lugar'];
	$año=$_POST['Ano'];
	$plantel=$_POST['Plantel'];
	$material=$_POST['Material'];
	$procedencia=$_POST['Procedencia'];
	$comentario=$_POST['Comentario'];
	$estatus=$_POST['Estatus'];
	
	$validarid = "SELECT id FROM libros WHERE id = '".$id."' ";
	$resultado = $conn->query($validarid);
	$row = mysqli_num_rows($resultado);
	if( $row == 1)
	{
		header("Location: noexitoAltaLibroSuper.php");
	}else{
	
	$sql = "INSERT INTO libros(id, codigo_dewey, titulo, autor_autores, editorial, lugar_edicion, ano, plantel, tipo_material, procedencia, comentarios, estatus) 
	VALUES (".$id.",'".$dewey."','".$titulo."','".$autor."','".$editorial."','".$lugar."','".$año."','".$plantel."','".$material."','".$procedencia."','".$comentario."','".$estatus."')";
    //Se ejecuta la sentencia de query
	if($conn->query ($sql) === TRUE)
	{
		header("Location:exitoAltaSuper.php");
	}else
	{
		echo "<br /> Error : ". $sql . "<br />". $conn->error."<br />";
	}
	}
	mysqli_close($conn);
?>