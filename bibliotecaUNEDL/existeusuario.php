<?php
      $user = $_POST['m'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($m) {
       
            include("conexionbdd.php");
            if($conn->connect_error)
            {
                  die("<br /> Fallo el intento de conexión a la base de datos: "
                                                            .$conn->connect_error . "<br />");
            }

            $matricula = "SELECT * FROM alumnos WHERE matricula_alumno = '".$m."'";
            $re = $conn->query($matricula);
            $fil = mysqli_num_rows($re);
            
            if($fil == 1){
                  echo "<span id='disponible' style='font-weight:bold;color:green;'>Matrícula o número de colaborador válido.</span>";
            }else{
                  echo "<span id='nodisponible' style='font-weight:bold;color:red;'>No es una matrícula o número de colaborador válido.</span>";
            }
      }     
?>