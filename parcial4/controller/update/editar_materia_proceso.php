<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre_materia = $_POST['nombre_materia'];
    $creditos = $_POST['creditos'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "UPDATE materias SET nombre='$nombre_materia', creditos=$creditos WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Materia actualizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
