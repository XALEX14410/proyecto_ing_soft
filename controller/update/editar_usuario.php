<?php
include_once(dirname(__FILE__) . "/../../model/listas.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $listas = new Listas();

    // Método para obtener los datos del alumno según el ID
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
    $con = $listas->getBD();
    $resultado = $con->query($sql);
    
    if ($resultado->num_rows > 0) {
        $alumno = $resultado->fetch_assoc();
    } else {
        die("No se encontró el alumno con el ID proporcionado.");
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

<main class="main width--40" id="formContainer">
    <h2>Actualizar Usuarios</h2>
    <!-- Formulario para editar -->
    <form action="./editar_usuario_proceso.php" method="POST">
        <input type="hidden" name="id" value="<?= isset($alumno['id_usuario']) ? $alumno['id_usuario'] : '' ?>">

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" value="<?= isset($alumno['usuario']) ? $alumno['usuario'] : '' ?>" required>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?= isset($alumno['ubicacion']) ? $alumno['ubicacion'] : '' ?>" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= isset($alumno['nombre']) ? $alumno['nombre'] : '' ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?= isset($alumno['apellido']) ? $alumno['apellido'] : '' ?>" required>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" value="<?= isset($alumno['edad']) ? $alumno['edad'] : '' ?>" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?= isset($alumno['telefono']) ? $alumno['telefono'] : '' ?>" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?= isset($alumno['correo']) ? $alumno['correo'] : '' ?>" required>

        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña" id="contraseña" value="<?= isset($alumno['contraseña']) ? $alumno['contraseña'] : '' ?>" required>

        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="admin" <?= isset($alumno['tipo']) && $alumno['tipo'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="conductor" <?= isset($alumno['tipo']) && $alumno['tipo'] == 'conductor' ? 'selected' : '' ?>>Conductor</option>
            <option value="soporte" <?= isset($alumno['tipo']) && $alumno['tipo'] == 'soporte' ? 'selected' : '' ?>>Soporte</option>
        </select>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto">

        <button type="submit">Actualizar Usuario</button>
    </form>

    <div id="response"></div> <!-- Aquí mostrarás la respuesta del servidor -->

</main>

<!-- Archivos de scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    // Inicializar AOS (animaciones)
    AOS.init();
</script>
</body>

</html>
