<!DOCTYPE html>
<html lang="es">
<head>
<title>Graphic Factory</title>
<link rel="stylesheet" href="CSS proyecto.css">
</head>
<body class="fondo">
<header>
  <h1>Graphic Factory</h1>
    <h2>El lugar donde hacemos tu diseño con o sin sentido</h2>
</header>
<main>
<nav class="seleccion">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="quienessomos.html">Quienes Somos</a></li>
                <li><a href="catalogo.html">Catalogo</a></li>
                <li><a href="clientes.html">Clientes</a></li>
                <li><a href="InicioSesion.php">COMPRA</a></li>
            </ul>
    </div>
</nav>
<?php

SESSION_START();

SESSION_UNSET();

SESSION_DESTROY();

echo "Se cerro la sesion correctamente<br>";

?>
<br>
<br>
<button onclick="location.href='InicioSesion.php'">Regresar al menu</button>
<br>
<footer class="fondo-footer">
    <p>Contactanos: <a href="mailto:GraphicFactory@gmail.com">GraphicFactory@gmail.com</a></p>
    <p>Estamos ubicados en blvd independencia número 3878</p>
    <p>Telefono 732 12 12 </p>
    <p>Manejado por: Aarón Dempwolff Ceniceros y Carlos Alexis Isais Moreno</p>
    <nav class="seleccion">
      <ul>
          <li><a href="index.html">Inicio</a></li>
          <li><a href="quienessomos.html">Quienes Somos</a></li>
          <li><a href="catalogo.html">Catalogo</a></li>
          <li><a href="clientes.html">Clientes</a></li>
          <li><a href="InicioSesion.php">COMPRA</a></li>
      </ul>
</div>
</nav>
</footer>
</body>
</html>