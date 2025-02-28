<?php
// Incluye el header
require_once '../views/partials/header.php';
?>

<div class="container">
    <h1>Carrito de Compras</h1>

    <!-- Mostrar mensajes de confirmación o error -->
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
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito as $indice => $producto): ?>
                    <tr>
                        <td data-label="Producto">
                            <?= htmlspecialchars($producto['nombre_producto']) ?>
                            <?php if ($producto['stock_producto'] < 5): ?>
                                <div class="alert alert-warning">
                                    ¡Este artículo está por agotarse! Solo quedan <?= $producto['stock_producto'] ?> unidades.
                                </div>
                            <?php endif; ?>

                            <?php if ($producto['stock_producto'] == 0 && !empty($producto['reemplazos'])): ?>
                                <div class="alert alert-danger">
                                    Este artículo está agotado. ¿Te gustaría elegir un reemplazo?
                                </div>
                                <ul>
                                    <?php foreach ($producto['reemplazos'] as $reemplazo): ?>
                                        <li>
                                            <a href="<?= base_url ?>carrito/add&id_producto=<?= $reemplazo->id_producto ?>">
                                                <?= htmlspecialchars($reemplazo->nombre_producto) ?> - $<?= number_format($reemplazo->precio_producto, 2) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                        <td data-label="Precio">$<?= number_format($producto['precio_producto'], 2) ?></td>
                        <td data-label="Cantidad">
                            <a href="<?= base_url ?>carrito/down&indice=<?= $indice ?>" class="btn btn-secondary">-</a>
                            <?= $producto['unidad_producto'] ?>
                            <a href="<?= base_url ?>carrito/up&indice=<?= $indice ?>" class="btn btn-secondary">+</a>
                        </td>
                        <td data-label="Total">$<?= number_format($producto['precio_producto'] * $producto['unidad_producto'], 2) ?></td>
                        <td data-label="Acciones">
                            <a href="<?= base_url ?>carrito/remove&indice=<?= $indice ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <h4>Total: $<?= number_format($this->calcularTotalCarrito(), 2) ?></h4>
            <a href="<?= base_url ?>carrito/delete_all" class="btn btn-danger">Vaciar Carrito</a>
            <a href="<?= base_url ?>pedido/hacer" class="btn btn-success">Realizar Pedido</a>
        </div>
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