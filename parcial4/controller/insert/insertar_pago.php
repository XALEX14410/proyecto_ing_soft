<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumno_id_pago = $_POST['alumno_id_pago'];
    $monto = $_POST['monto'];
    $fecha = $_POST['fecha'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "INSERT INTO pagos (alumno_id, monto, fecha) VALUES ($alumno_id_pago, $monto, '$fecha')";

    if ($con->query($sql) === TRUE) {
        echo "Pago insertado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
