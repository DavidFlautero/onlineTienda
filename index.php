<?php
// Inicia la sesión
session_start();

// Incluye los archivos necesarios
require_once 'autoload.php'; // Carga automática de clases
require_once 'config/db.php'; // Configuración de la base de datos
require_once 'config/parameters.php'; // Parámetros globales
require_once 'helpers/utils.php'; // Funciones útiles

// Incluye la cabecera
require_once 'views/partials/header.php'; // Ruta corregida

// Función para mostrar errores
function show_error() {
    // Crea una instancia del controlador de errores
    $error = new ErrorController();
    $error->index();
    // Redirige a la página principal
    header("Location: " . base_url);
    exit();
}

// Verifica si se ha especificado un controlador
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    // Si no se especifica un controlador ni una acción, usa el controlador por defecto
    $nombre_controlador = controller_default;
} else {
    // Si no se cumple ninguna condición, muestra un error
    show_error();
    exit();
}

// Verifica si la clase del controlador existe
if (class_exists($nombre_controlador)) {
    // Crea una instancia del controlador
    $controlador = new $nombre_controlador();

    // Verifica si se ha especificado una acción y si existe en el controlador
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        // Si no se especifica una acción, usa la acción por defecto
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        // Si no se cumple ninguna condición, muestra un error
        show_error();
    }
} else {
    // Si el controlador no existe, muestra un error
    show_error();
}

// Incluye el pie de página
require_once 'views/partials/footer.php'; // Ruta corregida
?>