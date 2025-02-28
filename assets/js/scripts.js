$(document).ready(function() {
    // Inicializa el slider con Slick
    $('.slider').slick({
        autoplay: true,          // Reproducción automática
        dots: true,              // Muestra los puntos de navegación
        arrows: true,            // Muestra flechas de navegación
        infinite: true,          // Desplazamiento infinito
        speed: 900,              // Velocidad de transición
        slidesToShow: 1,         // Número de slides visibles
        slidesToScroll: 1        // Número de slides a desplazar
    });

    // Maneja el autocompletado del buscador
    $('#search-input').on('input', function() {
        const query = $(this).val(); // Obtiene el texto ingresado
        if (query.length >= 2) {    // Solo busca si hay 2 o más caracteres
            $.ajax({
                url: 'controllers/SearchController.php', // Endpoint para buscar
                method: 'POST',
                data: { query: query },
                success: function(response) {
                    $('#search-results').html(response); // Muestra las sugerencias
                }
            });
        } else {
            $('#search-results').html(''); // Limpia las sugerencias
        }
    });

    // Maneja el clic en una sugerencia del buscador
    $(document).on('click', '#search-results div', function() {
        $('#search-input').val($(this).text()); // Llena el input con la sugerencia
        $('#search-results').html(''); // Limpia las sugerencias
    });

    // Función para abrir el modal del carrito
    function abrirModalCarrito() {
        $('#modal-carrito').css('display', 'block');
        mostrarResumenCarrito();
    }

    // Función para cerrar el modal del carrito
    $('.cerrar-modal').on('click', function() {
        $('#modal-carrito').css('display', 'none');
    });

    // Función para mostrar el resumen del carrito en el modal
    function mostrarResumenCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const resumen = $('#resumen-carrito');
        const totalPrecioModal = $('#total-precio-modal');

        if (carrito.length === 0) {
            resumen.html('<div class="alert alert-info">Tu carrito está vacío.</div>');
            totalPrecioModal.text('$0.00');
            return;
        }

        let html = '';
        let total = 0;

        carrito.forEach((producto, indice) => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;

            html += `
                <div class="item-carrito">
                    <img src="${producto.imagen}" alt="${producto.nombre}">
                    <div>
                        <p>${producto.nombre} - $${producto.precio.toFixed(2)} x ${producto.cantidad}</p>
                        <button onclick="eliminarProductoModal(${indice})" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            `;
        });

        resumen.html(html);
        totalPrecioModal.text(`$${total.toFixed(2)}`);
    }

    // Función para eliminar un producto desde el modal
    window.eliminarProductoModal = function(indice) {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito.splice(indice, 1);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        mostrarResumenCarrito();
        actualizarContadorCarrito();
    };

    // Función para añadir productos al carrito
    window.añadirAlCarrito = function(id, nombre, precio, imagen) {
        const producto = { id, nombre, precio, imagen, cantidad: 1 };
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        const productoExistente = carrito.find(p => p.id === id);
        if (productoExistente) {
            productoExistente.cantidad += 1;
        } else {
            carrito.push(producto);
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        alert(`¡${nombre} añadido al carrito!`);
        actualizarContadorCarrito();
        abrirModalCarrito(); // Abre el modal después de agregar un producto
    };

    // Función para actualizar el contador del carrito
    function actualizarContadorCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const carritoCount = $('#carrito-count');
        if (carritoCount.length) {
            carritoCount.text(carrito.length);
        }
    }

    // Actualiza el contador del carrito al cargar la página
    document.addEventListener('DOMContentLoaded', mostrarResumenCarrito);
    document.addEventListener('DOMContentLoaded', actualizarContadorCarrito);
});