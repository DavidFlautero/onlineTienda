<?php
// views/admin/products/list.php

require_once __DIR__ . '/../../../models/Producto.php';

// Obtener todos los productos
$producto = new Producto();
$productos = $producto->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['id_producto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['descripcion_producto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['precio_producto']); ?></td>
                    <td><img src="/assets/uploads/<?php echo htmlspecialchars($producto['imagen_producto']); ?>" width="100"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>