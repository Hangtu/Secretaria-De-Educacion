<?php
include("conector.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $sqlDelete = "DELETE FROM asignatura WHERE nombre = ''";
    mysqli_query($conexion, $sqlDelete);
    mysqli_close($conexion);
?>