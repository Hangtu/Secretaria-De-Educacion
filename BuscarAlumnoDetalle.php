<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("conector.php");

$post = file_get_contents("php://input");
$request = json_decode($post);
$params = $request->params;

   $sql = "SELECT a.idalumno, a.curp, a.apellidoPaterno, a.apellidoMaterno, a.nombre, a.sexo,
    a.turno, a.carrera, a.modalidad, a.grupo, a.grado, a.ciclo, 
    a.fechaNacimiento, a.observaciones, 
    i.nombre as nombreInstitucion, i.clave, i.domicilio, i.telefono, i.municipio, i.localidad 

   FROM alumno a, institucion i WHERE 
   a.fk_institucion = i.idinstitucion and
   a.idalumno = '$params->idalumno'";  

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

          $outp .= '"turno":"'   . $fila["turno"]        . '",';
          $outp .= '"carrera":"'   . $fila["carrera"]        . '",';
          $outp .= '"modalidad":"'   . $fila["modalidad"]        . '",';
          $outp .= '"grupo":"'   . $fila["grupo"]        . '",';
          $outp .= '"grado":"'   . $fila["grado"]        . '",';
          $outp .= '"ciclo":"'   . $fila["ciclo"]        . '",';

          $outp .= '"nombreInstitucion":"'   . $fila["nombreInstitucion"]        . '",';
          $outp .= '"clave":"'   . $fila["clave"]        . '",';
          $outp .= '"domicilio":"'   . $fila["domicilio"]        . '",';
          $outp .= '"telefono":"'   . $fila["telefono"]        . '",';
          $outp .= '"municipio":"'   . $fila["municipio"]        . '",'; 
          $outp .= '"localidad":"'   . $fila["localidad"]        . '",'; 


          $outp .= '"observaciones":"'.$fila['observaciones'].'"}';
   } 

   echo ("[".$outp."]");
   mysqli_close($conexion);

?>