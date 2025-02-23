<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online - Mayorisander</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Logo de Mayorisander">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="pages/productos.html">Productos</a></li>
                <li><a href="pages/login.html">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal -->
    <main>
        <section class="banner">
            <h1>Bienvenido a Mayorisander</h1>
            <p>Tu tienda online de confianza</p>
            <a href="pages/productos.html" class="btn">Ver Productos</a>
        </section>

        <section class="destacados">
            <h2>Productos Destacados</h2>
            <div class="productos">
                <div class="producto">
                    <img src="img/producto1.jpg" alt="Producto 1">
                    <h3>Producto 1</h3>
                    <p>Descripción breve del producto.</p>
                    <span class="precio">$20.00</span>
                    <button>Añadir al carrito</button>
                </div>
                <div class="producto">
                    <img src="img/producto2.jpg" alt="Producto 2">
                    <h3>Producto 2</h3>
                    <p>Descripción breve del producto.</p>
                    <span class="precio">$25.00</span>
                    <button>Añadir al carrito</button>
                </div>
                <div class="producto">
                    <img src="img/producto3.jpg" alt="Producto 3">
                    <h3>Producto 3</h3>
                    <p>Descripción breve del producto.</p>
                    <span class="precio">$30.00</span>
                    <button>Añadir al carrito</button>
                </div>
            </div>
        </section>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2023 Mayorisander. Todos los derechos reservados.</p>
    </footer>

    <!-- Enlace al archivo JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>