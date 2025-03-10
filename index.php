<?php
session_start(); // Inicia la sesión
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
    <script src="./assets/js/script.js"></script>
</head>

<body>
    <!-- Barra superior -->
    <div class="top-bar">
        <!-- Íconos de redes sociales (izquierda) -->
        <div class="social-icons">
            <a href="https://www.instagram.com/mayorisander/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://wa.me/tu_numero" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>

        <!-- Mensaje deslizante (centro) -->
        <div class="message-bar">
            <div class="messages">
                <?php
                // Simulación de mensajes dinámicos (luego los cargaremos desde la base de datos)
                $messages = [
                    "¡Envíos gratis a todo el país!",
                    "¡Descuentos exclusivos por tiempo limitado!",
                    "¡Nuevos productos disponibles!"
                ];
                foreach ($messages as $message) {
                    echo "<p>$message</p>";
                }
                ?>
            </div>
        </div>

        <!-- Correo y ubicación (derecha) -->
        <div class="contact-info">
            <a href="mailto:alexandervillamil1987@gmail.com">
                <i class="fas fa-envelope"></i>
            </a>
            <a href="https://maps.google.com/?q=URIBURU 754" target="_blank">
                <i class="fas fa-map-marker-alt"></i>
            </a>
        </div>
    </div>

    <!-- Encabezado -->
    <header>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo de Mayorisander">
        </div>
        <div class="search-bar">
            <form action="./config/search.php" method="GET">
                <input type="text" id="search-input" name="query" placeholder="Buscar producto..." autocomplete="off">
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> <!-- Ícono de lupa -->
                </button>
                <div id="search-results" class="search-results"></div> <!-- Resultados de autocompletado -->
            </form>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
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
    <!-- Sección de Categorías se han organizado segun estadisticas para que muestre lo mas vendido de primeras-->
<section class="categorias-homecenter">
    <div class="lista-categorias">
        <!-- Categoría 1: Bazar y Hogar -->
        <div class="categoria">
            <h3>Bazar y Hogar</h3>
            <div class="subcategorias">
                <a href="#">Blanquería</a>
                <a href="#">Herramientas, grifería y balanzas</a>
                <a href="#">Luces, lámparas, focos y cámaras</a>
                <a href="#">Relojes y espejos</a>
            </div>
        </div>
        <!-- Categoría 2: Accesorios -->
        <div class="categoria">
            <h3>Accesorios</h3>
            <div class="subcategorias">
                <a href="#">Accesorios para auto, moto y bici</a>
                <a href="#">Accesorios para celular</a>
                <a href="#">Accesorios para PC y TV</a>
                <a href="#">Auriculares</a>
                <a href="#">Cables</a>
                <a href="#">Cargadores</a>
                <a href="#">Parlantes</a>
                <a href="#">Billeteras, mochilas y bolsos</a>
            </div>
        </div>
        <!-- Categoría 3: Belleza y Cuidado Personal -->
        <div class="categoria">
            <h3>Belleza y Cuidado Personal</h3>
            <div class="subcategorias">
                <a href="#">Cabello</a>
                <a href="#">Cuidado facial y personal</a>
                <a href="#">Corrector y contorno</a>
                <a href="#">Iluminador y primer</a>
                <a href="#">Brochas y pinceles</a>
                <a href="#">Labios</a>
                <a href="#">Ojos</a>
                <a href="#">Polvos y bases</a>
                <a href="#">Rubores</a>
                <a href="#">Sombras</a>
                <a href="#">Uñas</a>
                <a href="#">Perfumes</a>
            </div>
        </div>
        <!-- Categoría 4: Fitness y Bienestar -->
        <div class="categoria">
            <h3>Fitness y Bienestar</h3>
            <div class="subcategorias">
                <a href="#">Fitness, masajeadores y más</a>
                <a href="#">Defensa personal y supervivencia</a>
            </div>
        </div>
        <!-- Categoría 5: Juegos -->
        <div class="categoria">
            <h3>Juegos</h3>
            <div class="subcategorias">
                <a href="#">Videojuegos</a>
                <a href="#">Juegos de mesa</a>
            </div>
        </div>
        <!-- Categoría 6: Envíos -->
        <div class="categoria">
            <h3>Envíos</h3>
            <div class="subcategorias">
                <a href="#">Envíos nacionales</a>
                <a href="#">Envíos internacionales</a>
            </div>
        </div>
        <!-- Categoría 7: Útiles -->
        <div class="categoria">
            <h3>Útiles</h3>
            <div class="subcategorias">
                <a href="#">Útiles de oficina</a>
                <a href="#">Útiles escolares</a>
            </div>
        </div>
        <!-- Categoría 8: Temporadas -->
        <div class="categoria">
            <h3>Temporadas</h3>
            <div class="subcategorias">
                <a href="#">Verano</a>
                <a href="#">Otoño Invierno</a>
                <a href="#">Navidad</a>
            </div>
        </div>
    </div>
</section>
    <!-- Resto de tu contenido -->
    <!-- Slider -->
    <div class="slider-container">
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

    <!-- Sección de Servicios -->
    <section class="services-grid">
        <div class="service-item">
            <i class="fas fa-shopping-cart" style="color: black; font-size: 24px;"></i>
            <h3>¿CÓMO COMPRAR?</h3>
            <a href="#">Ver más</a>
        </div>
        <div class="service-item">
            <i class="fas fa-truck" style="color: black; font-size: 24px;"></i>
            <h3>¿Hacen Envíos?</h3>
            <h4>Hacemos envíos a todo el país con el expreso que quieras</h4>
        </div>
        <div class="service-item">
            <i class="fas fa-credit-card" style="color: black; font-size: 24px;"></i>
            <h3>¿Como Pago?</h3>
            <h4>Aceptamos Mercado Pago, transferencías y depósitos bancarios y pagos en el local</h4>
        </div>
        <div class="service-item">
            <i class="fas fa-tag" style="color: black; font-size: 24px;"></i>
            <h3>¿Tienen compra mínima?</h3>
            <h4>Si $50.000 Podés combinar entre diferentes artículos</h4>
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
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- Footer -->
    <?php include './views/partials/footer.php'; ?>
</body>
</html>