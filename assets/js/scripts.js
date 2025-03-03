$(document).ready(function () {
    // Inicializa el slider con Slick
    $('.slider').slick({
        autoplay: true,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 900,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    // Función para abrir el slider del carrito
    function abrirSliderCarrito() {
        $('#slider-carrito').addClass('abierto'); // Agrega la clase 'abierto'
        mostrarResumenCarrito();
    }

    // Función para cerrar el slider del carrito
    $('.cerrar-slider').on('click', function () {
        $('#slider-carrito').removeClass('abierto'); // Remueve la clase 'abierto'
    });

    // Función para mostrar el resumen del carrito en el slider
    function mostrarResumenCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const resumen = $('#resumen-carrito');
        const totalPrecioSlider = $('#total-precio-slider');

        if (carrito.length === 0) {
            resumen.html('<div class="alert alert-info">Tu carrito está vacío.</div>');
            totalPrecioSlider.text('$0.00');
            return;
        }

        let html = '';
        let total = 0;

        carrito.forEach((producto, indice) => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;

            html += `
                <div class="item-carrito">
                    <img src="${producto.imagen}" alt="${producto.nombre}" style="width: 50px; height: 50px;">
                    <div>
                        <p>${producto.nombre} - $${producto.precio.toFixed(2)}</p>
                        <div class="cantidad-control">
                            <button onclick="disminuirCantidad(${indice})">-</button>
                            <span>${producto.cantidad}</span>
                            <button onclick="aumentarCantidad(${indice})">+</button>
                        </div>
                        <button onclick="eliminarProductoSlider(${indice})" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            `;
        });

        resumen.html(html);
        totalPrecioSlider.text(`$${total.toFixed(2)}`);
    }

    // Función para aumentar la cantidad de un producto
    window.aumentarCantidad = function (indice) {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        if (carrito[indice]) {
            carrito[indice].cantidad += 1;
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarResumenCarrito();
            actualizarContadorCarrito();
        }
    };

    // Función para disminuir la cantidad de un producto
    window.disminuirCantidad = function (indice) {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        if (carrito[indice] && carrito[indice].cantidad > 1) {
            carrito[indice].cantidad -= 1;
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarResumenCarrito();
            actualizarContadorCarrito();
        }
    };

    // Función para eliminar un producto desde el slider
    window.eliminarProductoSlider = function (indice) {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito.splice(indice, 1);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        mostrarResumenCarrito();
        actualizarContadorCarrito();
    };

    // Función para añadir productos al carrito
    window.añadirAlCarrito = function (id, nombre, precio, imagen) {
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
        abrirSliderCarrito(); // Abre el slider después de agregar un producto
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
    actualizarContadorCarrito();
});