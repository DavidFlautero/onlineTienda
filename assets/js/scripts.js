// Inicializa el slider con Slick
$(document).ready(function() {
    // Configuración del slider
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
    window.añadirAlCarrito = function(nombre, precio) {
        // Aquí puedes agregar la lógica para añadir el producto al carrito
        console.log(`Producto añadido: ${nombre} - $${precio}`);
        alert(`¡${nombre} añadido al carrito!`);
    };

    // Maneja el clic en los botones de "Añadir al carrito"
    $('.producto button').on('click', function() {
        const producto = $(this).closest('.producto');
        const nombre = producto.find('h3').text();
        const precio = producto.find('.precio').text().replace('$', '');
        añadirAlCarrito(nombre, precio);
    });
});