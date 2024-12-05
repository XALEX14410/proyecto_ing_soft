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


</head>

<body data-aos="fade-in">
    <?php $micomponente->generaMenu() ?>
    <main>
        <div class="container">
            <div class="admin-container">
                <!-- Sección de usuarios -->
                <div class="admin-item" data-aos="flip-left">
                    <i class="fas fa-users"></i>
                    <h4>Ver Usuarios</h4>
                    <a href="ver_usuarios.php" class="btn btn-primary">Ver Usuarios</a>
                </div>

                <!-- Sección de camiones -->
                <div class="admin-item" data-aos="flip-left">
                    <i class="fas fa-bus"></i>
                    <h4>Camiones</h4>
                    <a href="camiones.php" class="btn btn-primary">Ver Camiones</a>
                </div>

                <!-- Sección de rutas -->
                <div class="admin-item" data-aos="flip-left">
                    <i class="fas fa-route"></i>
                    <h4>Rutas</h4>
                    <a href="rutas.php" class="btn btn-primary">Ver Rutas</a>
                </div>

                <!-- Sección de soporte -->
                <div class="admin-item" data-aos="flip-left">
                    <i class="fas fa-headset"></i>
                    <h4>Soporte</h4>
                    <a href="soporte.php" class="btn btn-primary">Ver Soporte</a>
                </div>

                <!-- Sección de horarios -->
                <div class="admin-item" data-aos="flip-left">
                    <i class="fas fa-clock"></i>
                    <h4>Horarios</h4>
                    <a href="horarios.php" class="btn btn-primary">Ver Horarios</a>
                </div>
            </div>
        </div>
    </main>

    <?php $micomponente->footer(); ?>

    <!-- Archivos de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Inicializar AOS (animaciones)
        AOS.init();
    </script>
</body>

</html>
