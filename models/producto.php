<?php
// models/Producto.php

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

    public function __construct() {
        $this->db = Database::connect();
    }

    // Getters y Setters
    public function setId_categoria($id_categoria) { $this->id_categoria = intval($id_categoria); }
    public function setNombre_producto($nombre_producto) { $this->nombre_producto = trim($nombre_producto); }
    public function setDescripcion_producto($descripcion_producto) { $this->descripcion_producto = trim($descripcion_producto); }
    public function setPrecio_producto($precio_producto) { $this->precio_producto = floatval($precio_producto); }
    public function setStock_producto($stock_producto) { $this->stock_producto = intval($stock_producto); }
    public function setOferta_producto($oferta_producto) { $this->oferta_producto = ($oferta_producto === 'si' || $oferta_producto === 'no') ? $oferta_producto : 'no'; }
    public function setImagen_producto($imagen_producto) { $this->imagen_producto = trim($imagen_producto); }
    public function setDestacado($destacado) { $this->destacado = intval($destacado); }

    public function save() {
        if (empty($this->id_categoria) || empty($this->nombre_producto) || empty($this->precio_producto) || empty($this->stock_producto)) {
            die("Error: Faltan datos obligatorios.");
        }

        $stmt = $this->db->prepare("
            INSERT INTO tbl_productos (id_categoria, nombre_producto, descripcion_producto, precio_producto, stock_producto, oferta_producto, fecha_producto, imagen_producto, destacado)
            VALUES (?, ?, ?, ?, ?, ?, CURDATE(), ?, ?)
        ");
        $stmt->bind_param("issdissi", $this->id_categoria, $this->nombre_producto, $this->descripcion_producto, $this->precio_producto, $this->stock_producto, $this->oferta_producto, $this->imagen_producto, $this->destacado);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Error al guardar el producto: " . $stmt->error);
        }
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM tbl_productos ORDER BY id_producto DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>


