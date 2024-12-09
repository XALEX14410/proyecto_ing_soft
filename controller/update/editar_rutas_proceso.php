<?php
include_once realpath(dirname(__FILE__) . "/../../model/basedatos.php");
include_once realpath(dirname(__FILE__) . "/../../model/bd_rutas.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id = $_POST['id'];  // Recuperar el ID de la ruta
    $nombre = $_POST['nombre'];
    $coordenadas = $_POST['coordenadas'];


    // Instanciar la clase que maneja la base de datos para las rutas
    $bd_ruta = new bd_ruta();

    // Crear un objeto de la clase Ruta
    $rutaObj = new rutas();
    $rutaObj->setId($id);  // Asegúrate de establecer el ID
    $rutaObj->setnombre($nombre);
    $rutaObj->setcoordinates($coordenadas);

    // Llamar al método de actualización para actualizar la ruta en la base de datos
    $bd_ruta->actualiza_dbo_dbo_usuarios($rutaObj);

    // Redirigir a la página de visualización de rutas después de actualizar
    header("Location: ../../view/ver_rutas.php"); 
    exit;
} else {
    echo "No se recibió ningún dato del formulario.";
}
?>
