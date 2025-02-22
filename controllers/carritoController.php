<?php
require_once 'models/producto.php';

class CarritoController {

    // Método para mostrar el carrito de compras
    public function index() {
        require_once 'views/carrito/index.php';
    }

    // Método para agregar un producto al carrito
    public function add() {
        if (isset($_GET['id_producto'])) {
            $id_producto = $_GET['id_producto'];

            // Verificar si el producto ya está en el carrito
            if (isset($_SESSION['carrito'])) {
                $producto_en_carrito = false;

                foreach ($_SESSION['carrito'] as $indice => $elemento) {
                    if ($elemento['id_producto'] == $id_producto) {
                        $_SESSION['carrito'][$indice]['unidad_producto']++; // Incrementar la cantidad
                        $producto_en_carrito = true;
                        break;
                    }
                }

                // Si el producto no está en el carrito, agregarlo
                if (!$producto_en_carrito) {
                    $this->agregarProductoAlCarrito($id_producto);
                }
            } else {
                // Si no hay carrito, crearlo y agregar el producto
                $this->agregarProductoAlCarrito($id_producto);
            }

            header("Location:" . base_url . "carrito/index");
        } else {
            header("Location:" . base_url); // Redirigir si no se proporciona un ID de producto
        }
    }

    // Método para eliminar un producto del carrito
    public function remove() {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            unset($_SESSION['carrito'][$indice]); // Eliminar el producto del carrito
        }
        header("Location:" . base_url . "carrito/index");
    }

    // Método para aumentar la cantidad de un producto en el carrito
    public function up() {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidad_producto']++; // Incrementar la cantidad
        }
        header("Location:" . base_url . "carrito/index");
    }

    // Método para disminuir la cantidad de un producto en el carrito
    public function down() {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidad_producto']--; // Disminuir la cantidad

            // Si la cantidad llega a 0, eliminar el producto del carrito
            if ($_SESSION['carrito'][$indice]['unidad_producto'] == 0) {
                unset($_SESSION['carrito'][$indice]);
            }
        }
        header("Location:" . base_url . "carrito/index");
    }

    // Método para vaciar el carrito
    public function delete_all() {
        unset($_SESSION['carrito']); // Vaciar el carrito
        header("Location:" . base_url . "carrito/index");
    }

    // Método privado para agregar un producto al carrito
    private function agregarProductoAlCarrito($id_producto) {
        $producto = new Producto();
        $producto->setId_producto($id_producto);
        $producto = $producto->getSelectProducto();

        if (is_object($producto)) {
            $_SESSION['carrito'][] = array(
                "id_producto" => $producto->id_producto,
                "precio_producto" => $producto->precio_producto,
                "nombre_producto" => $producto->nombre_producto,
                "unidad_producto" => 1,
                "oferta_producto" => $producto->oferta_producto,
                "imagen_producto" => $producto->imagen_producto
            );
        }
    }
}