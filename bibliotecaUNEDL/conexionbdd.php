<?php //conxnb.php
//Definicion de la funcion que genera y devuelve
//el objeto de Conexion a la Base de Datos
function conecarbd()
{
	//Abrir una conexion a base da datos con MySQLi
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "biblioteca"; //cambiar a la nueva base de datos llamada: biblioteca
	
	//Crear conexion
	$conxn = new mysqli($servername ,$username, $password ,$dbname);
	return $conxn;
}

//Llamar a la funcion para Obtener la conexion a la BDD
	
	$conn = conecarbd();
?>