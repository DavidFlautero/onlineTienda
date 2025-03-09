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
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!isset($imagen) || $imagen['error'] !== UPLOAD_ERR_OK || !in_array($imagen['type'], $allowedTypes)) {
                die("Error: La imagen es obligatoria y debe ser JPEG, PNG o GIF.");
            }

            // Ruta de la carpeta de uploads
            $uploadDir = __DIR__ . '/../assets/uploads/';
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true)) {
                    die("Error: No se pudo crear la carpeta de uploads.");
                }
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
        $productosActivos = $producto->countProductosActivos(); // Obtener el número de productos activos

        // Cargar la vista con los datos
        require_once __DIR__ . '/../views/admin/products/list.php';
    }

    // Método para cambiar el estado de un producto (Activo/Pausado)
    public function cambiarEstado() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'])) {
            $id_producto = $_POST['id_producto'];
            $producto = new Producto();

            if ($producto->toggleEstado($id_producto)) {
                $_SESSION['success'] = "Estado del producto actualizado correctamente.";
            } else {
                $_SESSION['error'] = "Error al cambiar el estado del producto.";
            }

            // Redirigir de vuelta a la lista de productos
            header("Location: /onlinetienda/views/admin/products/list.php");
            exit;
        } else {
            die("Error: Método no permitido o ID de producto no proporcionado.");
        }
    }

    // Método para eliminar un producto
    public function eliminarProducto() {
        if (isset($_GET['id'])) {
            $id_producto = $_GET['id'];
            $producto = new Producto();
            $producto->setId_producto($id_producto);

            if ($producto->delete()) {
                $_SESSION['success'] = "Producto eliminado correctamente.";
            } else {
                $_SESSION['error'] = "Error al eliminar el producto.";
            }

            header("Location: /onlinetienda/views/admin/products/list.php");
            exit;
        } else {
            die("Error: ID de producto no proporcionado.");
        }
    }

    // Método para actualizar un producto
    public function actualizarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del cuerpo de la solicitud
            $data = json_decode(file_get_contents('php://input'), true);

            $id_producto = $data['id_producto'];
            $updates = $data['updates'];

            // Validar los datos
            if (empty($id_producto) || empty($updates)) {
                die(json_encode(['success' => false, 'message' => 'Datos incompletos.']));
            }

            // Actualizar el producto en la base de datos
            $producto = new Producto();
            $producto->setId_producto($id_producto);

            // Actualizar cada campo
            foreach ($updates as $field => $value) {
                if (!$producto->updateField($field, $value)) {
                    die(json_encode(['success' => false, 'message' => 'Error al actualizar el campo ' . $field]));
                }
            }

            echo json_encode(['success' => true]);
        } else {
            die(json_encode(['success' => false, 'message' => 'Método no permitido.']));
        }
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