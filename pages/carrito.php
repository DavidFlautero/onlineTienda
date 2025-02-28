<?php
// Incluye el header
require_once '../views/partials/header.php';
?>

<div class="container">
    <h1>Carrito de Compras</h1>

    <!-- Mostrar mensajes de confrmación o error -->
    <?php if (isset($_SESSION['carrito_agregado'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['carrito_agregado'] ?>
        </div>
        <?php unset($_SESSION['carrito_agregado']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['carrito_eliminado'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['carrito_eliminado'] ?>
        </div>
        <?php unset($_SESSION['carrito_eliminado']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['carrito_actualizado'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['carrito_actualizado'] ?>
        </div>
        <?php unset($_SESSION['carrito_actualizado']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_carrito'])): ?>
        <div class="alert alert-error">
            <?= $_SESSION['error_carrito'] ?>
        </div>
        <?php unset($_SESSION['error_carrito']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['carrito_vacio'])): ?>
        <div class="alert alert-info">
            <?= $_SESSION['carrito_vacio'] ?>
        </div>
        <?php unset($_SESSION['carrito_vacio']); ?>
    <?php endif; ?>

    <?php if (!empty($carrito)): ?>
        <!-- Incluye la tabla del carrito desde un partial -->
        <?php require_once 'partials/carrito_tabla.php'; ?>
    <?php else: ?>
        <div class="alert alert-info">
            Tu carrito está vacío.
        </div>
    <?php endif; ?>
</div>

<?php
// Incluye el footer
require_once '../views/partials/footer.php';
?>