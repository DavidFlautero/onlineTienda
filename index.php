<?php
session_start(); // Inicia la sesión si no está iniciada
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorisander - Tienda Online</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo de Mayorisander">
        </div>
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Buscar producto...">
            <div id="search-results"></div>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="views/productos.php">Productos</a></li>
                <li><a href="views/login.php">Iniciar Sesión</a></li>
                <li>
                    <a href="views/carrito.php">
                        <i class="fas fa-shopping-cart"></i> Carrito
                        <span id="carrito-count">0</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Slider -->
   <!-- Contenedor del slider -->
<div class="slider-container">
    <!-- Slider principal -->
    <section class="slider">
        <div>
            <img src="assets/images/slider1.png" alt="Slide 1">
        </div>
        <div>
            <img src="assets/images/slider2.png" alt="Slide 2">
        </div>
        <div>
            <img src="assets/images/slider3.png" alt="Slide 3">
        </div>
    </section>
</div>
<section class="services-grid">
        <div class="service-item">
            <i class="fas fa-shopping-cart" style="color: red; font-size: 24px;"></i>
            <h3>¿CÓMO COMPRAR?</h3>
            <a href="#">Ver más</a>
        </div>
        <div class="service-item">
            <i class="fas fa-truck" style="color: red; font-size: 24px;"></i>
            <h3>ENVÍOS A TODO EL PAÍS</h3>
            <a href="#">Ver más</a>
        </div>
        <div class="service-item">
            <i class="fas fa-credit-card" style="color: red; font-size: 24px;"></i>
            <h3>MEDIOS DE PAGO</h3>
            <a href="#">Ver todos</a>
        </div>
        <div class="service-item">
            <i class="fas fa-tag" style="color: red; font-size: 24px;"></i>
            <h3>DESCUENTOS VIGENTES</h3>
            <a href="#">Ver todos</a>
        </div>
    </section>
    <!-- Sección de Servicios -->
    

    <!-- Productos destacados -->
    <section class="destacados">
        <h2>Productos Destacados</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/img/producto1.jpg" alt="Producto 1">
                <h3>Producto 1</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$20.00</span>
                <button onclick="añadirAlCarrito(1, 'Producto 1', 20, 'assets/img/producto1.jpg')">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="assets/img/producto2.jpg" alt="Producto 2">
                <h3>Producto 2</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$25.00</span>
                <button onclick="añadirAlCarrito(2, 'Producto 2', 25, 'assets/img/producto2.jpg')">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="assets/img/producto3.jpg" alt="Producto 3">
                <h3>Producto 3</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$30.00</span>
                <button onclick="añadirAlCarrito(3, 'Producto 3', 30, 'assets/img/producto3.jpg')">Añadir al carrito</button>
            </div>
        </div>
    </section>

    <!-- Slider lateral del carrito -->
    <div id="slider-carrito" class="slider-carrito">
        <div class="slider-contenido">
            <span class="cerrar-slider">&times;</span>
            <h2>Resumen del Carrito</h2>
            <div id="resumen-carrito">
                <!-- Los productos se cargarán aquí mediante JavaScript -->
            </div>
            <div id="total-carrito-slider" class="text-right">
                <h3>Total: <span id="total-precio-slider">$0.00</span></h3>
            </div>
            <a href="pages/carrito.php" class="btn btn-ver-carrito">Ver Carrito</a>
        </div>
        <div id="slider-carrito" class="slider-carrito">
    <div class="slider-contenido">
        <span class="cerrar-slider">&times;</span>
        <h2>Resumen del Carrito</h2>
        <div id="resumen-carrito">
            <!-- Los productos se cargarán aquí mediante JavaScript -->
        </div>
        <div id="total-carrito-slider" class="text-right">
            <h3>Total: <span id="total-precio-slider">$0.00</span></h3>
        </div>
        <a href="pages/carrito.php" class="btn btn-ver-carrito">Ver Carrito</a>
    </div>
</div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- Footer -->
    <?php include './views/partials/footer.php'; ?>
</body>
</html>