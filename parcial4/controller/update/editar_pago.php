<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "SELECT * FROM pagos WHERE id = $id";
    $resultado = $con->query($sql);
    $pago = $resultado->fetch_assoc();

    $alumno_id = $pago['alumno_id'];
    $monto = $pago['monto'];
    $fecha = $pago['fecha'];

    $con->close();
}
?>

<form action="editar_pago_proceso.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="alumno_id_pago">ID Alumno:</label>
    <input type="number" name="alumno_id_pago" value="<?php echo $alumno_id; ?>" required>
    <label for="monto">Monto:</label>
    <input type="number" name="monto" value="<?php echo $monto; ?>" required>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" value="<?php echo $fecha; ?>" required>
    <button type="submit">Actualizar Pago</button>
</form>
