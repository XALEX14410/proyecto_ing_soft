<?php
include_once(dirname(__FILE__) . "/../../model/listas.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $listas = new Listas();

    // Establecer la conexión a la base de datos
    $con = $listas->getBD();

    // Usar una consulta preparada para evitar inyección SQL
    $sql = "SELECT * FROM horarios WHERE id_horario = ?";
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $con->error);
    }

    // Vincular el parámetro
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Si existe el registro, obtener los datos
        $horario = $resultado->fetch_assoc();
    } else {
        die("No se encontró el horario con el ID proporcionado.");
    }

    // Cerrar el statement después de usarlo
    $stmt->close();
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
    <style>
        /* Restringir el área de texto para que solo se pueda agrandar verticalmente */
        textarea {
            resize: vertical;
            /* Permitir solo el redimensionamiento vertical */
            width: 100%;
            /* Asegurar que ocupe todo el ancho disponible */
            overflow: hidden;
            /* Eliminar la barra de desplazamiento */
            min-height: 40px;
            /* Altura mínima para evitar que se haga demasiado pequeña */
        }
    </style>
</head>

<body data-aos="fade-in">

    <main class="main width--40" id="formContainer">
        <h2>Actualizar Horario</h2>
        <!-- Formulario para editar -->
        <form action="./editar_horario_proceso.php" method="POST">
            <input type="hidden" name="id" value="<?= isset($horario['id_horario']) ? $horario['id_horario'] : '' ?>">

            <!-- Llamar a la función que obtiene las rutas para el select -->
            <?php $listas->horarios_routesid() ?>

            <label for="hora">Fecha y hora:</label>
            <input type="datetime-local" name="hora" id="hora" required value="<?= isset($horario['hora']) ? $horario['hora'] : '' ?>">

            <button type="submit">Actualizar horario</button>
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
