<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

 $post = file_get_contents("php://input");
 $request = json_decode($post);
 @$params = $request->params;
 
 $sql1="DELETE FROM asignatura WHERE fk_alumno= '$params->idalumno'";
 mysqli_query($conexion, $sql1);

 $sql="DELETE FROM alumno WHERE idalumno= '$params->idalumno'";
 mysqli_query($conexion, $sql);
 //echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
 mysqli_close($conexion);
?>