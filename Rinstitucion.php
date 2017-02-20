<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


 $sql="SELECT idinstitucion, nombre, clave, domicilio, telefono, municipio, localidad FROM INSTITUCION ORDER BY nombre";
 
 $res=mysqli_query($conexion, $sql);
 if(mysqli_num_rows($res)!=0){
    while($fila=mysqli_fetch_array($res)){
     $array[] =$fila;
   }
    echo json_encode($array);
  }
    mysqli_close($conexion); 
?>