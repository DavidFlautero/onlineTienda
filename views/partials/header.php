<?php
// Incluye el archivo de configuración de la base de datos
require_once __DIR__ . '/../../config/db.php';

// Verifica si $conexion está definida
if (!isset($conexion)) {
    die("Error: No se pudo establecer la conexión a la base de datos.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Freelancer</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Tienda Freelancer</h1>
        <?php include __DIR__ . '/navbar.php'; ?>
    </header>