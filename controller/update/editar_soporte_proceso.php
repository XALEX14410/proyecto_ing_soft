<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_soporte.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_soporte = $_POST['id'];  // ID del soporte
    $tipo_problema = $_POST['tipo_problema'];
    $problema = $_POST['problema'];
    $id_usuario = $_POST['id_usuario'];  // Asumimos que este campo se encuentra en el formulario
    $solucionado = isset($_POST['solucionado']) ? $_POST['solucionado'] : 0;  // Si solucionado está vacío, asigna 0

    // Instanciar la clase que maneja la base de datos
    $bd_soporte = new bd_soporte();

    // Crear un objeto de la clase soporte (asumimos que tienes un setter y getter adecuados)
    $soporteObj = new Soporte();
    $soporteObj->setIdSoporte($id_soporte);
    $soporteObj->setTipoProblema($tipo_problema);
    $soporteObj->setProblema($problema);
    $soporteObj->setIdUsuario($id_usuario);
    $soporteObj->setSolucionado($solucionado);

    // Llamar al método de actualización
    $bd_soporte->actualiza_soporte($soporteObj);

    // Redirigir al inicio después de actualizar
    header("Location: ../../view/ver_soporte.php"); // Cambia la ruta según sea necesario
    exit;  // Asegúrate de terminar el script después de la redirección
} else {
    echo "No se recibió ningún dato del formulario.";
}
?>
