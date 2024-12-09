<?php
include_once (dirname(__FILE__) . "/../../model/bd_soporte.php");  // Incluir el modelo de soporte
include_once (dirname(__FILE__) . "/../../class/soporte.php");  // Incluir la clase Soporte

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $tipoProblema = $_POST['tipo_problema'];  // Tipo de problema
    $problema = $_POST['problema'];  // Descripción del problema
    $idUsuario = $_POST['id_usuario'];  // ID del usuario que reporta
    $solucionado = $_POST['solucionado'];  // Estado de solución, siempre será 0

    // Validación básica de los datos
    if (empty($tipoProblema) || empty($problema) || empty($idUsuario)) {
        echo "Hubo un problema al registrar el soporte. Datos incompletos.";
        exit;
    }

    // Crear una instancia de la clase Soporte
    $nuevoSoporte = new soporte();
    $nuevoSoporte->setTipoProblema($tipoProblema);
    $nuevoSoporte->setProblema($problema);
    $nuevoSoporte->setIdUsuario($idUsuario);
    $nuevoSoporte->setSolucionado($solucionado);  // Estado de solucionado

    // Crear una instancia de la clase bd_soporte para interactuar con la base de datos
    $bdSoporte = new bd_soporte();
    try {
        // Insertar el nuevo soporte en la base de datos
        $bdSoporte->agrega_soporte($nuevoSoporte);
        echo "Problema registrado exitosamente.";
    } catch (Exception $e) {
        echo "Error al registrar el problema: " . $e->getMessage();
    }
}
?>
