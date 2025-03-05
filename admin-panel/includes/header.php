<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Mayorisander</title>
    <!-- Estilos de la plantilla -->
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Barra superior -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Botón para colapsar la barra lateral -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Perfil de usuario -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i> Admin
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Configuración
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../logout.php" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar sesión
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Barra lateral -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Logo -->
            <a href="index.php" class="brand-link">
                <img src="../assets/images/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Mayorisander</span>
            </a>

            <!-- Menú -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="usuarios/listar.php" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="productos/listar.php" class="nav-link">
                                <i class="fas fa-box nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pedidos/listar.php" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reclamos/listar.php" class="nav-link">
                                <i class="fas fa-exclamation-circle nav-icon"></i>
                                <p>Reclamos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mensajes/listar.php" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Mensajes</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>