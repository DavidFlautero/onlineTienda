<?php
// config/db.php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost', 'root', '', 'tienda_freelancer');
        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
        $this->connection->set_charset("utf8mb4");
    }

    public static function connect() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}
?>
