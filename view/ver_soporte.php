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
    <style>
        /* Restringir el área de texto para que solo se pueda agrandar verticalmente */
        /* Restringir el área de texto para que solo se pueda agrandar verticalmente */
        textarea {
            resize: vertical;
            /* Permitir solo el redimensionamiento vertical */
            width: 100%;
            /* Asegurar que ocupe todo el ancho disponible */
            overflow: hidden;
            /* Eliminar la barra de desplazamiento */
            min-height: 40px;
            /* Altura mínima para evitar que se haga demasiado pequeña */
        }
    </style>
</head>

<body data-aos="fade-in">
    <?php $micomponente->generaMenu() ?>
    <a href="#" id="insertarBtn"><i class="bi bi-plus-square-fill"></i>Insertar Soporte</a>

    <main class="main width--40" id="formContainer" style="display: none;">
        <h2>Insertar Soporte</h2>
        <form id="formProblema">
            <label for="tipo_problema">Tipo de problema:</label>
            <input type="text" id="tipo_problema" name="tipo_problema" required>

            <label for="problema">Descripción del problema:</label>
            <textarea id="problema" name="problema" required></textarea>

            <?php $lista->soporte_usuariosid() ?>

            <!-- <label for="id_usuario">ID de usuario:</label>
    <input type="number" id="id_usuario" name="id_usuario" required> -->

            <!-- Campo oculto para 'solucionado' siempre con valor 0 -->
            <input type="hidden" id="solucionado" name="solucionado" value="0">

            <button type="submit">Enviar</button>
        </form>


    </main>
    <main class="main width--90">
        <h2>Soporte</h2>
        <table border="1" class="tabla">
            <thead>
                <tr>

                    <td>ID</td>
                    <td>Tipo problema</td>
                    <td>Problema</td>
                    <td>Usuario</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php $lista->soporte_list(); ?>
            </tbody>
        </table>
    </main>

    <?php $micomponente->footer() ?>

    <!-- Archivos de scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./../js/display.js"></script>
    <script src="./../js/insert/insert_soporte.js"></script>
    <script>
        // Inicializar AOS (animaciones)
        AOS.init();
        // Seleccionar el textarea
        var textarea = document.getElementById("problema");

        // Ajustar la altura del textarea cada vez que el usuario escriba
        textarea.addEventListener("input", function() {
            // Restablecer la altura para que se ajuste automáticamente
            this.style.height = 'auto';
            // Ajustar la altura al contenido
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
</body>

</html>