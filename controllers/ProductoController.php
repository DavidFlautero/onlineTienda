<?php
// Incluye los modelos usando rutas relativas
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

class ProductoController {

    // Método para mostrar la página de inicio
    public function index() {
        // Obtener productos destacados
        $producto = new Producto();
        $productosDestacados = $producto->getDestacados();

        // Obtener categorías
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        // Cargar la vista
        require_once __DIR__ . '/../views/home.php';
    }

    // Método para mostrar el detalle de un producto
    public function detalleProducto() {
        if (isset($_GET['id_producto'])) {
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $producto = $producto->getSelectProducto();

            // Obtener productos relacionados (misma categoría)
            $productosRelacionados = $producto->getProductosByCategoria();

            require_once __DIR__ . '/../views/producto/detalle.php';
        } else {
            header("Location:" . base_url);
        }
    }
	public function listCategories() {
    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contraseña", "basedatos");

    // Consulta para obtener todas las categorías
    $query = "SELECT * FROM tbl_categorias";
    $result = $conexion->query($query);

    // Mostrar categorías
    echo '<div class="categorias">';
    while ($categoria = $result->fetch_assoc()) {
        echo '<div class="categoria">';
        echo '<h3>' . $categoria['nombre_categoria'] . '</h3>';
        echo '</div>';
    }
    echo '</div>';

    // Cerrar conexión
    $conexion->close();
}

    // Otros métodos (gestion, crear, save, editar, eliminar, etc.)
}
?>