/* Estilos generales */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #F4F4F4;
    color: #333333;
    line-height: 1.6;
}

/* Encabezado */
header {
    background-color: #1A2A3A;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

header .logo img {
    height: 50px;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #FF6B35;
}

/* Banner */
.banner {
    background-color: #1A2A3A;
    color: #fff;
    text-align: center;
    padding: 60px 20px;
    margin-bottom: 30px;
    animation: fadeIn 1s ease-in-out;
}

.banner h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
}

.banner p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.banner .btn {
    background-color: #FF6B35;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.banner .btn:hover {
    background-color: #E65A2B;
}

/* Productos destacados */
.destacados {
    padding: 20px;
    text-align: center;
    animation: fadeIn 1s ease-in-out;
}

.destacados h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #1A2A3A;
}

.productos {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.producto {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    width: 30%;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.producto:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.producto img {
    max-width: 100%;
    border-radius: 10px;
}

.producto h3 {
    font-size: 1.5em;
    margin: 10px 0;
    color: #1A2A3A;
}

.producto p {
    font-size: 1em;
    color: #666;
}

.producto .precio {
    font-size: 1.2em;
    color: #FF6B35;
    font-weight: bold;
}

.producto button {
    background-color: #FF6B35;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.producto button:hover {
    background-color: #E65A2B;
}

/* Pie de página */
footer {
    background-color: #1A2A3A;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin-top: 40px;
}

footer p {
    margin: 0;
    font-size: 0.9em;
}

/* Animaciones */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Transiciones */
button, a {
    transition: all 0.3s ease;
}