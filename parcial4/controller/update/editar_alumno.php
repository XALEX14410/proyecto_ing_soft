<?php
include_once (dirname(__FILE__) . "/../../model/listas.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $listas = new Listas();
    
    // Método para obtener los datos del alumno según el ID
    $sql = "SELECT * FROM alumnos WHERE id = $id";
    $con = $listas->getBD();
    $resultado = $con->query($sql);
    $alumno = $resultado->fetch_assoc();
} else {
    die("No se proporcionó un ID válido.");
}
?>

<!-- Formulario para editar -->
<form action="./editar_alumno_proceso.php" method="POST">
    <input type="hidden" name="id" value="<?= $alumno['id'] ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?= $alumno['nombre'] ?>" required>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" value="<?= $alumno['edad'] ?>" required>

    <button type="submit">Guardar cambios</button>
</form>
