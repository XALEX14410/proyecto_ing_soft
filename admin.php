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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav>
            <img src="logo.png" alt="Logo de la Empresa" class="logo">
            <ul>
                <li><a href="admin.php"> <i class="bi bi-house-door"></i> Inicio</a></li>
                <li><a href="#addRoute" data-bs-toggle="modal" data-bs-target="#addRouteModal"> <i class="bi bi-plus-circle"></i> Agregar Ruta</a></li>
                <!-- Más opciones de administración aquí -->
            </ul>
        </nav>
    </header>

    <main class="container my-4">
        <!-- Aquí van los formularios y herramientas de administración -->
        
        <!-- Modal para agregar ruta -->
        <div class="modal fade" id="addRouteModal" tabindex="-1" aria-labelledby="addRouteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRouteLabel">Agregar Ruta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addRouteForm">
                            <div class="mb-3">
                                <label for="routeName" class="form-label">Nombre de Ruta</label>
                                <input type="text" class="form-control" id="routeName" required>
                            </div>
                            <div class="mb-3">
                                <label for="routeDetails" class="form-label">Detalles de la Ruta</label>
                                <textarea class="form-control" id="routeDetails" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Ruta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Archivo de scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./js/admin.js"></script>
</body>

</html>
