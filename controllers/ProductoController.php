<?php
require_once 'models/producto.php';

class ProductoController {

    // Método para mostrar productos destacados en la página principal
    public function index() {
        $producto = new Producto();
        $productosDestacados = $producto->getDestacados(); // Asegúrate de que este método exista en el modelo
        require_once 'views/home.php';
    }

    // Método para la gestión de productos (solo para administradores)
    public function gestion() {
        Utils::isAdmin(); // Verifica si el usuario es administrador
        $producto = new Producto();
        $productos = $producto->getProducto(); // Obtiene todos los productos
        require_once 'views/producto/gestion.php';
    }

    // Método para mostrar el detalle de un producto
    public function detalleProducto() {
        if (isset($_GET['id_producto'])) {
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $SelecProduct = $producto->getSelectProducto(); // Obtiene el producto seleccionado
            require_once 'views/producto/detalle.php';
        } else {
            echo "Error_031: Valor no localizado";
            //header("Location:".base_url."producto/gestion");
        }
    }

    // Método para mostrar el formulario de creación de productos (solo para administradores)
    public function crear() {
        Utils::isAdmin(); // Verifica si el usuario es administrador
        require_once 'views/producto/crear.php';
    }

    // Método para guardar o editar un producto (solo para administradores)
    public function save() {
        Utils::isAdmin(); // Verifica si el usuario es administrador
        if (isset($_POST)) {
            if (
                $_POST['name-product'] != null &&
                $_POST['id_categoria'] != null &&
                $_POST['desc-product'] != null &&
                $_POST['cost-product'] != null &&
                $_POST['stock-product'] != null &&
                $_POST['ofert-product'] != null
            ) {
                $producto = new Producto();
                $producto->setNombre_producto($_POST['name-product']);
                $producto->setId_categoria($_POST['id_categoria']);
                $producto->setDescripcion_producto($_POST['desc-product']);
                $producto->setPrecio_producto($_POST['cost-product']);
                $producto->setStock_producto($_POST['stock-product']);
                $producto->setOferta_producto($_POST['ofert-product']);
                $date = date("Y/m/d");
                $producto->setFecha_producto($date);

                // Manejo de la imagen del producto
                $file = $_FILES['img-product'];
                $namefile = $file['name'];
                $typefile = $file['type'];
                $tmpfile = $file['tmp_name'];

                if (!is_dir('uploads/images')) {
                    mkdir('uploads/images', 0777, true);
                } else {
                    move_uploaded_file($tmpfile, 'uploads/images/' . $namefile);
                    $producto->setImagen_producto($namefile);
                }

                // Si se está editando un producto
                if (isset($_GET['id_producto'])) {
                    $id = $_GET['id_producto'];
                    $producto->setId_producto($id);
                    $producto->edit(); // Método para editar el producto
                } else {
                    $producto->save(); // Método para guardar el producto
                }

                header("Location:" . base_url . "producto/gestion");
            } else {
                $_SESSION['register'] = "failed";
                header("Location:" . base_url . "producto/gestion");
            }
        } else {
            $_SESSION['register'] = "failed";
            header("Location:" . base_url . "producto/gestion");
        }
    }

    // Método para mostrar el formulario de edición de productos (solo para administradores)
    public function editar() {
        Utils::isAdmin(); // Verifica si el usuario es administrador
        if (isset($_GET['id_producto'])) {
            $edit = true;
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $SelecProduct = $producto->getSelectProducto(); // Obtiene el producto seleccionado
            require_once 'views/producto/crear.php';
        } else {
            echo "Error_031: Valor no localizado";
            //header("Location:".base_url."producto/gestion");
        }
    }

    // Método para eliminar un producto (solo para administradores)
    public function eliminar() {
        Utils::isAdmin(); // Verifica si el usuario es administrador
        if (isset($_GET['id_producto'])) {
            $producto = new Producto();
            $producto->setId_producto($_GET['id_producto']);
            $delete = $producto->delete(); // Método para eliminar el producto
            if ($delete) {
                echo "Registro eliminado correctamente";
            } else {
                echo "Error_034: No se pudo eliminar el registro";
            }
        } else {
            echo "Error_031: Valor no localizado";
            //header("Location:".base_url."producto/gestion");
        }
    }
}