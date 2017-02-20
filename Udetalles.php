<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$post = file_get_contents("php://input");
$request = json_decode($post);
$params = $request->params[0];

 $sql="UPDATE  alumno SET 
 curp ='$params->curp', apellidoPaterno='$params->apellidoPaterno',
 apellidoMaterno='$params->apellidoMaterno', nombre='$params->nombre', 
 sexo='$params->sexo', fechaNacimiento='$params->fechaNacimiento', observaciones='$params->observaciones',
 ciclo ='$params->ciclo', grado ='$params->grado', grupo ='$params->grupo', carrera ='$params->carrera', 
 turno='$params->turno', modalidad ='$params->modalidad'
 WHERE idalumno = '$params->idalumno'";
 
 mysqli_query($conexion, $sql);
 mysqli_close($conexion);



?>