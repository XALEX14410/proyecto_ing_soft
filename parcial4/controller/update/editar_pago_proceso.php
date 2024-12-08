<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $alumno_id_pago = $_POST['alumno_id_pago'];
    $monto = $_POST['monto'];
    $fecha = $_POST['fecha'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "UPDATE pagos SET alumno_id=$alumno_id_pago, monto=$monto, fecha='$fecha' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Pago actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
