<?php
// header.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        .carrito-icon {
            position: relative;
            display: inline-block;
        }
        .carrito-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white p-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tienda Online</h1>
                <nav>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="index.php" class="text-white">Inicio</a></li>
                        <li class="list-inline-item"><a href="carrito.php" class="text-white">Carrito</a></li>
                    </ul>
                </nav>
                <div class="carrito-icon">
                    <a href="carrito.php" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <span id="carrito-count" class="carrito-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Script para manejar el carrito -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Función para actualizar el contador del carrito
        function actualizarContadorCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const carritoCount = document.getElementById('carrito-count');
            carritoCount.textContent = carrito.length;
        }

        // Actualizar el contador del carrito al cargar la página
        document.addEventListener('DOMContentLoaded', actualizarContadorCarrito);
    </script>