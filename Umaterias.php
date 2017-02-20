<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$post = file_get_contents("php://input");
$request = json_decode($post);
$elementCount  = count ($request->params);

//$params = $request->params;
//echo $params[0]->idasignatura.$params[0]->nombre.$params[0]->calificacion.$params[0]->fk_alumno;

for ($i=0; $i < $elementCount ; $i++) { 
 $params = $request->params[$i];
 $sql="INSERT INTO asignatura (idasignatura, nombre, calificacion, fk_alumno) VALUES
  ('$params->idasignatura','$params->nombre','$params->calificacion', '$params->fk_alumno')
  ON DUPLICATE KEY UPDATE nombre = '$params->nombre', calificacion = '$params->calificacion'";
 mysqli_query($conexion, $sql);
}

 mysqli_close($conexion);
?>