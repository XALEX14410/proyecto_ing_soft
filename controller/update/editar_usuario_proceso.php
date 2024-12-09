<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_usuario.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_usuario = $_POST['id'];  // ID del usuario
    $usuario = $_POST['usuario'];
    $ubicacion = $_POST['ubicacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $tipo = $_POST['tipo'];

    // Comprobar si se envió una foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];  // Foto del usuario
    } else {
        // Si no se sube una foto, asigna una imagen predeterminada
        $foto = 'image.png';
    }

    // Instanciar la clase que maneja la base de datos
    $bd_usuario = new bd_usuario();



    // Crear un objeto de la clase usuario (asumimos que tienes un setter y getter adecuados)
    $usuarioObj = new Usuario();
    $usuarioObj->setIdUsuario($id_usuario);
    $usuarioObj->setUsuario($usuario);
    $usuarioObj->setContraseña($contraseña);
    $usuarioObj->setUbicacion($ubicacion);
    $usuarioObj->setNombre($nombre);
    $usuarioObj->setApellido($apellido);
    $usuarioObj->setEdad($edad);
    $usuarioObj->setTelefono($telefono);
    $usuarioObj->setCorreo($correo);
    $usuarioObj->setFoto($foto);
    $usuarioObj->setTipo($tipo);

    // Llamar al método de actualización
    $bd_usuario->actualiza_usuario($usuarioObj);

    // Redirigir al inicio después de actualizar
    header("Location: ../../view/ver_usuarios.php"); // Cambia la ruta según sea necesario
    exit;  // Asegúrate de terminar el script después de la redirección
} else {
    echo "No se recibió ningún dato del formulario.";
}
?>
