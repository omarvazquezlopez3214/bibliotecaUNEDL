<?php
      $user = $_POST['m'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($m) {
       //incluye la conexion a la BDD
            include("conexionbdd.php");
            if($conn->connect_error)
            {
                  die("<br /> Fallo el intento de conexión a la base de datos: "
                                                            .$conn->connect_error . "<br />");
            }
//verifica la matricula en la BDD
            $matricula = "SELECT * FROM alumnos WHERE matricula_alumno = '".$m."'";
            $re = $conn->query($matricula);
            $fil = mysqli_num_rows($re);
            $numerocolaborador = "SELECT * FROM maestros WHERE cuenta_nomipaq = '".$m."'";
            $res = $conn->query($numerocolaborador);
            $fila = mysqli_num_rows($res);
            //si el id esta diponible en la bdd
            if($fil == 1){
                  echo "<span id='disponible' style='font-weight:bold;color:green;'>Matrícula válida.</span>";
                  
            }else if($fila == 1){
                  echo "<span id='nodisponible' style='font-weight:bold;color:green;'>Número de colaborador válido.</span>";
                  
            }else //si falla dira que ha tenido un error
            {
                  echo "<span id='nodisponible' style='font-weight:bold;color:red;'>No es una matrícula o número de colaborador válido.</span>";
            }
      }     
?>