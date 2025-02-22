<?php
include '../config/db.php'; // Conexión a la base de datos

// Obtiene la categoría desde la URL
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Consulta para obtener productos de la categoría seleccionada
if ($categoria) {
    $query = "SELECT * FROM tbl_productos WHERE categoria = '$categoria'";
} else {
    $query = "SELECT * FROM tbl_productos"; // Si no hay categoría, muestra todos los productos
}

$resultado = $conexion->query($query);
?>

<?php include 'partials/header.php'; ?>

<section class="productos">
    <h2><?php echo $categoria ? ucfirst($categoria) : 'Nuestros Productos'; ?></h2>
    <div class="productos-grid">
        <?php
        while ($producto = $resultado->fetch_assoc()) {
            echo '<div class="producto">';
            echo '<img src="assets/images/' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '">';
            echo '<h3>' . $producto['nombre'] . '</h3>';
            echo '<p>$' . $producto['precio'] . '</p>';
            echo '<a href="detalle_producto.php?id=' . $producto['id'] . '">Ver Detalle</a>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<?php include 'partials/footer.php'; ?>