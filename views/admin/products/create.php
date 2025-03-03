<?php
// views/admin/products/create.php

require_once __DIR__ . '/../../../models/Categoria.php';
require_once __DIR__ . '/../../../config/db.php';

// Obtener todas las categorías para el dropdown
$categoria = new Categoria();
$categorias = $categoria->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <h1>Crear Nuevo Producto</h1>
    <form action="../../../controllers/productoController.php?action=guardarProducto" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" id="precio" required>

        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" required>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id_categoria']; ?>">
                    <?php echo htmlspecialchars($categoria['nombre_categoria']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>

        <button type="submit">Crear Producto</button>
    </form>
</body>
</html>