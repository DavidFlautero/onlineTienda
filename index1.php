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
    <!-- Imagen Principal (Hero Image) -->
    <section class="hero-image">
        <img src="assets/images/hero.jpg" alt="Imagen Principal">
    </section>

    <!-- Sección de Productos Destacados -->
    <section class="destacados">
        <h2>Productos Destacados</h2>
        <div class="productos">
            <!-- Producto 1 -->
            <div class="producto">
                <img src="assets/img/producto1.jpg" alt="Producto 1">
                <h3>Producto 1</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$20.00</span>
                <button onclick="añadirAlCarrito(1, 'Producto 1', 20, 'assets/img/producto1.jpg')">Añadir al carrito</button>
            </div>
            <!-- Producto 2 -->
            <div class="producto">
                <img src="assets/img/producto2.jpg" alt="Producto 2">
                <h3>Producto 2</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$25.00</span>
                <button onclick="añadirAlCarrito(2, 'Producto 2', 25, 'assets/img/producto2.jpg')">Añadir al carrito</button>
            </div>
            <!-- Producto 3 -->
            <div class="producto">
                <img src="assets/img/producto3.jpg" alt="Producto 3">
                <h3>Producto 3</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$30.00</span>
                <button onclick="añadirAlCarrito(3, 'Producto 3', 30, 'assets/img/producto3.jpg')">Añadir al carrito</button>
            </div>
            <!-- Producto 4 -->
            <div class="producto">
                <img src="assets/img/producto4.jpg" alt="Producto 4">
                <h3>Producto 4</h3>
                <p>Descripción breve del producto.</p>
                <span class="precio">$35.00</span>
                <button onclick="añadirAlCarrito(4, 'Producto 4', 35, 'assets/img/producto4.jpg')">Añadir al carrito</button>
            </div>
        </div>
    </section>

    <!-- Slider -->
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
</body>
</html>