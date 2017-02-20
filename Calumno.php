<?php
include("conector.php");
error_reporting(E_ERROR | E_PARSE);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$post = file_get_contents("php://input");
$request = json_decode($post);
$params = $request->params;

$sqlSelect = "SELECT curp  FROM alumno";
$rest = mysqli_query($conexion, $sqlSelect);

 while($fila=mysqli_fetch_array($rest)){
     if($fila["curp"]==$params->curp){
        echo "Ese alumno ya esta registrado";
        mysqli_close($conexion);
        return;
     }
  }

$sql="INSERT INTO alumno (matricula, curp, nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, sexo, observaciones,
 fk_institucion, turno, carrera, modalidad, grupo, grado, ciclo) VALUES
    ('$params->matricula', '$params->curp', '$params->nombre','$params->apellidoPaterno', '$params->apellidoMaterno', 
 	'$params->fechaNacimiento', '$params->sexo',  '$params->observaciones',  '$params->fk_institucion',  '$params->turno',
 	 '$params->carrera', '$params->modalidad', '$params->grupo',  '$params->grado', '$params->ciclo')";

if (mysqli_query($conexion, $sql)) {
    echo "Datos agragados correctamente";
    $last_id = mysqli_insert_id($conexion);

       $sql = "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia1','$params->calificacion1', '$last_id');";

       $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia2','$params->calificacion2', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia3','$params->calificacion3', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia4','$params->calificacion4', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia5','$params->calificacion5', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia6','$params->calificacion6', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia7','$params->calificacion7', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia8','$params->calificacion8', '$last_id');";

            $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia9','$params->calificacion9', '$last_id');";

      $sql.= "INSERT INTO asignatura (nombre, calificacion, fk_alumno) VALUES
     ('$params->materia10','$params->calificacion10', '$last_id')";
    
     mysqli_multi_query($conexion, $sql);


} else {
    echo "Error: Error insertando los datos";
}

    $sqlDelete = "DELETE FROM asignatura WHERE nombre = ''";
    mysqli_query($conexion, $sqlDelete);
    mysqli_close($conexion);



?>