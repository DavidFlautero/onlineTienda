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

    // Función para añadir productos al carrito
    window.añadirAlCarrito = function(id, nombre, precio) {
        const producto = { id, nombre, precio, cantidad: 1 }; // Incluye id y cantidad
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        // Verifica si el producto ya está en el carrito
        const productoExistente = carrito.find(p => p.id === id);
        if (productoExistente) {
            productoExistente.cantidad += 1; // Incrementa la cantidad si ya existe
        } else {
            carrito.push(producto); // Agrega el producto si no existe
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        alert(`¡${nombre} añadido al carrito!`);
        actualizarContadorCarrito(); // Actualiza el contador del carrito
    };

    // Maneja el clic en los botones de "Añadir al carrito"
    $('.producto button').on('click', function() {
        const producto = $(this).closest('.producto');
        const id = producto.data('id'); // Obtén el ID del producto
        const nombre = producto.find('h3').text();
        const precio = parseFloat(producto.find('.precio').text().replace('$', ''));
        añadirAlCarrito(id, nombre, precio); // Pasa el ID, nombre y precio
    });

    // Función para actualizar el contador del carrito
    function actualizarContadorCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const carritoCount = $('#carrito-count');
        if (carritoCount.length) {
            carritoCount.text(carrito.length);
        }
    }

    // Actualiza el contador del carrito al cargar la página
    actualizarContadorCarrito();
});