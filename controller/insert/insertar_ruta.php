<?php
include_once (dirname(__FILE__) . "/../../model/bd_rutas.php");  // Incluir el modelo de rutas
include_once (dirname(__FILE__) . "/../../class/rutas.php");  // Incluir la clase Ruta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombreRuta = $_POST['nombre'];  // Nombre de la ruta
    $coordenadas = $_POST['coordenadas'];  // Coordenadas de la ruta en formato JSON

    // Validación básica de las coordenadas
    if (empty($nombreRuta) || empty($coordenadas)) {
        echo "Hubo un problema al insertar la ruta. Datos incompletos.";
        exit;
    }

    // Convertir las coordenadas desde el formato JSON a un array
    $coordenadasArray = json_decode($coordenadas, true);  // Decodificar el JSON a un array PHP

    if ($coordenadasArray === null) {
        echo "Hubo un problema al procesar las coordenadas.";
        exit;
    }

    // Convertir el array de coordenadas a JSON antes de insertarlo en la base de datos
    $coordenadasJSON = json_encode($coordenadasArray);  // Asegurarse de que las coordenadas sean una cadena JSON

    // Crear una instancia de la clase ruta
    $nuevaRuta = new rutas();
    $nuevaRuta->setnombre($nombreRuta);
    $nuevaRuta->setcoordinates($coordenadasJSON);  // Pasar las coordenadas como cadena JSON

    // Crear una instancia de la clase bd_ruta para interactuar con la base de datos
    $bdRuta = new bd_ruta();
    try {
        // Insertar la nueva ruta en la base de datos
        $bdRuta->agrega_rutas($nuevaRuta);
        echo "Ruta insertada exitosamente.";
    } catch (Exception $e) {
        echo "Error al insertar la ruta: " . $e->getMessage();
    }
}
?>
