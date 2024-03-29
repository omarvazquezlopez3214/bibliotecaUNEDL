<?php
	require_once("phpmailer/PHPMailerAutoload.php");
	include("conexionbdd.php");
	//include "phpmailer/class.phpmailer.php";
	//include "phpmailer/class.smtp.php";
	//verifica la conexion
	if($conn->connect_error)
	{
		die("<br /> Fallo el intento de conexión a la base de datos: "
	 								.$conn->connect_error . "<br />");
	}
	//variables
	$mail = new PHPMailer();
	
	$correoemisor = 'biblioteca.unedl@gmail.com';
	$contrasenaemisor = '@unedlvirtuallibrary';
	$nombreemisor = 'BibliotecaUnedl';
	$correoreceptor = $_POST['correo'];
	$usuarioreceptor = $_POST['matricula'];
	//valida el correo en la BDD
	$validarcorreo = "SELECT * FROM usuarios WHERE correo_electronico = '".$correoreceptor."' AND matricula = '".$usuarioreceptor."'";
	//si es verdadero mandara el correo para hacer recuperacion
	$resultado = $conn->query($validarcorreo);
	$row = mysqli_num_rows($resultado);
	if( $row == 1)
	{
		$mail->isSMTP();
	
	$mail->SMTPOptions = array (
	'ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>true
	)
	);
	
	//$mail->SMTPDebug = 2;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	
	$mail->Username = $correoemisor; //Correo de donde enviaremos los correos
	$mail->Password = $contrasenaemisor; // Password de la cuenta de envío
	
	$mail->setFrom($mail->Username, $nombreemisor);
	$mail->addAddress($correoreceptor, $usuarioreceptor ); //Correo receptor
	
	//ejecucion de recuperar contraseña una vez que haya recibido el correo
	$mail->Subject = "Recuperar Password";
	$mail->Body .= "<h1 style='color:#3498db;'>Biblioteca UNEDL: </h1>";
	$mail->Body .= "<p>Copia el siguiente link, en tu barra de navegacion y</p>";
	$mail->Body .= "<p>te reenviara a una pantalla para cambiar tu contrasena</p>";
	$mail->Body .= 'http://localhost/bibliotecaUNEDL/cambiarcontrasena.html'; //AQUI SE INGRESARA EL LINK DEL FORMULARIO DE CAMBIAR CONTRASEÑA
	$mail->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
	
	$mail->IsHTML(true);
	//manda a la pestaña de recuperacion de contraseña
	if($mail->send()) {
		header("Location: exitoRecuperarContraseña.html");
		} else {
		header("Location: noexitoEnviarCorreo.php");
	}
	}else{
	//si falla manda a no exito
		header("Location: noexitoRecuperarContrasena.php");
	}
	mysqli_close($conn);
?>