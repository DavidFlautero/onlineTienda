<?php
// Incluir la conexión a la base de datos
require_once '../../config/db.php'; // Ajusta la ruta según la estructura
require_once '../../models/producto.php'; // Ajusta la ruta según la estructura

// Obtener todos los productos
$producto = new Producto();
$productos = $producto->getAll(); // Usamos la función getAll() de la clase Producto
$productosActivos = $producto->countProductosActivos(); // Obtener el número de productos activos

// Obtener productos más vendidos (ejemplo)
$productosMasVendidos = [
    ['nombre' => 'Producto A', 'ventas' => 120],
    ['nombre' => 'Producto B', 'ventas' => 95],
    ['nombre' => 'Producto C', 'ventas' => 80],
];

// Obtener productos con bajo stock (ejemplo)
$productosBajoStock = [
    ['nombre' => 'Producto X', 'stock' => 5],
    ['nombre' => 'Producto Y', 'stock' => 3],
    ['nombre' => 'Producto Z', 'stock' => 2],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Administración - Online Tienda</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Estilos personalizados -->
  <style>
    .btn-action {
      margin: 2px;
    }
    .status-active {
      color: green;
    }
    .status-paused {
      color: orange;
    }
    .editable {
      cursor: pointer;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="mb-4">Gestión de Productos</h1>

    <!-- Tarjetas de Resumen -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
          <div class="inner">
            <h3>150</h3>
            <p>Pedidos Pendientes</p>
          </div>
          <div class="icon">
            <i class="fas fa-cart-plus"></i>
          </div>
          <a href="../pedidos/index.html" class="small-box-footer">
            Más info <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
          <div class="inner">
            <h3>53</h3>
            <p>Ventas Hoy</p>
          </div>
          <div class="icon">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <a href="#" class="small-box-footer">
            Más info <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
          <div class="inner">
            <h3>12</h3>
            <p>Reclamos Pendientes</p>
          </div>
          <div class="icon">
            <i class="fas fa-exclamation-circle"></i>
          </div>
          <a href="../reclamos/index.html" class="small-box-footer">
            Más info <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-danger">
          <div class="inner">
            <h3><?php echo $productosActivos; ?></h3> <!-- Mostrar el número de productos activos -->
            <p>Productos en Stock</p>
          </div>
          <div class="icon">
            <i class="fas fa-box"></i>
          </div>
          <a href="../productos/index.html" class="small-box-footer">
            Más info <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Sección Superior: Productos más vendidos y bajo stock -->
    <div class="row">
      <!-- Productos más vendidos -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Productos más vendidos</h3>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php foreach ($productosMasVendidos as $producto): ?>
                <li class="list-group-item">
                  <?php echo $producto['nombre']; ?>
                  <span class="badge bg-primary float-end"><?php echo $producto['ventas']; ?> ventas</span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

      <!-- Productos con bajo stock -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Productos con bajo stock</h3>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php foreach ($productosBajoStock as $producto): ?>
                <li class="list-group-item">
                  <?php echo $producto['nombre']; ?>
                  <span class="badge bg-danger float-end"><?php echo $producto['stock']; ?> en stock</span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Sección Inferior: Tabla de productos -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Gestión de Productos</h3>
            <!-- Filtro de productos -->
            <div class="float-end">
              <label for="filter-status">Filtrar por estado:</label>
              <select id="filter-status" class="form-select w-25 d-inline-block">
                <option value="all">Todos</option>
                <option value="active">Activos</option>
                <option value="paused">Pausados</option>
              </select>
            </div>
          </div>
          <div class="card-body">
            <!-- Botón para añadir producto -->
            <a href="agregar.php" class="btn btn-primary mb-4">
              <i class="fas fa-plus"></i> Añadir Producto
            </a>

            <!-- Tabla de Productos -->
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th class="d-none d-sm-table-cell">Categoría</th>
                    <th class="d-none d-md-table-cell">Imagen</th>
                    <th class="d-none d-sm-table-cell">Destacado</th>
                    <th class="d-none d-sm-table-cell">Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="productTableBody">
                  <?php foreach ($productos as $producto): ?>
                    <tr id="product-<?php echo $producto['id_producto']; ?>">
                      <td class="editable" data-field="nombre_producto"><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                      <td class="editable" data-field="precio_producto"><?php echo $producto['precio_producto']; ?></td>
                      <td class="editable" data-field="stock_producto"><?php echo $producto['stock_producto']; ?></td>
                      <td class="d-none d-sm-table-cell"><?php echo htmlspecialchars($producto['nombre_categoria'] ?? 'Sin categoría'); ?></td>
                      <td class="d-none d-md-table-cell">
                        <img src="../../../assets/uploads/<?php echo $producto['imagen_producto']; ?>" width="50" alt="Imagen del producto">
                      </td>
                      <td class="d-none d-sm-table-cell"><?php echo $producto['destacado'] ? 'Sí' : 'No'; ?></td>
                      <td class="d-none d-sm-table-cell">
                        <span class="<?php echo $producto['estado'] === 'active' ? 'status-active' : 'status-paused'; ?>">
                          <?php echo $producto['estado'] === 'active' ? 'Activo' : 'Pausado'; ?>
                        </span>
                      </td>
                      <td>
                        <div class="d-flex gap-1">
                          <!-- Botón para editar/guardar -->
                          <button class="btn btn-warning btn-sm btn-action btn-edit-save" data-id="<?php echo $producto['id_producto']; ?>" onclick="toggleEdit(this)">
                            <i class="fas fa-edit"></i> Editar
                          </button>

                          <!-- Botón para eliminar -->
                          <button class="btn btn-danger btn-sm btn-action" onclick="confirmDelete(<?php echo $producto['id_producto']; ?>)">
                            <i class="fas fa-trash"></i>
                          </button>

                          <!-- Botón para cambiar estado -->
                          <form action="/onlinetienda/controllers/ProductoController.php?action=cambiarEstado" method="POST" style="display: inline;">
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                            <button type="submit" class="btn btn-<?php echo $producto['estado'] === 'active' ? 'success' : 'secondary'; ?> btn-sm btn-action">
                              <?php echo $producto['estado'] === 'active' ? 'Pausar' : 'Activar'; ?>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Función para eliminar un producto
    function confirmDelete(productId) {
      if (confirm('¿Estás seguro de eliminar este producto?')) {
        window.location.href = `/onlinetienda/controllers/ProductoController.php?action=eliminarProducto&id=${productId}`;
      }
    }
  </script>
</body>
</html>