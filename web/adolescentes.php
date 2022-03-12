<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store On Line </title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="contenedor">
			<header class="header">
				<div class="logo">
					<p class="iniciales-logo"></p>
					<h1>Store On Line</h1>
				</div>
				<nav class="menu">
					<a href="index.php">Inicio</a>
					<a href="niños.php">Niños</a>
                    <a href="niñas.php">Niñas</a>
					<a href="adolescentes.php">Adolescentes</a>
                    <a href="mujer.html">Mujer</a>
                    <a href="hombre.php">Hombre</a>
					<a href="articulos.php">Artículos</a>
				</nav>
			</header>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="four columns">
                   
                <div class="two columns u-pull-right">
                    <ul>
                        <li class="submenu">
                            <img src="img/cart.png" alt="">
                            <div id="carrito">
                                <p class="vacio">carrito vacio</p>
                                <table id="lista-carrito" class="u-full-width">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Platillos</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <a href="#" id="vaciar-carrito"
                                class="button u-full-width">vaciar carrito</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="hero">
        <div class="container"> 
            <div class="row">  
                <div class="six columns">
                    <div class="contenido-hero">
                        <h2>Encuentra tu estilo</h2>
                        <p>Todas las marcas</p>
                        <form>
                            <input class="u-full-width" type="text" placeholder="¿Que te gustaria comprar?" id="buscador">
                            <input type="submit" class="submit-buscador">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="barra">
        <div class="container">
            <div class="row">
                <div class="four columns icono icono1">
                    <p>100 Platillos diferentes<br>
                    Explora los nuevos platillos</p>
                </div>
                <div class="four columns icono icono2">
                    <p>Cheff expertos<br>
                    Prueba las nuevas combinacion</p>
                </div>
                <div class="four columns icono icono3">
                    <p>Bebida ilimitada<br>
                    Prueba tu bebida favorita</p>
                </div>
            </div>
        </div>
    </div>



    <div id="lista-platillos" class="container">
        <h1 class="encabezado">Belleza y Cuidado Personal</h1>

        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="img/bota.png" width="100" height="100"  class="imagen-bota u-full-width">
                    <div class="info-card">
                        <h4>Hamburguesa sencilla</h4>
                        <p>Bebida ilimitada</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$150.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="1">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/Tenis converse.jfif" width="100" height="100"  class="imagen-Tenis converseu-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Converse</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$150.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="2">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/tenis-classic-leather.jpg" width="100" height="100"  class="imagen-tenis-classic-leather u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Classic Leather</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$150.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="3">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="img/reebok-royal-cljog-3.0-1v.jpg" width="100" height="100"  class="imagen-reebok-royal-cljog-3.0-1v u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Reebok Royal</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$190.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="4">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/Hombre/Zapatos/Tennis/Jordan_Baloncesto.jpg" width="100" height="100"  class="imagen-Jordan_Baloncesto u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Jordan Baloncesto</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$250.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="5">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/Tenis_Nano_X1_Blanco_GZ5393_52_standard.jpg" width="100" height="100"  class="imagen-Tenis_Nano_X1_Blanco_GZ5393_52_standard u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Nano</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$450.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="6">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="img/Nike_Deporte.jpg" width="100" height="100"  class="imagen-tenis u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tennis Nike</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$150.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="7">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/adidas_tenis_barricada_dark.jfif" width="100" height="100"  class="adidas_tenis u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Addidas
                        Características: Sintético-malla y suela de caucho.</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$250.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="8">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/zapatilla_escolar.jfif" width="100" height="100"  class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Zapatilla Escolar</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$150.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="9">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="img/Tenis Nano.pgn" width="100" height="100"  class="imagen-Tenis Nano u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Nano</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$450.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="10">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/tenis Lacoste.png" width="100" height="100" class="imagen-tenis Lacoste u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Lacoste</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$450.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="11">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/Tenis Hombre.jfif" width="100" height="100"  class="imagen-Tenis Hombre u-full-width">
                    <div class="info-card">
                        <h4></h4>
                        <p>Tenis Puma</p>
                        <img src="img/estrellas.png">
                        <p class="precio"> <span class="u-pull-right">$220.000</span> </p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="12">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <footer class="footer"> 
        <div class="container">
            <div class="row">
                <div class="four columns">
                    <nav class="menu">
                        <a class="enlace" href="#">Pedidos a domicilio</a>
                        <a class="enlace" href="#">Pedidos en linea</a>
                        <a class="enlace" href="#">Pedidos por telefono</a>
                        <a class="enlace" href="#">Menu</a>
                        <a class="enlace" href="#">Bebidas</a>
                    </nav>
                </div>
                <div class="four columns">
                    <nav class="menu">
                        <a class="enlace" href="#">Restaurante</a>
                        <a class="enlace" href="#">Ubicacion</a>
                        <a class="enlace" href="#">Telefono</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/app.js"></script>
</body>
</html> 