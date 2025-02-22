<?php include 'partials/header.php'; ?>

<section class="carrito">
    <div class="container">
        <h2 class="text-center mb-4">Carrito de Compras</h2>
        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) : ?>
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
                    <?php foreach ($_SESSION['carrito'] as $indice => $elemento) :
                        $producto = $elemento['producto'];
                    ?>
                        <tr>
                            <td><?= $producto->nombre_producto; ?></td>
                            <td>$<?= number_format($producto->precio_producto, 2); ?></td>
                            <td><?= $elemento['unidades']; ?></td>
                            <td>$<?= number_format($producto->precio_producto * $elemento['unidades'], 2); ?></td>
                            <td>
                                <a href="<?= base_url; ?>carrito/remove&indice=<?= $indice; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-right">
                <h4>Total: $<?= number_format(Utils::statsCarrito()['total'], 2); ?></h4>
                <a href="<?= base_url; ?>pedido/hacer" class="btn btn-success">Finalizar Compra</a>
            </div>
        <?php else : ?>
            <p class="text-center">El carrito está vacío.</p>
        <?php endif; ?>
    </div>
</section>

<?php include 'partials/footer.php'; ?>