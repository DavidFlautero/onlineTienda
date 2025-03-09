<?php
// views/admin/products/list.php

require_once __DIR__ . '/../../../models/Producto.php';



// Obtener todos los productos con el nombre de la categoría
$producto = new Producto();
$productos = $producto->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        .status-active {
            color: green;
        }
        .status-paused {
            color: orange;
        }
        .btn-action {
            margin: 2px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Productos</h1>

        <!-- Botón para añadir producto -->
        <a href="create.php" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Añadir Producto
        </a>

        <!-- Tabla de productos -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Oferta</th>
                        <th>Imagen</th>
                        <th>Destacado</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?php echo $producto['id_producto']; ?></td>
                            <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                            <td><?php echo htmlspecialchars($producto['descripcion_producto']); ?></td>
                            <td><?php echo $producto['precio_producto']; ?></td>
                            <td><?php echo $producto['stock_producto']; ?></td>
                            <td><?php echo htmlspecialchars($producto['nombre_categoria']); ?></td>
                            <td><?php echo $producto['oferta_producto']; ?></td>
                            <td>
                                <img src="../../../assets/uploads/<?php echo $producto['imagen_producto']; ?>" width="100" alt="Imagen del producto">
                            </td>
                            <td><?php echo $producto['destacado'] ? 'Sí' : 'No'; ?></td>
                            <td>
                                <span class="<?php echo $producto['estado'] === 'active' ? 'status-active' : 'status-paused'; ?>">
                                    <?php echo $producto['estado'] === 'active' ? 'Activo' : 'Pausado'; ?>
                                </span>
                            </td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="editar.php?id=<?php echo $producto['id_producto']; ?>" class="btn btn-warning btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Botón para eliminar -->
                                <button class="btn btn-danger btn-action" onclick="confirmDelete(<?php echo $producto['id_producto']; ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <!-- Botón para cambiar estado -->
                                <form action="/onlinetienda/controllers/ProductoController.php?action=cambiarEstado" method="POST" style="display: inline;">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                    <button type="submit" class="btn btn-<?php echo $producto['estado'] === 'active' ? 'success' : 'secondary'; ?> btn-action">
                                        <?php echo $producto['estado'] === 'active' ? 'Pausar' : 'Activar'; ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Script para confirmar eliminación -->
    <script>
        function confirmDelete(id_producto) {
            if (confirm('¿Estás seguro de eliminar este producto?')) {
                window.location.href = `eliminar.php?id=${id_producto}`;
            }
        }
    </script>
</body>
</html>