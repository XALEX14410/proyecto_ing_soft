<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "DELETE FROM materias WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Materia eliminada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
