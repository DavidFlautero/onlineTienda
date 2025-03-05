<?php
// search.php

// Incluye la conexión a la base de datos
require './db.php'; // Ajusta la ruta si es necesario

// Obtener la consulta del usuario
$query = $_GET['query'] ?? '';

if (!empty($query)) {
    // Conectar a la base de datos
    $db = Database::connect();

    // Preparar la consulta SQL
    $sql = "SELECT nombre_producto FROM tbl_productos WHERE nombre_producto LIKE ? LIMIT 10";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        // Bindear el parámetro
        $searchTerm = "%$query%";
        $stmt->bind_param("s", $searchTerm);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Obtener los resultados
            $result = $stmt->get_result();
            $results = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // Manejar errores de ejecución
            $results = [];
            error_log("Error al ejecutar la consulta: " . $stmt->error);
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        // Manejar errores de preparación
        $results = [];
        error_log("Error al preparar la consulta: " . $db->error);
    }

    // Cerrar la conexión
    $db->close();
} else {
    // Si no hay consulta, devolver un array vacío
    $results = [];
}

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($results);
?>