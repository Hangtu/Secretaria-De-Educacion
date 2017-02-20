<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$post = file_get_contents("php://input");
$request = json_decode($post);
$params = $request->params;

$sql="INSERT INTO institucion (nombre, clave, domicilio, telefono, municipio, localidad) VALUES
 ('$params->nombre', '$params->clave', '$params->domicilio','$params->telefono', '$params->municipio', '$params->localidad')";

if (mysqli_query($conexion, $sql)) {
    echo "Datos agragados correctamente";
} else {
    echo "Error: Error insertando los datos";
}

 mysqli_close($conexion);



?>