<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json; charset=utf-8');
include("../conector.php");

   $sql = "SELECT p.idpedido, p.cantidad, p.detalle, p.statusPedido, p.fk_mesa, m.name, m.price FROM pedido p, menu m WHERE p.fk_menu = m.idmenu and p.statusMesa='1' and p.statusPedido = 'P' ORDER BY p.idpedido ASC";
   $res=mysql_query($sql,$conexion);
   $outp = "";
   while($fila=mysql_fetch_array($res)){     
     if ($outp != "") {
          $outp .= ",";
      }
          $outp .= '{"cantidad":"'  . $fila["cantidad"] . '",';
          $outp .= '"idpedido":"'   . $fila["idpedido"]        . '",';
          $outp .= '"detalle":"'   . $fila["detalle"]        . '",';
          $outp .= '"statusPedido":"'   . $fila["statusPedido"]        . '",';
          $outp .= '"name":"'   . $fila["name"]        . '",';
          $outp .= '"mesa":"'   . $fila["fk_mesa"]        . '",';
          $precio = $fila['cantidad'] * $fila['price'];      
          $outp .= '"price":"'   . $precio       . '"}';
   } 

   echo ("[".$outp."]");
   mysql_close($conexion);

?>