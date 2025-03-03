<?php
// controllers/ProductoController.php

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

// Habilitar visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProductoController {

    // Método para mostrar el formulario de creación de productos
    public function crearProducto() {
        // Obtener todas las categorías
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        // Cargar la vista del formulario
        require_once __DIR__ . '/../views/admin/products/create.php';
    }

    // Método para guardar un nuevo producto
    public function guardarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "Datos del formulario recibidos.<br>"; // Depuración
    
            // Verificar si se subió un archivo
            if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
                die("Error: No se subió ninguna imagen o hubo un error en la subida.");
            }
            echo "Archivo de imagen recibido.<br>"; // Depuración
    
            // Recuperar datos del formulario
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $imagen = $_FILES['imagen'];
    
            echo "Datos del formulario procesados.<br>"; // Depuración
    
            // Ruta de la carpeta de uploads
            $uploadDir = __DIR__ . '/../../assets/uploads/';
            echo "Ruta de uploads: $uploadDir<br>"; // Depuración
    
            // Crear la carpeta si no existe
            if (!is_dir($uploadDir)) {
                echo "La carpeta de uploads no existe. Creándola...<br>"; // Depuración
                if (!mkdir($uploadDir, 0755, true)) {
                    die("Error: No se pudo crear la carpeta de uploads.");
                }
                echo "Carpeta de uploads creada.<br>"; // Depuración
            }
    
            // Subir la imagen
            $uploadFile = $uploadDir . basename($imagen['name']);
            echo "Ruta completa del archivo: $uploadFile<br>"; // Depuración
    
            if (move_uploaded_file($imagen['tmp_name'], $uploadFile)) {
                echo "Imagen subida correctamente.<br>"; // Depuración
    
                // Guardar el producto en la base de datos
                $producto = new Producto();
                $producto->setId_categoria($categoria);
                $producto->setNombre_producto($nombre);
                $producto->setDescripcion_producto($descripcion);
                $producto->setPrecio_producto($precio);
                $producto->setImagen_producto($imagen['name']);
    
                if ($producto->save()) {
                    echo "Producto guardado en la base de datos.<br>"; // Depuración
                    header("Location: /views/admin/products/list.php"); // Redirigir a la lista de productos
                    exit();
                } else {
                    die("Error: No se pudo guardar el producto en la base de datos.");
                }
            } else {
                die("Error: No se pudo mover la imagen a la carpeta de uploads.");
            }
        } else {
            die("Error: Método no permitido.");
        }
    }
            
    

    // Método para listar todos los productos
    public function listarProductos() {
        // Obtener todos los productos
        $producto = new Producto();
        $productos = $producto->getAll();

        // Cargar la vista de listado de productos
        require_once __DIR__ . '/../views/admin/products/list.php';
    }
}
?>