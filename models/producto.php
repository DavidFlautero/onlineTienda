<?php

require_once __DIR__ . '/../config/db.php';

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
    private $destacado;
    private $db;

    // Constructor: establece la conexión a la base de datos
    public function __construct() {
        $this->db = Database::connect();
        if ($this->db->connect_error) {
            die("Error de conexión: " . $this->db->connect_error);
        }
    }

    // Getters y Setters
    public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $this->db->real_escape_string($id_producto);
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $this->db->real_escape_string($id_categoria);
    }

    public function getNombre_producto() {
        return $this->nombre_producto;
    }

    public function setNombre_producto($nombre_producto) {
        $this->nombre_producto = $this->db->real_escape_string($nombre_producto);
    }

    public function getDescripcion_producto() {
        return $this->descripcion_producto;
    }

    public function setDescripcion_producto($descripcion_producto) {
        $this->descripcion_producto = $this->db->real_escape_string($descripcion_producto);
    }

    public function getPrecio_producto() {
        return $this->precio_producto;
    }

    public function setPrecio_producto($precio_producto) {
        $this->precio_producto = $this->db->real_escape_string($precio_producto);
    }

    public function getStock_producto() {
        return $this->stock_producto;
    }

    public function setStock_producto($stock_producto) {
        $this->stock_producto = $this->db->real_escape_string($stock_producto);
    }

    public function getOferta_producto() {
        return $this->oferta_producto;
    }

    public function setOferta_producto($oferta_producto) {
        $this->oferta_producto = $this->db->real_escape_string($oferta_producto);
    }

    public function getFecha_producto() {
        return $this->fecha_producto;
    }

    public function setFecha_producto($fecha_producto) {
        $this->fecha_producto = $this->db->real_escape_string($fecha_producto);
    }

    public function getImagen_producto() {
        return $this->imagen_producto;
    }

    public function setImagen_producto($imagen_producto) {
        $this->imagen_producto = $this->db->real_escape_string($imagen_producto);
    }

    public function getDestacado() {
        return $this->destacado;
    }

    public function setDestacado($destacado) {
        $this->destacado = $this->db->real_escape_string($destacado);
    }

    // Guardar un nuevo producto
    public function save() {
        // Validar datos antes de guardar
        if (empty($this->getId_categoria()) || empty($this->getNombre_producto()) || empty($this->getPrecio_producto())) {
            die("Error: Faltan datos obligatorios.");
        }

        // Validar tipos de datos
        if (!is_numeric($this->getPrecio_producto()) || $this->getPrecio_producto() <= 0) {
            die("Error: El precio debe ser un número positivo.");
        }
        if (!is_numeric($this->getStock_producto()) || $this->getStock_producto() < 0) {
            die("Error: El stock debe ser un número positivo o cero.");
        }

        // Preparar la consulta SQL
        $sql = "INSERT INTO tbl_productos (
                    id_categoria, 
                    nombre_producto, 
                    descripcion_producto, 
                    precio_producto, 
                    stock_producto, 
                    oferta_producto, 
                    fecha_producto, 
                    imagen_producto,
                    destacado
                ) VALUES (
                    {$this->getId_categoria()}, 
                    '{$this->getNombre_producto()}', 
                    '{$this->getDescripcion_producto()}', 
                    {$this->getPrecio_producto()}, 
                    {$this->getStock_producto()}, 
                    '{$this->getOferta_producto()}', 
                    CURDATE(), 
                    '{$this->getImagen_producto()}',
                    {$this->getDestacado()}
                );";

        // Ejecutar la consulta
        $save = $this->db->query($sql);

        // Verificar si la consulta fue exitosa
        if ($save) {
            return true;
        } else {
            die("Error al guardar el producto: " . $this->db->error);
        }
    }

    // Obtener todos los productos
    public function getAll() {
        $sql = "SELECT * FROM tbl_productos ORDER BY id_producto DESC;";
        $productos = $this->db->query($sql);
        return $productos->fetch_all(MYSQLI_ASSOC);
    }

    // Destructor: cierra la conexión a la base de datos
    public function __destruct() {
        if ($this->db) {
            $this->db->close();
        }
    }
}
?>