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



include_once(dirname(__FILE__)."/../model/bd_rutas.php");
// include_once realpath(dirname(__FILE__)."/../model/componentes.php");
$midato    = new bd_ruta();
// $micomponente = new componentes();

$lista_ruta = $midato->lista_ruta();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="./../css/style.css">
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

    <main>
        <h1>Administrador</h1>
        <table id="datos" class="tabla">
            <thead>
                <tr class="tabla__fila1">
                    <td>id</td>
                    <td>nombre</td>
                    <td>coordinates</td>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i<count($lista_ruta); $i++) { ?>
                    <tr>
                        
                            <td><?php echo $lista_ruta[$i]->getid(); ?></td>
                            <td><?php echo $lista_ruta[$i]->getnombre(); ?></td>
                            <td><?php echo $lista_ruta[$i]->getcoordinates(); ?></td>
                        

                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </main>

    <!-- Archivo de scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./../js/admin.js"></script>
</body>

</html>