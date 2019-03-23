<?php
//destruye la sesion que esta iniciada
	@session_start();
	session_destroy();
	//Re direcciona al menu principal
	header("Location: MenuPrincipal.php");
?>