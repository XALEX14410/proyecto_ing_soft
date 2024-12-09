<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_camiones.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instanciar la clase
    $bd_camiones = new bd_camion();
    $conexion = new BaseDatos();  // Asegúrate de inicializar la conexión
    $con = $conexion->getBD();

    // Comenzamos una transacción para asegurar que la eliminación se haga correctamente
    $con->begin_transaction();

    try {
        // Eliminar el camiones
        $bd_camiones->elimina_camion($id);
        
        // Commit de la transacción si la eliminación fue exitosa
        $con->commit();
        echo "camiones eliminado exitosamente";
        
        // Redirigir al camiones después de la eliminación
        header("Location: ../../view/ver_camiones.php"); // Cambia la ruta según sea necesario
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
