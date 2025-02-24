<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorisander - Tienda Online</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Dependencias de Slick Slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo de Mayorisander">
        </div>
        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Buscar producto...">
            <div id="search-results"></div> <!-- Aquí se mostrarán las sugerencias -->
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="pages/productos.php">Productos</a></li>
                <li><a href="pages/login.php">Iniciar Sesión</a></li>
                <li><a href="pages/carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a></li>
            </ul>
        </nav>
    </header>

    <!-- Slider -->
    <section class="slider">
        <div><img src="assets/images/slider1.png" alt="Slide 1"></div>
        <div><img src="assets/images/slider2.png" alt="Slide 2"></div>
        <div><img src="assets/images/slider3.png" alt="Slide 3"></div>
    </section>

    <!-- Sección de Servicios -->
    <section class="services-grid">
        <!-- ¿CÓMO COMPRAR? -->
        <div class="service-item">
            <i class="fas fa-shopping-cart" style="color: red; font-size: 24px;"></i>
            <h3>¿CÓMO COMPRAR?</h3>
            <a href="#">Ver más</a>
        </div>

        <!-- ENVÍOS A TODO EL PAÍS -->
        <div class="service-item">
            <i class="fas fa-truck" style="color: red; font-size: 24px;"></i>
            <h3>ENVÍOS A TODO EL PAÍS</h3>
            <a href="#">Ver más</a>
        </div>

        <!-- MEDIOS DE PAGO -->
        <div class="service-item">
            <i class="fas fa-credit-card" style="color: red; font-size: 24px;"></i>
            <h3>MEDIOS DE PAGO</h3>
            <a href="#">Ver todos</a>
        </div>

        <!-- DESCUENTOS VIGENTES -->
        <div class="service-item">
            <i class="fas fa-tag" style="color: red; font-size: 24px;"></i>
            <h3>DESCUENTOS VIGENTES</h3>
            <a href="#">Ver todos</a>
        </div>
    </section>

    <!-- Productos destacados -->
    <section class="destacados">
        <h2>Productos Destacados</h2>
        <div class="productos">
            <div class="producto">
                <img src="assets/img/producto1.jpg" alt="Producto 1">
                <h3>Producto 1</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$20.00</span>
                <button onclick="añadirAlCarrito('Producto 1', 20)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="assets/img/producto2.jpg" alt="Producto 2">
                <h3>Producto 2</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$25.00</span>
                <button onclick="añadirAlCarrito('Producto 2', 25)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="assets/img/producto3.jpg" alt="Producto 3">
                <h3>Producto 3</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$30.00</span>
                <button onclick="añadirAlCarrito('Producto 3', 30)">Añadir al carrito</button>
            </div>
        </div>
    </section>

    <!-- Incluye el Footer -->
    <?php include 'views/partials/footer.php'; ?>

    <!-- Dependencias de jQuery y Slick Slider -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Enlace al archivo JavaScript -->
    <script src="assets/js/scripts.js"></script>
</body>
</html>