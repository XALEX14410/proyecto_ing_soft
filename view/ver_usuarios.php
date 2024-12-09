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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <!-- Estilos para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/admin.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/tables_desing.css">
</head>

<body data-aos="fade-in">
    <?php $micomponente->generaMenu() ?>

    <a href="#" id="insertarBtn"><i class="bi bi-plus-square-fill"></i>Insertar usuario</a>

    <main class="main width--40" id="formContainer" style="display: none;">
        <h2>Insertar Usuarios</h2>
        <form method="POST" id="form_usuario">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" name="ubicacion" id="ubicacion" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña" required>

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="admin">Admin</option>
                <option value="conductor">Conductor</option>
                <option value="soporte">Soporte</option>
            </select>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">

            <button type="submit">Insertar Usuario</button>
        </form>



        <div id="response"></div> <!-- Aquí mostrarás la respuesta del servidor -->

    </main>
    <main class="main width--90">
        <h2>Usuarios</h2>
        <table border="1" class="tabla">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Usuarios</td>
                    <!-- <td>Contraseña</td> -->
                    <td>Ubicación</td>
                    <td>Nombre</td>
                    <!-- <td>Edad</td> -->
                    <!-- <td>Telefono</td> -->
                    <!-- <td>Correo</td> -->
                    <td>Tipo</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php $lista->usuarios_disponibles(); ?>
            </tbody>
        </table>
    </main>

    <?php $micomponente->footer() ?>

    <!-- Archivos de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./../js/display.js"></script>
    <!-- Ruta local a los iconos de Bootstrap -->
    <link href="ruta/a/bootstrap-icons.css" rel="stylesheet">
    <script src="./../js/insert/insert_usuarios.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/crypto-js@4.0.0/core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/crypto-js@4.0.0/aes.js"></script> -->

    <script>
        // Inicializar AOS (animaciones)
        AOS.init();
    </script>
</body>

</html>