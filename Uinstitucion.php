<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$post = file_get_contents("php://input");
$request = json_decode($post);
$params = $request->params;
$idinstitucion = $request->idinstitucion;

 $sql="UPDATE  institucion SET 
 nombre ='$params->nombre', clave='$params->clave',
 domicilio='$params->domicilio', telefono='$params->telefono', 
 municipio='$params->municipio', localidad='$params->localidad'
 WHERE idinstitucion = '$idinstitucion'";
 
 mysqli_query($conexion, $sql);
 mysqli_close($conexion);



?>