<?php
include("conector.php");
error_reporting(E_ERROR | E_PARSE);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$post = file_get_contents("php://input");
$request = json_decode($post);
 
 @$params= $request->params;

 $sql="SELECT idasignatura, nombre, calificacion, fk_alumno FROM asignatura WHERE fk_alumno = '$params->idalumno'";
 $res=mysqli_query($conexion, $sql);
 if(mysqli_num_rows($res)!=0){
    while($fila=mysqli_fetch_array($res)){
     $array[] =$fila;
   }
    echo json_encode($array);
  }
    mysqli_close($conexion); 
?>