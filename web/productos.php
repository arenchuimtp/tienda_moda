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
					
		</nav>
	</header>


	<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container w3-teal">
  <h1>Colección 2022</h1>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card">
      <img src="img/adidas_tenis_barricada_dark.jfif" style="width:100%">
      <div class="w3-container">
        <h5>Adidas_Tenis_Barricada_Dark</h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <img src="img/adidas_tenis_tensaur_super.jfif" style="width:100%">
      <div class="w3-container">
        <h5>Adidas_Tenis_Tensaur_Super</h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <img src="img/Hombre/Zapatos/Tennis/Bota Sollu.jpg" style="width:70%">
      <div class="w3-container">
        <h5>Bota Sollu</h5>
      </div>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card">
      <img src="img/Hombre/Zapatos/Tennis/Botines.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Botines 
		Características: Estilo Urbano. Deportes recomendados para caminata y urbano.
        Materiales del exterior Lona. Materiales del interior Tela. Materiales de la suela Goma
        Tipos de ajuste Cordón</h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <img src="img/corniglia.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Corniglia</h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <img src="img/riomaggiore.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Riomaggiore</h5>
      </div>
    </div>
  </div>
</div>

</body>
</html>



<?php
include("\config\bd.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 
?>

<?php foreach($listaProductos as $producto ) { ?>

<div class="col-md-3">

<div class="card">

<img class="card-img-top" src=".\img\<?php echo $productos['imagen']; ?>" alt="">
<div class="card-body">

        <h4 class="card-title"><?php echo $productos['nombre']; ?></h4>
        <a name="" id="" class="btn btn-primary" href=".\img" role="button"> Ver más </a>
</div>
</div>
</div>


<?php } ?>



