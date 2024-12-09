<?php
include_once(realpath(dirname(__FILE__) . "/../../model/bd_camiones.php"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $numero = $_POST['numero'];
    $id_conductor = $_POST['id_conductor'];
    $agencia = $_POST['agencia'];
    $estado = $_POST['estado'];

    // Crear un objeto de la clase bd_camion
    $bd_camion = new bd_camion();

    // Verificar si ya existe el camión con el mismo número y conductor
    $mensaje = $bd_camion->verificar_camion_existente($numero, $id_conductor);

    if ($mensaje === "OK") {
        // Si no existe, agregar el camión
        $camion = new camiones();
        $camion->setNumero($numero);
        $camion->setIdConductor($id_conductor);
        $camion->setAgencia($agencia);
        $camion->setEstado($estado);
        
        // Agregar el camión
        $bd_camion->agrega_camion($camion);
        echo "Camión insertado exitosamente";
    } else {
        // Si existe, retornar el mensaje de error
        echo $mensaje;
    }
}

?>
