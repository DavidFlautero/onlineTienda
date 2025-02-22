<?php
class Producto {
    private $id_producto;
    private $id_categoria;
    private $nombre_producto;
    private $descripcion_producto;
    private $precio_producto;
    private $stock_producto;
    private $oferta_producto;
    private $fecha_producto;
    private $imagen_producto;
    private $db;

    // Constructor: establece la conexión a la base de datos
    public function __construct() {
        $this->db = Database::connect();
    }

    // Getters y Setters
    public function getId_producto() {
        return $this->id_producto;
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre_producto() {
        return $this->nombre_producto;
    }

    public function getDescripcion_producto() {
        return $this->descripcion_producto;
    }

    public function getPrecio_producto() {
        return $this->precio_producto;
    }

    public function getStock_producto() {
        return $this->stock_producto;
    }

    public function getOferta_producto() {
        return $this->oferta_producto;
    }

    public function getFecha_producto() {
        return $this->fecha_producto;
    }

    public function getImagen_producto() {
        return $this->imagen_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $this->db->real_escape_string($id_producto);
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $this->db->real_escape_string($id_categoria);
    }

    public function setNombre_producto($nombre_producto) {
        $this->nombre_producto = $this->db->real_escape_string($nombre_producto);
    }

    public function setDescripcion_producto($descripcion_producto) {
        $this->descripcion_producto = $this->db->real_escape_string($descripcion_producto);
    }

    public function setPrecio_producto($precio_producto) {
        $this->precio_producto = $this->db->real_escape_string($precio_producto);
    }

    public function setStock_producto($stock_producto) {
        $this->stock_producto = $this->db->real_escape_string($stock_producto);
    }

    public function setOferta_producto($oferta_producto) {
        $this->oferta_producto = $this->db->real_escape_string($oferta_producto);
    }

    public function setFecha_producto($fecha_producto) {
        $this->fecha_producto = $this->db->real_escape_string($fecha_producto);
    }

    public function setImagen_producto($imagen_producto) {
        $this->imagen_producto = $this->db->real_escape_string($imagen_producto);
    }

    // Obtener todos los productos
    public function getAll() {
        $sql = "SELECT * FROM tbl_productos ORDER BY id_producto DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }

    // Obtener un producto específico por su ID
    public function getOne() {
        $sql = "SELECT * FROM tbl_productos WHERE id_producto = {$this->getId_producto()};";
        $producto = $this->db->query($sql);
        return $producto->fetch_object();
    }

    // Obtener productos de una categoría específica
    public function getProductosByCategoria() {
        $sql = "SELECT p.* FROM tbl_productos p "
             . "INNER JOIN tbl_categorias c ON p.id_categoria = c.id_categoria "
             . "WHERE c.id_categoria = {$this->getId_categoria()} "
             . "ORDER BY p.nombre_producto ASC;";
        $productos = $this->db->query($sql);
        return $productos;
    }

    // Obtener productos destacados
    public function getDestacados() {
        $sql = "SELECT * FROM tbl_productos WHERE oferta_producto = 'si' ORDER BY RAND() LIMIT 6;";
        $productos = $this->db->query($sql);
        return $productos;
    }

    // Guardar un nuevo producto
    public function save() {
        $sql = "INSERT INTO tbl_productos VALUES (NULL, {$this->getId_categoria()}, '{$this->getNombre_producto()}', '{$this->getDescripcion_producto()}', {$this->getPrecio_producto()}, {$this->getStock_producto()}, '{$this->getOferta_producto()}', CURDATE(), '{$this->getImagen_producto()}');";
        $save = $this->db->query($sql);

        if ($save) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un producto existente
    public function update() {
        $sql = "UPDATE tbl_productos SET "
             . "id_categoria = {$this->getId_categoria()}, "
             . "nombre_producto = '{$this->getNombre_producto()}', "
             . "descripcion_producto = '{$this->getDescripcion_producto()}', "
             . "precio_producto = {$this->getPrecio_producto()}, "
             . "stock_producto = {$this->getStock_producto()}, "
             . "oferta_producto = '{$this->getOferta_producto()}', "
             . "imagen_producto = '{$this->getImagen_producto()}' "
             . "WHERE id_producto = {$this->getId_producto()};";
        $update = $this->db->query($sql);

        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un producto
    public function delete() {
        $sql = "DELETE FROM tbl_productos WHERE id_producto = {$this->getId_producto()};";
        $delete = $this->db->query($sql);

        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    // Obtener productos en oferta
    public function getOfertas() {
        $sql = "SELECT * FROM tbl_productos WHERE oferta_producto = 'si' ORDER BY RAND() LIMIT 6;";
        $ofertas = $this->db->query($sql);
        return $ofertas;
    }

    // Obtener productos aleatorios (para secciones como "Productos recomendados")
    public function getRandom($limit = 6) {
        $sql = "SELECT * FROM tbl_productos ORDER BY RAND() LIMIT $limit;";
        $productos = $this->db->query($sql);
        return $productos;
    }
}