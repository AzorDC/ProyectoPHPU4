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


<br>
<br>

<form action="MenuAdmin.php" method="POST">
<fieldset>
<legend>Agregar o disminuir inventario de servicios</legend>
<br>
        <label for="Edicion en HD">Edicion en HD: </label>
        <input type="text" name="aa" id="aa">
   <!--     <input type="number" min="0" max="10" step="1" id="a" value="5"> -->
<br>
<br>
        <label for="Imagen Animada">Imagen Animada: </label>
        <input type="text" name="ab" id="ab">
<!--        <input type="number" min="0" max="10" step="1" id="b" value="0"> -->
<br>
<br>
        <label for="Imagen Con Filtro o Editada">Imagen con filtro o editada: </label>
        <input type="text" name="ac" id="ac">
<!--        <input type="number" min="0" max="10" step="1" id="c" value="0"> -->
<br>
<br>
        <label for="Imagen Comica sin Sentido">Imagen Comica sin Sentido: </label>
        <input type="text" name="ad" id="ad">
<!--        <input type="number" min="0" max="10" step="1" id="d" value="0"> -->
<br>
<br>
<legend>(En caso que no se establezca un valor en el inventario, se asignara 0)</legend>
</fieldset>
<br>
        <input type="submit" value="Actualizar datos">
</form>
<br>
<button onclick="location.href='http://localhost/InicioSesion.php'">Terminar de administrar el inventario</button>
</main>
<br>

<!--  -------------------------------------------------------------------------------------------------------------------- --->
<div id="todo">
<?php

            //Conexión a la BD
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "tododb";
        
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
        
            if($conexion->connect_error){
                die("Conexión fallida: " . $conexion->connect_error);
            }


            /*OBTENER DATOS DE LOS SERVICIOS*/

            $busca = "SELECT * FROM productos";
            $mirar = $conexion->query($busca);

            if($mirar->num_rows > 0){
                echo '<fieldset>';
                while($row = $mirar->fetch_assoc()){
                    echo '<div><form action=""> El servicio de '.$row['prod_nombre'].' tiene un total de Servicios disponibles: '.$row['prod_stock'].'</form></div>';
                    echo '<br>';
                }
                echo '</fieldset>';
            }

            /*ACTUALIZAR LOS DATOS DEL INVENTARIO*/
            if(isset($_POST['aa'])){
        
            $stock1 = $_POST['aa'];

            $actua1 = "UPDATE productos SET prod_stock = '$stock1' WHERE prod_id like '1' ";

            $resul1 = $conexion->query($actua1);

            if($conexion->query($actua1)){
                header("Location: http://localhost/MenuAdmin.php");
            }else{
                die("Error al insertar datos: " . $conexion->error);
            } 
           
        }
        if(isset($_POST['ab'])){
            $stock2 = $_POST['ab'];
            $actua2 = "UPDATE productos SET prod_stock = '$stock2' WHERE prod_id like '2' ";
            $resul2 = $conexion->query($actua2);

            if($conexion->query($actua2) == true){
                header("Location: http://localhost/MenuAdmin.php");
            }else{
                die("Error al insertar datos: " . $conexion->error);
            } 
        }

        if(isset($_POST['ac'])){
            $stock3 = $_POST['ac'];
            $actua3 = "UPDATE productos SET prod_stock = '$stock3' WHERE prod_id like '3' ";
            $resul3 = $conexion->query($actua3);

            if($conexion->query($actua3) == true){
                header("Location: http://localhost/MenuAdmin.php");
            }else{
                die("Error al insertar datos: " . $conexion->error);
            } 
        }

        if(isset($_POST['ad'])){
            $stock4 = $_POST['ad'];
            $actua4 = "UPDATE productos SET prod_stock = '$stock4' WHERE prod_id like '4' ";
            $resul4 = $conexion->query($actua4);

            if($conexion->query($actua4) == true){
                header("Location: http://localhost/MenuAdmin.php");
            }else{
                die("Error al insertar datos: " . $conexion->error);
            } 
        }
            $conexion->close();
               
        ?>

            
            

</div>

<!--  -------------------------------------------------------------------------------------------------------------------- --->

<footer class="fondo-footer">
    <p>Contactanos: <a href="mailto:GraphicFactory@gmail.com">GraphicFactory@gmail.com</a></p>
    <p>Estamos ubicados en blvd independencia número 3878</p>
    <p>Telefono 732 12 12 </p>
    <p>Manejado por: Carlos Alexis Isais Moreno y Aarón Dempwolff Ceniceros</p>
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