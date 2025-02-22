<?php include 'partials/header.php'; ?>

<section class="registro">
    <div class="container">
        <h2 class="text-center mb-4">Registrarse</h2>
        <form action="<?= base_url; ?>usuario/registro" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </form>
    </div>
</section>

<?php include 'partials/footer.php'; ?>