<?php
session_start(); // Inicia la sesión si no está iniciada
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorisander - Tienda Online</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo de Mayorisander">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="pages/productos.php">Productos</a></li>
                <li><a href="pages/login.php">Iniciar Sesión</a></li>
                <li>
                    <a href="pages/carrito.php">
                        <i class="fas fa-shopping-cart"></i> Carrito
                        <span id="carrito-count">0</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal -->
    <section class="destacados">
        <h2>Productos Destacados</h2>
        <div class="productos">
            <div class="producto" data-id="1">
                <img src="assets/img/producto1.jpg" alt="Producto 1">
                <h3>Producto 1</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$20.00</span>
                <button onclick="añadirAlCarrito(1, 'Producto 1', 20, 'assets/img/producto1.jpg')">Añadir al carrito</button>
            </div>
            <div class="producto" data-id="2">
                <img src="assets/img/producto2.jpg" alt="Producto 2">
                <h3>Producto 2</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$25.00</span>
                <button onclick="añadirAlCarrito(2, 'Producto 2', 25, 'assets/img/producto2.jpg')">Añadir al carrito</button>
            </div>
            <div class="producto" data-id="3">
                <img src="assets/img/producto3.jpg" alt="Producto 3">
                <h3>Producto 3</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$30.00</span>
                <button onclick="añadirAlCarrito(3, 'Producto 3', 30, 'assets/img/producto3.jpg')">Añadir al carrito</button>
            </div>
        </div>
    </section>

    <!-- Modal del carrito -->
    <div id="modal-carrito" class="modal">
        <div class="modal-contenido">
            <span class="cerrar-modal">&times;</span>
            <h2>Carrito de Compras</h2>
            <div id="resumen-carrito">
                <!-- Los productos se cargarán aquí mediante JavaScript -->
            </div>
            <div id="total-carrito-modal" class="text-right">
                <h3>Total: <span id="total-precio-modal">$0.00</span></h3>
            </div>
            <a href="pages/carrito.php" class="btn btn-ver-carrito">Ver Carrito</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Función para abrir el modal del carrito
        function abrirModalCarrito() {
            $('#modal-carrito').css('display', 'block');
            mostrarResumenCarrito();
        }

        // Función para cerrar el modal del carrito
        $('.cerrar-modal').on('click', function() {
            $('#modal-carrito').css('display', 'none');
        });

        // Función para mostrar el resumen del carrito en el modal
        function mostrarResumenCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const resumen = $('#resumen-carrito');
            const totalPrecioModal = $('#total-precio-modal');

            if (carrito.length === 0) {
                resumen.html('<div class="alert alert-info">Tu carrito está vacío.</div>');
                totalPrecioModal.text('$0.00');
                return;
            }

            let html = '';
            let total = 0;

            carrito.forEach((producto, indice) => {
                const subtotal = producto.precio * producto.cantidad;
                total += subtotal;

                html += `
                    <div class="item-carrito">
                        <img src="${producto.imagen}" alt="${producto.nombre}">
                        <div>
                            <p>${producto.nombre} - $${producto.precio.toFixed(2)} x ${producto.cantidad}</p>
                            <button onclick="eliminarProductoModal(${indice})" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                `;
            });

            resumen.html(html);
            totalPrecioModal.text(`$${total.toFixed(2)}`);
        }

        // Función para eliminar un producto desde el modal
        window.eliminarProductoModal = function(indice) {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.splice(indice, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarResumenCarrito();
            actualizarContadorCarrito();
        };

        // Función para añadir productos al carrito
        window.añadirAlCarrito = function(id, nombre, precio, imagen) {
            const producto = { id, nombre, precio, imagen, cantidad: 1 };
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            const productoExistente = carrito.find(p => p.id === id);
            if (productoExistente) {
                productoExistente.cantidad += 1;
            } else {
                carrito.push(producto);
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));
            alert(`¡${nombre} añadido al carrito!`);
            actualizarContadorCarrito();
            abrirModalCarrito(); // Abre el modal después de agregar un producto
        };

        // Función para actualizar el contador del carrito
        function actualizarContadorCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const carritoCount = $('#carrito-count');
            if (carritoCount.length) {
                carritoCount.text(carrito.length);
            }
        }

        // Actualiza el contador del carrito al cargar la página
        document.addEventListener('DOMContentLoaded', mostrarResumenCarrito);
        document.addEventListener('DOMContentLoaded', actualizarContadorCarrito);
    </script>
</body>
</html>