<?php
// controllers/ProductoController.php

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProductoController {

    public function crearProducto() {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once __DIR__ . '/../views/admin/products/create.php';
    }

    public function guardarProducto() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigirError("Método no permitido.");
        }

        // Validar si la imagen fue subida correctamente
        if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            $this->redirigirError("No se subió ninguna imagen o hubo un error en la subida.");
        }

        // Obtener datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $precio = $_POST['precio'] ?? 0;
        $categoria = $_POST['categoria'] ?? '';
        $stock = $_POST['stock'] ?? 0;
        $oferta = $_POST['oferta'] ?? 'no';
        $destacado = $_POST['destacado'] ?? 0;
        $imagen = $_FILES['imagen'];

        // Validar datos requeridos
        if (empty($nombre) || empty($precio) || empty($categoria) || empty($stock)) {
            $this->redirigirError("Todos los campos son obligatorios.");
        }

        // Procesar la imagen
        $uploadDir = __DIR__ . '/../../assets/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imagenNombre = time() . "_" . basename($imagen['name']);
        $uploadFile = $uploadDir . $imagenNombre;

        if (!move_uploaded_file($imagen['tmp_name'], $uploadFile)) {
            $this->redirigirError("No se pudo mover la imagen a la carpeta de uploads.");
        }

        // Guardar producto
        $producto = new Producto();
        $producto->setId_categoria($categoria);
        $producto->setNombre_producto($nombre);
        $producto->setDescripcion_producto($descripcion);
        $producto->setPrecio_producto($precio);
        $producto->setStock_producto($stock);
        $producto->setOferta_producto($oferta);
        $producto->setImagen_producto($imagenNombre);
        $producto->setDestacado($destacado);

        if ($producto->save()) {
            header("Location: /views/admin/products/list.php");
            exit();
        } else {
            $this->redirigirError("No se pudo guardar el producto en la base de datos.");
        }
    }

    public function listarProductos() {
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once __DIR__ . '/../views/admin/products/list.php';
    }

    private function redirigirError($mensaje) {
        header("Location: /views/admin/products/error.php?msg=" . urlencode($mensaje));
        exit();
    }
}
?>
