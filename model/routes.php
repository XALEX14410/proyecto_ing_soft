<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rutas_db";

// Función para conectar a la base de datos
function connectDB($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}



// Función para obtener las rutas y sus coordenadas
function getRoutes($conn) {
    $sql = "SELECT nombre, coordinates FROM routes";
    $result = $conn->query($sql);

    $routes = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $routeName = $row['nombre'];
            $coordinates = json_decode($row['coordinates'], true);  // Convertir JSON de la BD a array PHP

            // Almacenar la ruta y sus coordenadas
            $routes[$routeName] = $coordinates;
        }
    }

    return $routes;
}

// Función para devolver las rutas en formato JSON
function returnRoutesAsJSON($routes) {
    header('Content-Type: application/json');
    echo json_encode($routes);
}

// Conectar a la base de datos
$conn = connectDB($servername, $username, $password, $dbname);



// Obtener las rutas y sus coordenadas
$routes = getRoutes($conn);

// Cerrar la conexión
$conn->close();

// Devolver las rutas en formato JSON
returnRoutesAsJSON($routes);

?>
