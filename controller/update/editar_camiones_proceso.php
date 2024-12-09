<?php

include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_camiones.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que todos los campos están presentes
    if (isset($_POST['id_camion'], $_POST['numero'], $_POST['id_conductor'], $_POST['agencia'], $_POST['estado'])) {
        // Recuperar los datos del formulario
        $id_camion = $_POST['id_camion'];
        $numero = $_POST['numero'];
        $id_conductor = $_POST['id_conductor'];
        $agencia = $_POST['agencia'];
        $estado = $_POST['estado'];

        // Instanciar la clase que maneja la base de datos
        $bd_camiones = new bd_camion();

        // Crear un objeto de la clase Camion
        $camionObj = new camiones();
        $camionObj->setIdCamion($id_camion);
        $camionObj->setNumero($numero);
        $camionObj->setIdConductor($id_conductor);
        $camionObj->setAgencia($agencia);
        $camionObj->setEstado($estado);

        // Llamar al método de actualización
        $bd_camiones->actualiza_camion($camionObj);

        // Redirigir al inicio después de actualizar
        header("Location: ../../view/ver_camiones.php");
        exit;
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "No se recibió ningún dato del formulario.";
}
?>