<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_rutas.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instanciar la clase
    $bd_rutas = new bd_ruta();
    $conexion = new BaseDatos();  // Asegúrate de inicializar la conexión
    $con = $conexion->getBD();

    // Comenzamos una transacción para asegurar que la eliminación se haga correctamente
    $con->begin_transaction();

    try {
        // Eliminar el rutas
        $bd_rutas-> elimina_rutas($id);
        
        // Commit de la transacción si la eliminación fue exitosa
        $con->commit();
        echo "rutas eliminado exitosamente";
        
        // Redirigir al rutas después de la eliminación
        header("Location: ../../view/ver_rutas.php"); // Cambia la ruta según sea necesario
        exit;  // Asegúrate de terminar el script después de la redirección

    } catch (Exception $e) {
        // Si hubo algún error, deshacer la transacción
        $con->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $con->close();
}
?>
