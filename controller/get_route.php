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

// Función para obtener todas las rutas en formato de opciones HTML
function getRouteOptions() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rutas_db";

    $conn = connectDB($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM routes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<td>'.$row["id"].'</td>
                    <td>'.$row["nombre"].'</td>
                    <td>'.$row["coordinates"].'</td>';
        }
    } else {
        echo '<td>Sin información</td>';
    }

    $conn->close();
}

// Llamar a la función para imprimir las opciones
getRouteOptions();
?>
