<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_materia = $_POST['nombre_materia'];
    $creditos = $_POST['creditos'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "INSERT INTO materias (nombre, creditos) VALUES ('$nombre_materia', $creditos)";

    if ($con->query($sql) === TRUE) {
        echo "Materia insertada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
