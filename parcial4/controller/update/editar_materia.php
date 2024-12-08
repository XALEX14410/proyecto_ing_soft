<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexion = new BaseDatos();
    $con = $conexion->getBD();

    $sql = "SELECT * FROM materias WHERE id = $id";
    $resultado = $con->query($sql);
    $materia = $resultado->fetch_assoc();

    $nombre_materia = $materia['nombre'];
    $creditos = $materia['creditos'];

    $con->close();
}
?>

<form action="editar_materia_proceso.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nombre_materia">Nombre de Materia:</label>
    <input type="text" name="nombre_materia" value="<?php echo $nombre_materia; ?>" required>
    <label for="creditos">Créditos:</label>
    <input type="number" name="creditos" value="<?php echo $creditos; ?>" required>
    <button type="submit">Actualizar Materia</button>
</form>
