<?php
// Iniciar sesión para manejar mensajes de éxito/error
session_start();

// Incluir modelos necesarios
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
            // Validar que todos los campos obligatorios estén presentes
            if (empty($_POST['nombre']) || empty($_POST['precio']) || empty($_POST['categoria'])) {
                die("Error: Todos los campos obligatorios son requeridos.");
            }

            // Recuperar datos del formulario
            $nombre = $_POST['nombre'];
            $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $stock = !empty($_POST['stock']) ? $_POST['stock'] : 0;
            $oferta = !empty($_POST['oferta']) ? $_POST['oferta'] : null;
            $imagen = $_FILES['imagen'];
            $destacado = isset($_POST['destacado']) ? $_POST['destacado'] : 0;

            // Validar la imagen
           
        // Validar la imagen
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!isset($imagen) || $imagen['error'] !== UPLOAD_ERR_OK || !in_array($imagen['type'], $allowedTypes)) {
            die("Error: La imagen es obligatoria y debe ser JPEG, PNG o GIF.");
        }

        // Ruta de la carpeta de uploads
        $uploadDir = __DIR__ . '/../assets/uploads/';
        echo "Ruta de uploads: " . $uploadDir . "<br>";

        // Crear la carpeta si no existe
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                die("Error: No se pudo crear la carpeta de uploads.");
            }
        } else {
            echo "La carpeta de uploads ya existe.<br>";
        }

            // Subir la imagen
            $uploadFile = $uploadDir . basename($imagen['name']);
            if (!move_uploaded_file($imagen['tmp_name'], $uploadFile)) {
                die("Error: No se pudo mover la imagen a la carpeta de uploads.");
            }

            // Guardar el producto en la base de datos
            $producto = new Producto();
            $producto->setId_categoria($categoria);
            $producto->setNombre_producto($nombre);
            $producto->setDescripcion_producto($descripcion);
            $producto->setPrecio_producto($precio);
            $producto->setStock_producto($stock);
            $producto->setOferta_producto($oferta);
            $producto->setImagen_producto($imagen['name']);
            $producto->setDestacado($destacado);

            if ($producto->save()) {
                $_SESSION['success'] = "Producto guardado correctamente.";
                header("Location: /onlinetienda/views/admin/products/list.php");
                exit;
            } else {
                $_SESSION['error'] = "Error al guardar el producto.";
                header("Location: /onlinetienda/views/admin/products/create.php");
                exit;
            }
        } else {
            die("Error: Método no permitido.");
        }
    }

    // Método para listar todos los productos
    public function listarProductos() {
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once __DIR__ . '/../views/admin/products/list.php';
    }
}

// Uso del controlador
$action = $_GET['action'] ?? 'listarProductos'; // Acción por defecto
$controller = new ProductoController();

// Ejecutar la acción correspondiente
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die("Error: Acción no válida.");
}
?>