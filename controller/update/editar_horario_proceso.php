<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_horarios.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_horario = $_POST['id'];  // ID del horario
    $id_route = $_POST['id_route'];  // ID de la ruta (o cualquier otro campo relacionado con la ruta)
    $hora = $_POST['hora'];  // Fecha y hora seleccionada en el formulario

    // Instanciar la clase que maneja la base de datos
    $bd_horario = new bd_horario();

    // Crear un objeto de la clase Horario (asumimos que tienes un setter y getter adecuados)
    $horarioObj = new horarios();
    $horarioObj->setIdHorario($id_horario);
    $horarioObj->setIdRoute($id_route);
    $horarioObj->setHora($hora);

    // Llamar al método de actualización
    
    $bd_horario->actualiza_horario($horarioObj);

    // Redirigir al inicio después de actualizar
    header("Location: ../../view/ver_horarios.php"); // Cambia la ruta según sea necesario
    exit;  // Asegúrate de terminar el script después de la redirección
} else {
    echo "No se recibió ningún dato del formulario.";
}
?>
