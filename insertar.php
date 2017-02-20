<?php
include("../conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

 $post = file_get_contents("php://input");
 $request = json_decode($post);
 
 @$device = $request->device;
 @$detail = $request->detail;
 @$cantidad = $request->cantidad;
 @$menuID = $request->menuID;
 @$mesaID = $request->mesaID;

 //echo $device.' '.$detail.$cantidad.$menuID.$mesaID;
   
 date_default_timezone_set('America/Mazatlan');
 $fecha = date('Y-m-d H:i:s');

 $sql="INSERT INTO pedido (cantidad, detalle, device, statusPedido, statusMesa, fecha, fk_mesa, fk_menu) VALUES 
 ('$cantidad','$detail','$device','P','1','$fecha','$mesaID','$menuID')";
 mysql_query($sql,$conexion);
 echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
 mysql_close($conexion);
?>