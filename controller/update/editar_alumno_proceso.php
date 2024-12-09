<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "UPDATE alumnos SET nombre='$nombre', edad=$edad WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Alumno actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
