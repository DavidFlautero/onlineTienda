<?php
// Incluir la conexión a la base de datos
require_once '../../config/db.php'; // Ajusta la ruta según la estructura
require_once '../../models/producto.php'; // Ajusta la ruta según la estructura


// Obtener todos los productos
$productos = (new Producto())->getAll(); // Usamos la función getAll() de la clase Producto

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
  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
  <!-- OverlayScrollbars -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="../dist/css/adminlte.css" />
  <!-- ApexCharts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />
  <!-- jsvectormap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" />
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
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="app-wrapper">
    <!-- Header -->
    <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
              <i class="bi bi-list"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block">
            <a href="#" class="nav-link">Inicio</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img src="../../dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image" />
              <span class="d-none d-md-inline">Administrador</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <li class="user-header text-bg-primary">
                <img src="../../dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image" />
                <p>
                  Administrador
                  <small>Miembro desde Nov. 2023</small>
                </p>
              </li>
              <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                <a href="#" class="btn btn-default btn-flat float-end">Cerrar sesión</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Sidebar -->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <div class="sidebar-brand">
        <a href="./index.html" class="brand-link">
          <img src="../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
          <span class="brand-text fw-light">Online Tienda</span>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
            <!-- Dashboard -->
            <li class="nav-item">
              <a href="index.html" class="nav-link active">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <!-- Gestión de Vendedores -->
            <li class="nav-item">
              <a href="../usuarios/vendedores.html" class="nav-link">
                <i class="nav-icon bi bi-people-fill"></i>
                <p>Vendedores</p>
              </a>
            </li>
            <!-- Gestión de Productos -->
            <li class="nav-item">
              <a href="../productos/index.html" class="nav-link">
                <i class="nav-icon bi bi-box-seam-fill"></i>
                <p>Productos</p>
              </a>
            </li>
            <!-- Gestión de Pedidos -->
            <li class="nav-item">
              <a href="../pedidos/index.html" class="nav-link">
                <i class="nav-icon bi bi-cart-fill"></i>
                <p>Pedidos</p>
              </a>
            </li>
            <!-- Reclamos -->
            <li class="nav-item">
              <a href="../reclamos/index.html" class="nav-link">
                <i class="nav-icon bi bi-exclamation-circle-fill"></i>
                <p>Reclamos</p>
              </a>
            </li>
            <!-- Estadísticas -->
            <li class="nav-item">
              <a href="../estadisticas/index.html" class="nav-link">
                <i class="nav-icon bi bi-bar-chart-fill"></i>
                <p>Estadísticas</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="app-content">
        <div class="container-fluid">
          <!-- Tarjetas de Resumen -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-primary">
                <div class="inner">
                  <h3>150</h3>
                  <p>Pedidos Pendientes</p>
                </div>
                <div class="icon">
                  <i class="bi bi-cart-fill"></i>
                </div>
                <a href="../pedidos/index.html" class="small-box-footer">
                  Más info <i class="bi bi-arrow-right"></i>
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
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Más info <i class="bi bi-arrow-right"></i>
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
                  <i class="bi bi-exclamation-circle-fill"></i>
                </div>
                <a href="../reclamos/index.html" class="small-box-footer">
                  Más info <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Productos en Stock</p>
                </div>
                <div class="icon">
                  <i class="bi bi-box-fill"></i>
                </div>
                <a href="../productos/index.html" class="small-box-footer">
                  Más info <i class="bi bi-arrow-right"></i>
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
                            <td class="d-none d-sm-table-cell"><?php echo htmlspecialchars($producto['nombre_categoria']); ?></td>
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

          <!-- Gráficos y Estadísticas -->
          <div class="row">
            <div class="col-lg-7">
              <div class="card mb-4">
                <div class="card-header">
                  <h3 class="card-title">Ventas Mensuales</h3>
                </div>
                <div class="card-body">
                  <div id="revenue-chart"></div>
                </div>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="card mb-4">
                <div class="card-header">
                  <h3 class="card-title">Reclamos por Vendedor</h3>
                </div>
                <div class="card-body">
                  <div id="reclamos-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer">
      <strong>Copyright &copy; 2023 Online Tienda.</strong> Todos los derechos reservados.
    </footer>
  </div>

  <!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="../dist/js/adminlte.js"></script>

<!-- ApexCharts (solo una vez) -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>

<!-- Tu script personalizado -->
<script >// Configuración de gráficos
document.addEventListener("DOMContentLoaded", function () {
  const salesChartOptions = {
      series: [
          {
              name: "Ventas",
              data: [30, 40, 35, 50, 49, 60, 70],
          },
      ],
      chart: {
          type: "line",
          height: 350,
      },
      xaxis: {
          categories: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul"],
      },
  };

  const salesChart = new ApexCharts(
      document.querySelector("#revenue-chart"),
      salesChartOptions
  );
  salesChart.render();
});

// Función para eliminar un producto
function confirmDelete(productId) {
  if (confirm('¿Estás seguro de eliminar este producto?')) {
      fetch(`/onlinetienda/controllers/ProductoController.php?action=eliminarProducto&id=${productId}`)
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload(); // Recargar la página para ver los cambios
              } else {
                  alert(data.error || 'Error al eliminar el producto.');
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('Error al conectar con el servidor.');
          });
  }
}

// Función para habilitar/deshabilitar la edición en línea
function toggleEdit(button) {
  const productId = button.getAttribute('data-id');
  const row = document.getElementById(`product-${productId}`);
  const isEditing = button.innerHTML.includes('Guardar');

  if (isEditing) {
      saveChanges(productId, row, button);
  } else {
      enableEditing(row, button);
  }
}

// Función para habilitar la edición
function enableEditing(row, button) {
  button.innerHTML = '<i class="fas fa-save"></i> Guardar';
  row.querySelectorAll('.editable').forEach(cell => {
      const field = cell.getAttribute('data-field');
      const value = cell.innerText;
      const input = document.createElement('input');
      input.type = 'text';
      input.value = value;
      input.className = 'form-control';
      cell.innerHTML = '';
      cell.appendChild(input);
  });
}

// Función para guardar los cambios
function saveChanges(productId, row, button) {
  const updates = {};

  row.querySelectorAll('.editable').forEach(cell => {
      const field = cell.getAttribute('data-field');
      const input = cell.querySelector('input');
      updates[field] = input.value;
  });

  fetch(`/onlinetienda/controllers/ProductoController.php?action=actualizarProducto`, {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify({
          id_producto: productId,
          updates: updates,
      }),
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          disableEditing(row, button);
      } else {
          alert(data.error || 'Error al actualizar el producto.');
      }
  })
  .catch(error => {
      console.error('Error:', error);
      alert('Error al conectar con el servidor.');
  });
}

// Función para deshabilitar la edición
function disableEditing(row, button) {
  button.innerHTML = '<i class="fas fa-edit"></i> Editar';
  row.querySelectorAll('.editable').forEach(cell => {
      const input = cell.querySelector('input');
      cell.innerHTML = input.value;
  });
}</script>
  
</body>
</html>