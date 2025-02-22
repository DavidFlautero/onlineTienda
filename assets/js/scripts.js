// Función para agregar un producto al carrito
function addToCart(producto_id) {
    fetch(`${base_url}carrito/add&id_producto=${producto_id}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Producto agregado al carrito');
                updateCartCount(data.cart_count);
            } else {
                alert('Error al agregar el producto al carrito');
            }
        })
        .catch(error => console.error('Error:', error));
}

// Función para actualizar el contador del carrito
function updateCartCount(count) {
    const cartCount = document.getElementById('cart-count');
    if (cartCount) {
        cartCount.textContent = count;
    }
}

// Función para eliminar un producto del carrito
function removeFromCart(indice) {
    fetch(`${base_url}carrito/remove&indice=${indice}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Producto eliminado del carrito');
                location.reload(); // Recargar la página para actualizar el carrito
            } else {
                alert('Error al eliminar el producto del carrito');
            }
        })
        .catch(error => console.error('Error:', error));
}

// Función para aumentar la cantidad de un producto en el carrito
function increaseQuantity(indice) {
    fetch(`${base_url}carrito/up&indice=${indice}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                location.reload(); // Recargar la página para actualizar el carrito
            } else {
                alert('Error al aumentar la cantidad');
            }
        })
        .catch(error => console.error('Error:', error));
}

// Función para disminuir la cantidad de un producto en el carrito
function decreaseQuantity(indice) {
    fetch(`${base_url}carrito/down&indice=${indice}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                location.reload(); // Recargar la página para actualizar el carrito
            } else {
                alert('Error al disminuir la cantidad');
            }
        })
        .catch(error => console.error('Error:', error));
}

// Función para vaciar el carrito
function clearCart() {
    fetch(`${base_url}carrito/delete_all`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Carrito vaciado correctamente');
                location.reload(); // Recargar la página para actualizar el carrito
            } else {
                alert('Error al vaciar el carrito');
            }
        })
        .catch(error => console.error('Error:', error));
}

// Validación del formulario de registro
document.addEventListener('DOMContentLoaded', function () {
    const registroForm = document.getElementById('registro-form');
    if (registroForm) {
        registroForm.addEventListener('submit', function (e) {
            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            if (nombre === '' || email === '' || password === '') {
                e.preventDefault();
                alert('Todos los campos son obligatorios');
            }
        });
    }
});

// Validación del formulario de login
document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            const email = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (email === '' || password === '') {
                e.preventDefault();
                alert('Todos los campos son obligatorios');
            }
        });
    }
});

// Validación del formulario de reclamo
document.addEventListener('DOMContentLoaded', function () {
    const reclamoForm = document.getElementById('reclamo-form');
    if (reclamoForm) {
        reclamoForm.addEventListener('submit', function (e) {
            const descripcion = document.getElementById('descripcion').value.trim();
            const imagen = document.getElementById('imagen').files[0];
            const video = document.getElementById('video').files[0];

            if (descripcion === '') {
                e.preventDefault();
                alert('La descripción es obligatoria');
            }

            if (!imagen && !video) {
                e.preventDefault();
                alert('Debes subir al menos una imagen o un video');
            }
        });
    }
});

// Mostrar/ocultar el menú en dispositivos móviles
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const navbarNav = document.getElementById('navbarNav');

    if (menuToggle && navbarNav) {
        menuToggle.addEventListener('click', function () {
            navbarNav.classList.toggle('show');
        });
    }
});

// Actualizar el contador del carrito al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    fetch(`${base_url}carrito/getCount`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                updateCartCount(data.cart_count);
            }
        })
        .catch(error => console.error('Error:', error));
});