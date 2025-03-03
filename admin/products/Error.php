<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8d7da; text-align: center; padding: 50px; }
        .error-container { background: white; padding: 20px; border-radius: 5px; display: inline-block; }
        h2 { color: #721c24; }
        p { color: #721c24; }
    </style>
</head>
<body>
    <div class="error-container">
        <h2>Ocurrió un error</h2>
        <p><?php echo htmlspecialchars($_GET['msg'] ?? 'Error desconocido.'); ?></p>
        <a href="/views/admin/products/list.php">Volver a la lista de productos</a>
    </div>
</body>
</html>
