<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_soporte.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instanciar la clase
    $bd_soporte = new bd_soporte();
    $conexion = new BaseDatos();  // Asegúrate de inicializar la conexión
    $con = $conexion->getBD();

    // Comenzamos una transacción para asegurar que la eliminación se haga correctamente
    $con->begin_transaction();

    try {
        // Eliminar el soporte
        $bd_soporte-> elimina_soporte($id);
        
        // Commit de la transacción si la eliminación fue exitosa
        $con->commit();
        echo "soporte eliminado exitosamente";
        
        // Redirigir al soporte después de la eliminación
        header("Location: ../../view/ver_soporte.php"); // Cambia la ruta según sea necesario
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
