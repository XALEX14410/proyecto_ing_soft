<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "INSERT INTO alumnos (nombre, edad) VALUES ('$nombre', $edad)";

    if ($con->query($sql) === TRUE) {
        echo "Alumno insertado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
