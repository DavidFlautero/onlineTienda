<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorisander - Tienda Online</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
                <li><a href="pages/carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner principal -->
    <section class="banner">
        <h1>Bienvenido a Mayorisander</h1>
        <p>Tu tienda online de confianza</p>
        <a href="pages/productos.php" class="btn">Ver Productos</a>
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

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2023 Mayorisander. Todos los derechos reservados.</p>
    </footer>

    <!-- Enlace al archivo JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>