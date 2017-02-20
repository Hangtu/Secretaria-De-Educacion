<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("conector.php");

$post = file_get_contents("php://input");
$request = json_decode($post);
$params = $request->params;

   $sql = "SELECT idalumno, curp, apellidoPaterno, apellidoMaterno, nombre, sexo, fechaNacimiento, observaciones FROM alumno WHERE 
   curp LIKE '%$params->curp%' and  apellidoPaterno LIKE '%$params->apellidoPaterno%' and apellidoMaterno LIKE '%$params->apellidoMaterno%' 
   and nombre LIKE '%$params->nombre%' 
   and fk_institucion LIKE '%$params->fk_institucion%' and turno LIKE '%$params->turno%'
   and carrera LIKE '%$params->carrera%' and modalidad LIKE '%$params->modalidad%' 
   and grupo LIKE '%$params->grupo%' and grado LIKE '%$params->grado%' and matricula LIKE '%$params->matricula%'
   and ciclo LIKE '%$params->ciclo%'";
   $res= mysqli_query($conexion, $sql);
   $outp = "";
   while($fila=mysqli_fetch_array($res,MYSQLI_ASSOC)){     
     if ($outp != "") {
          $outp .= ",";
      }

      $age = floor((time() - strtotime($fila['fechaNacimiento'])) / 31556926);

          $outp .= '{"curp":"'  . $fila["curp"] . '",';
          $outp .= '"idalumno":"'   . $fila["idalumno"]        . '",';
          $outp .= '"apellidoPaterno":"'   . $fila["apellidoPaterno"]        . '",';
          $outp .= '"apellidoMaterno":"'   . $fila["apellidoMaterno"]        . '",';
          $outp .= '"nombre":"'   . $fila["nombre"]        . '",';
          $outp .= '"sexo":"'   . $fila["sexo"]        . '",';
          $outp .= '"fechaNacimiento":"'   . $fila["fechaNacimiento"]        . '",';  
          $outp .= '"edad":"'   . $age . '",'; 
          $outp .= '"observaciones":"'.$fila['observaciones'].'"}';
   } 
   echo ('['.$outp.']');
   mysqli_close($conexion);

?>