<?php
// Iniciar sesión para usar la variable $_SESSION
session_start();

// Verificar si el usuario ha iniciado sesión y si es un administrador
if (isset($_SESSION['usuario']) ) {
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
    <!-- <link rel="stylesheet" href="./../css/style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <!-- Estilos para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/perfil.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/admin.css">
    <link rel="stylesheet" href="./../css/header.css">

</head>

<body data-aos="fade-in">
    <?php $micomponente->generaMenu() ?>
    
    <?php $lista->consol_perfil();?>

   


    <?php $micomponente->footer()?>
    <!-- Archivos de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Inicializar AOS (animaciones)
        AOS.init();
    </script>
</body>

</html>
