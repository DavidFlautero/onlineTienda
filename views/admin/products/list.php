<?php
// views/admin/products/list.php

require_once __DIR__ . '/../../../models/Producto.php';

$producto = new Producto();
$productos = $producto->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../../../assets/css/styles.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Oferta</th>
                <th>Imagen</th>
                <th>Destacado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['id_producto']; ?></td>
                    <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                    <td><?php echo htmlspecialchars($producto['descripcion_producto']); ?></td>
                    <td><?php echo $producto['precio_producto']; ?></td>
                    <td><?php echo $producto['stock_producto']; ?></td>
                    <td><?php echo $producto['oferta_producto']; ?></td>
                    <td><img src="../../../assets/uploads/<?php echo $producto['imagen_producto']; ?>" width="100"></td>
                    <td><?php echo $producto['destacado'] ? 'Sí' : 'No'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>