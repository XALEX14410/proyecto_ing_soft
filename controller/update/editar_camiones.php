<?php
include_once(dirname(__FILE__) . "/../../model/listas.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $listas = new Listas();

    // Método para obtener los datos de camiones según el ID
    $sql = "SELECT id_camion, numero, id_conductor, agencia, estado FROM camiones WHERE id_camion = $id";
    $con = $listas->getBD();
    $resultado = $con->query($sql);
    
    // Verifica si se encontró el camión
    if ($resultado->num_rows > 0) {
        $camion = $resultado->fetch_assoc();  // Obtenemos los datos del camión
    } else {
        die("No se encontró el camión con el ID proporcionado.");
    }
} else {
    die("No se proporcionó un ID válido.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <!-- Estilos para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./../../css/admin.css">
    <link rel="stylesheet" href="./../../css/footer.css">
    <link rel="stylesheet" href="./../../css/header.css">
    <link rel="stylesheet" href="./../../css/tables_desing.css">
</head>

<body data-aos="fade-in">

<form action="./editar_camiones_proceso.php" method="POST">
    <!-- Campo oculto para el ID del camión -->
    <input type="hidden" name="id_camion" value="<?= isset($camion['id_camion']) ? $camion['id_camion'] : '' ?>">

    <label for="numero">Número del Camión:</label>
    <input type="text" name="numero" id="numero" value="<?= isset($camion['numero']) ? $camion['numero'] : '' ?>" required>

    <label for="id_conductor">Conductor:</label>
    <?php $listas->camiones_conductoresid(); ?>

    <label for="agencia">Agencia:</label>
    <input type="text" name="agencia" id="agencia" value="<?= isset($camion['agencia']) ? $camion['agencia'] : '' ?>" required>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado" required>
        <option value="activo" <?= isset($camion['estado']) && $camion['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
        <option value="inactivo" <?= isset($camion['estado']) && $camion['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
    </select>

    <button type="submit">Actualizar Camión</button>
</form>


<!-- Archivos de scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    // Inicializar AOS (animaciones)
    AOS.init();
</script>
</body>

</html>
