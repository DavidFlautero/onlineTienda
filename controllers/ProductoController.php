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

    // Otros métodos (gestion, crear, save, editar, eliminar, etc.)
}
?>