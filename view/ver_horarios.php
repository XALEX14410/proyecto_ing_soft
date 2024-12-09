<?php
// Iniciar sesión para usar la variable $_SESSION
session_start();

// Verificar si el usuario ha iniciado sesión y si es un administrador
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin') {
    // Mostrar contenido de administración aquí
    echo 'Bienvenido, administrador.';
} else {
    // Si no está logueado o no es administrador, redirigir al inicio
    header('Location: /proyecto/proyecto_ing_soft/');
    exit();
}

include_once(dirname(__FILE__) . "/../model/bd_rutas.php");
include_once(dirname(__FILE__) . "/../model/listas.php");
include_once realpath(dirname(__FILE__) . "/../model/componentes.php");
$midato    = new bd_ruta();
$lista = new listas();
$micomponente = new componentes();

$lista_ruta = $midato->lista_ruta();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <!-- Estilos para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/admin.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/tables_desing.css">

</head>

<body data-aos="fade-in">
    <?php $micomponente->generaMenu() ?>
    <a href="#" id="insertarBtn"><i class="bi bi-plus-square-fill"></i>Insertar horario</a>

  <main class="main width--40" id="formContainer" style="display: none;">
    <h2>Insertar Ruta</h2>
    <form id="formHorario">

        <?php $lista->horarios_routesid()?>
        
        <label for="hora">Fecha y hora:</label>
        <input type="datetime-local" name="hora" id="hora" required>

        <button type="submit">Insertar</button>
    </form>
</main>

    <main class="main width--90">
        <h2>Horario</h2>
        <table border="1" class="tabla">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Ruta</td>
                    <td>Fecha y hora📅</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php $lista->horario_list(); ?>
            </tbody>
        </table>
    </main>

    <?php $micomponente->footer()?>

    <!-- Archivos de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./../js/display.js"></script>
    <script src="./../js/insert/insert_horario.js"></script>
    <script>
        // Inicializar AOS (animaciones)
        AOS.init();
    </script>
</body>

</html>
