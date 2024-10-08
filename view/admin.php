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
    <link rel="stylesheet" href="./../css/tables_desing.css">
    <link rel="stylesheet" href="./../css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <?php $micomponente->generaMenu() ?>
    <main>
        <h1>Administrador</h1>

        <h2>Usuarios</h2>
        <table id="datos" class="tabla">
            <thead>
                <tr>
                    <td>id</td>
                    <td>usuarios</td>
                    <td>contraseña</td>
                    <td>ubicacion</td>
                    <td>nombre apellido</td>
                    <td>edad</td>
                    <td>telefono</td>
                    <!-- <td>correo</td> -->
                    <td>Acciones</td>
                </tr>
            </thead>
            <?php $lista->usuarios_disponibles(); ?>
        </table>



        <h2>Camiones</h2>
        <table id="datos" class="tabla">
            <thead>
                <tr>
                    <td>id_camion</td>
                    <td>numero</td>
                    <td>id_conductor</td>
                    <td>agencia</td>
                    <td>estado</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <?php $lista->camiones_list(); ?>
        </table>


        <h2>Rutas</h2>
        <table class="tabla">
            <thead>
                <tr>
                    <td>id</td>
                    <td>nombre</td>
                    <td>coordinates</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <?php $lista->getRoutetable(); ?>
        </table>

        <h2>Horario</h2>
        <table id="tabla1" class="tabla">
            <thead>
                <tr>
                    <td>id_horario</td>
                    <td>id_route</td>
                    <td>hora</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <?php $lista->horario_list(); ?>
        </table>





        <!-- Contenedor con ambas tablas alineadas horizontalmente -->
        <div class="contenedor-tablas">

            <!-- Contenedor para la primera tabla y su título -->
            <div class="contenedor-tabla-individual">
                <h2>Lugares</h2>
                <!-- `id_lugar`, `nombre`, `favoritos`, `coordenadas`, `tipo` -->
                <table id="tabla1" class="tabla">
                    <thdead>
                        <tr>
                            <td>id</td>
                            <td>Nombre</td>
                            <td>favorito</td>
                            <td>coordenadas</td>
                            <td>tipo</td>
                            <td>Acciones</td>
                        </tr>
                        </thead>
                        <?php $lista->lugares_disponibles(); ?>
                </table>
            </div>

            <!-- Contenedor para la segunda tabla y su título -->
            <div class="contenedor-tabla-individual">
                <h2>Soporte</h2>
                <table id="tabla2" class="tabla">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Tipo de problema</td>
                            <td>problema</td>
                            <td>usuario</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <?php $lista->soporte_list(); ?>
                </table>
            </div>

        </div>




    </main>

    <?php $micomponente->footer();?>
    <script src="./../js/NdataTables.js"></script>
    <!-- JQuery -->
    <script src="./../tbl-components/jquery-3.7.1.js"></script>
    <!-- Script que me permite agregar las clase de CSS a las etiquetas de los DataTables -->
    <script src="./../tbl-components/dataTables.min.js"></script>
    <!-- Script que invoca y genera el dataTable -->
    <!-- Archivo de scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>