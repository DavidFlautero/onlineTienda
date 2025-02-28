<?php
// Incluye el header
require_once 'partials/header.php';
?>

<div class="container">
    <h1>Carrito de Compras</h1>

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
                        <td>
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
                        <td>$<?= number_format($producto['precio_producto'], 2) ?></td>
                        <td>
                            <a href="<?= base_url ?>carrito/down&indice=<?= $indice ?>" class="btn btn-sm btn-secondary">-</a>
                            <?= $producto['unidad_producto'] ?>
                            <a href="<?= base_url ?>carrito/up&indice=<?= $indice ?>" class="btn btn-sm btn-secondary">+</a>
                        </td>
                        <td>$<?= number_format($producto['precio_producto'] * $producto['unidad_producto'], 2) ?></td>
                        <td>
                            <a href="<?= base_url ?>carrito/remove&indice=<?= $indice ?>" class="btn btn-danger btn-sm">Eliminar</a>
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
require_once 'partials/footer.php';
?>