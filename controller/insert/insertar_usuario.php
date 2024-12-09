<?php
include_once (dirname(__FILE__) . "/../../model/bd_usuario.php");
include_once (dirname(__FILE__) . "/../../class/usuario.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $usuario = $_POST['usuario'];
    $ubicacion = $_POST['ubicacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'] ?? ''; // Si no se envía el apellido, se asigna vacío
    $edad = $_POST['edad'] ?? 0; // Edad predeterminada en caso de no ser proporcionada
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'] ?? ''; // Si no se envía el correo, se asigna vacío
    $contraseña = $_POST['contraseña'];
    $foto = $_POST['foto'] ?? 'image.png'; // Si no se envía foto, se asigna un valor por defecto
    $tipo = $_POST['tipo'];

    // Crear una instancia de la clase usuario
    $nuevo_usuario = new usuario();
    $nuevo_usuario->setIdUsuario(0); // El ID será generado automáticamente por la base de datos
    $nuevo_usuario->setUsuario($usuario);
    $nuevo_usuario->setContraseña($contraseña);
    $nuevo_usuario->setUbicacion($ubicacion);
    $nuevo_usuario->setNombre($nombre);
    $nuevo_usuario->setApellido($apellido);
    $nuevo_usuario->setEdad($edad);
    $nuevo_usuario->setTelefono($telefono);
    $nuevo_usuario->setCorreo($correo);
    $nuevo_usuario->setFoto($foto);
    $nuevo_usuario->setTipo($tipo);

    // Crear una instancia de la clase bd_usuario y guardar el usuario en la base de datos
    $bd_usuario = new bd_usuario();
    try {
        $bd_usuario->agrega_usuario($nuevo_usuario);
        echo "Usuario insertado exitosamente.";
    } catch (Exception $e) {
        echo "Error al insertar usuario: " . $e->getMessage();
    }
}
?>
