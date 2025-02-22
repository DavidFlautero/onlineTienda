<?php
require_once 'models/usuario.php';

class UsuarioController {

    // Método para mostrar el formulario de registro
    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    // Método para guardar un nuevo usuario
    public function save() {
        if (isset($_POST)) {
            // Validar los campos del formulario
            $nombre   = isset($_POST['nombre'])   ? trim($_POST['nombre'])   : false;
            $email    = isset($_POST['email'])    ? trim($_POST['email'])    : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;

            if ($nombre && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre_usuario($nombre);
                $usuario->setEmail_usuario($email);
                $usuario->setPassword_usuario($password);

                // Intentar guardar el usuario en la base de datos
                $save = $usuario->save();

                if ($save) {
                    $_SESSION['register'] = "complete"; // Registro exitoso
                } else {
                    $_SESSION['register'] = "failed"; // Error al guardar
                }
            } else {
                $_SESSION['register'] = "failed"; // Campos incompletos
            }
        } else {
            $_SESSION['register'] = "failed"; // No se recibieron datos
        }

        // Redirigir al formulario de registro
        header("Location:" . base_url . "usuario/registro");
    }

    // Método para iniciar sesión
    public function login() {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setEmail_usuario($_POST['username']);
            $usuario->setPassword_usuario($_POST['password']);

            // Intentar autenticar al usuario
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['user'] = $identity; // Guardar datos del usuario en sesión

                // Verificar si el usuario es administrador
                if ($identity->rol_usuario == 'administrator') {
                    $_SESSION['admin'] = true;
                }

                header("Location:" . base_url); // Redirigir a la página principal
            } else {
                $_SESSION['error_login'] = "Identificación fallida"; // Error de autenticación
                header("Location:" . base_url);
            }
        } else {
            $_SESSION['error_login'] = "Datos no recibidos"; // No se recibieron datos
            header("Location:" . base_url);
        }
    }

    // Método para cerrar sesión
    public function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']); // Eliminar datos del usuario de la sesión
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']); // Eliminar datos de administrador de la sesión
        }
        session_destroy(); // Destruir la sesión
        header("Location:" . base_url); // Redirigir a la página principal
    }
}