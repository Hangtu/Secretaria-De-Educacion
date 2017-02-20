<?php
include("../conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

 $post = file_get_contents("php://input");
 $request = json_decode($post);
 @$idpedido = $request->idpedido;
 
 $sql="UPDATE  pedido SET statusPedido='L' WHERE idpedido=".$idpedido;
 mysql_query($sql,$conexion);
 //echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
 mysql_close($conexion);
?>