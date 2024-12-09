<?php
include_once(dirname(__FILE__) . "/../../model/listas.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $listas = new Listas();

    // Método para obtener los datos de la ruta según el ID
    $sql = "SELECT * FROM routes WHERE id = $id";
    $con = $listas->getBD();
    $resultado = $con->query($sql);
    
    if ($resultado->num_rows > 0) {
        $ruta = $resultado->fetch_assoc();
        $nombre = $ruta['nombre'];
        $coordenadas = $ruta['coordinates'];  // Asumiendo que las coordenadas están en formato JSON
    } else {
        die("No se encontró la ruta con el ID proporcionado.");
    }
} else {
    die("No se proporcionó un ID válido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
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
    <h2>Editar Ruta</h2>
    <form action="./editar_rutas_proceso.php" method="POST">
    
    <input type="hidden" name="id" value="<?php echo $ruta['id']; ?>"> <!-- Asignar el ID aquí -->
    <label for="nombre">Nombre de la Ruta:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $ruta['nombre']; ?>" required>

    <label for="coordenadas">Coordenadas:</label>
    <textarea name="coordenadas" id="coordenadas" required><?php echo $ruta['coordinates']; ?></textarea>

    <button type="submit">Actualizar Ruta</button>
</form>

</main>

<!-- Archivos de scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    // Inicializar AOS (animaciones)
    AOS.init();
    var textarea = document.getElementById("coordenadas");

// Ajustar la altura del textarea cada vez que el usuario escriba
textarea.addEventListener("input", function() {
    // Restablecer la altura para que se ajuste automáticamente
    this.style.height = 'auto';
    // Ajustar la altura al contenido
    this.style.height = (this.scrollHeight) + 'px';
});
</script>

</body>
</html>
