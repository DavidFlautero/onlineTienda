<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorisander - Tienda Online</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
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
            <img src="../assets/images/logo.png" alt="Logo de Mayorisander">
        </div>
        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Buscar producto...">
            <div id="search-results"></div> <!-- Aquí se mostrarán las sugerencias -->
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../pages/productos.php">Productos</a></li>
                <li><a href="../pages/login.php">Iniciar Sesión</a></li>
                <li><a href="../pages/carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a></li>
            </ul>
        </nav>
    </header>

   

    <!-- Incluye el Footer -->
    <?php include '../views/partials/footer.php'; ?>

    <!-- Dependencias de jQuery y Slick Slider -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Enlace al archivo JavaScript -->
    <script src="../assets/js/scripts.js"></script>
</body>
</html>