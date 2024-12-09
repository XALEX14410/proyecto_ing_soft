<?php
include_once realpath(dirname(__FILE__) . "/../../class/horarios.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_horarios.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $id_route = $_POST['id_route'];
    $hora = $_POST['hora'];

    // Convertir el formato de hora si es necesario
    $hora_convertida = str_replace('T', ' ', $hora); // Asegurar formato compatible con DATETIME

    // Crear una instancia de la clase horarios
    $nuevo_horario = new horarios();
    $nuevo_horario->setIdHorario(0); // El ID será generado automáticamente por la base de datos
    $nuevo_horario->setIdRoute($id_route);
    $nuevo_horario->setHora($hora_convertida);

    // Crear una instancia de la clase bd_horario y guardar el horario en la base de datos
    $bd_horario = new bd_horario();
    try {
        $bd_horario->agrega_horario($nuevo_horario);
        echo "Horario insertado exitosamente.";
    } catch (Exception $e) {
        echo "Error al insertar horario: " . $e->getMessage();
    }
}
?>
