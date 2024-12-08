<?php
// Iniciar sesión para usar la variable $_SESSION
session_start();

// Incluir el archivo de la clase BaseDatos
require_once 'basedatos.php';  // Asegúrate de que el path sea correcto

// Crear una instancia de la clase BaseDatos
$baseDatos = new BaseDatos();

// Obtener la conexión a la base de datos
$conexion = $baseDatos->getBd();

// Verificar si se enviaron los datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario
    $usuario = trim($_POST['username']);
    $contrasena = trim($_POST['password']);

    // Validar que no estén vacíos
    if (empty($usuario) || empty($contrasena)) {
        echo 'Por favor, ingresa tu usuario y contraseña.';
        exit;
    }

    // Preparar la consulta para verificar el usuario
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE usuario = ?");
    $stmt->bind_param("s", $usuario); // 's' indica que el parámetro es una cadena
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si el usuario existe
    if ($user = $resultado->fetch_assoc()) {
        // Comparar la contraseña
        if ($contrasena === $user['contraseña']) {
            // Verificar si el tipo de usuario es 'admin'
            if ($user['tipo'] === 'admin') {
                // Si la contraseña es correcta y el tipo es admin, iniciar sesión
                $_SESSION['usuario'] = $user['usuario'];  // Guardamos el nombre de usuario en la sesión

                // Enviar respuesta de éxito
                echo 'success';  // Respuesta que el JS espera para redirigir
            } else {
                // Si el tipo de usuario no es admin
                echo 'No tienes permisos para acceder como administrador.';
            }
        } else {
            // Contraseña incorrecta
            echo 'Contraseña incorrecta.';
        }
    } else {
        // Usuario no encontrado
        echo 'Usuario no encontrado.';
    }

    // Cerrar la declaración
    $stmt->close();
    
    // Cerrar la conexión
    $conexion->close();
} else {
    echo 'Solicitud inválida.';
}
?>
