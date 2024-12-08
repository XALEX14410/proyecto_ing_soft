<?php
// Llamada al controlador

include_once (dirname(__FILE__) . "/../model/listas.php");

$listas = new listas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Datos</title>
</head>
 
<style>
    /* Estilo básico para el cuerpo de la página */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Encabezados */
h2 {
    color: #0056b3;
    text-align: center;
    margin-top: 20px;
}

/* Formulario */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin: 10px 0 5px;
}

form input {
    width: 100%;
    padding: 8px;
    margin: 5px 0 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

form button:hover {
    background-color: #218838;
}

/* Tablas */
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ccc;
}

table th {
    background-color: #0056b3;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* Estilos para los botones de acción en las tablas */
button.action-btn {
    padding: 5px 10px;
    margin: 2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

button.action-btn.edit {
    background-color: #ffc107;
    color: white;
}

button.action-btn.delete {
    background-color: #dc3545;
    color: white;
}

button.action-btn.edit:hover {
    background-color: #e0a800;
}

button.action-btn.delete:hover {
    background-color: #c82333;
}

</style>
<body>

<h2>Alumnos</h2>
<form action="./../controller/insert/insertar_alumno.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required>
    <button type="submit">Insertar Alumno</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <?php $listas->getAlumnos(); ?>
</table>


<h2>Materias</h2>
<form action="./../controller/insert/insertar_materia.php" method="POST">
    <label for="nombre_materia">Nombre de la Materia:</label>
    <input type="text" name="nombre_materia" id="nombre_materia" required>
    <label for="creditos">Créditos:</label>
    <input type="number" name="creditos" id="creditos" required>
    <button type="submit">Insertar Materia</button>
</form>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Créditos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <?php $listas->getMaterias(); ?>
</table>

<h2>Pagos</h2>
<form action="./../controller/insert/insertar_pago.php" method="POST">
    <label for="alumno_id_pago">ID Alumno:</label>
    <input type="number" name="alumno_id_pago" id="alumno_id_pago" required>
    <label for="monto">Monto:</label>
    <input type="number" name="monto" id="monto" required>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" required>
    <button type="submit">Insertar Pago</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Alumno ID</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <?php $listas->getPagos(); ?>
</table>

</body>
</html>
