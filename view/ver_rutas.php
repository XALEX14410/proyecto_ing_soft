<?php
// login.php
session_start();

// Aquí deberías validar las credenciales del usuario
// Esto es solo un ejemplo de validación básica
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar credenciales (esto debería ser reemplazado con lógica real de autenticación)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['loggedin'] = true;
        header('Location: admin.php');
        exit();
    } else {
        echo '<script>alert("Nombre de usuario o contraseña incorrectos.");</script>';
    }
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
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/header.css">
    <link rel="stylesheet" href="./../css/tables_desing.css">

</head>

<body data-aos="fade-in">
    <?php $micomponente->generaMenu() ?>
    <a href="#" id="insertarBtn"><i class="bi bi-plus-square-fill"></i>Insertar ruta</a>

    <main class="main width--40" id="formContainer" style="display: none;">
        <h2>Insertar ruta</h2>
        <form action="./../controller/insert/insertar_usuario.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" name="ubicacion" id="ubicacion" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono" required>

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="admin">Admin</option>
                <option value="conductor">Conductor</option>
                <option value="soporte">Soporte</option>
            </select>

            <button type="submit">Insertar</button>
        </form>
    </main>
    <main class="main width--90">
        <h2>Rutas</h2>
        <table border="1" class="tabla">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Coordenadas</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php $lista->getRoutetable(); ?>
            </tbody>
        </table>
    </main>
    <?php $micomponente->footer()?>


    <!-- Archivos de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./../js/display.js"></script>
    <script>
        // Inicializar AOS (animaciones)
        AOS.init();
    </script>
</body>

</html>
