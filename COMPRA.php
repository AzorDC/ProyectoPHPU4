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

<SCRIPT languaje="JavaScript">
function catalogo() {
alert("\n > Edicion en HD: $200 \n > Imagen Animada: $500 \n > Imagen Con Filtro o Editada: $350 \n > Imagen Comica Sin Sentido: $ 300 "
          + "\n \n Mas informacion en la pestaña Catalogo");
}
</SCRIPT>

<br>
<input type="button" value="Mostrar Catalogo" onclick="catalogo()">
<br>
<br>

<form action="COMPRA.php" method="POST">     
<fieldset>
<legend>Seleccione sus compras</legend>
        <label for="Edicion en HD">Edicion en HD: </label>
        <input type="text" name="qq" id="qq">
<br>
<br>
        <label for="Imagen Animada">Imagen Animada: </label>
        <input type="text" name="qw" id="qw">
<br>
<br>
        <label for="Imagen Con Filtro o Editada">Imagen con filtro o editada: </label>
        <input type="text" name="qe" id="qe">
<br>
<br>
        <label for="Imagen Comica sin Sentido">Imagen Comica sin Sentido: </label>
        <input type="text" name="qr" id="qr">
<br>
<br>
</fieldset>
<br>

<fieldset>
<legend>Seleccione su metodo de pago</legend>
<label for="paypal">Paypal</label>
        <input type="radio" id="paypal" name="pago" value="paypal">

        <label for="tarjeta">Tarjeta</label>
        <input type="radio" id="tarjeta" name="pago" value="tarjeta">
<br>
<br>
</fieldset>
<br>
        <input type="submit" value="Confirmar Compra">
</form>
</main>

<br>

<button onclick="location.href='SesionCerrada.php'">Cerrar Sesion</button>
<!--  -------------------------------------------------------------------------------------------------------------------- --->
<div id="todo">
<?php

            // MOSTRAR ID DEL USUARIO
            SESSION_START();
            $iden=$_SESSION['us_id'];
            echo "Usted es el usuario con el ID: $iden";

            //Conexión a la BD
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "tododb";
        
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
        
            if($conexion->connect_error){
                die("Conexión fallida: " . $conexion->connect_error);
            }

            //Edicion en HD
            if(isset($_POST['qq']))
            $serv1 = $_POST['qq'];
            else
            $serv1 = 0;

            $nostock1 = "No hay suficientes productos para su compra de Edicion en HD";

            if(is_numeric ($serv1) && $serv1 > 0){
                $prod_id = 1;
                $isPurchaseable = "Select prod_stock as Stock from productos where prod_id like '$prod_id'";
                $result = $conexion->query($isPurchaseable);
                $result2 = $result->fetch_assoc();
                $CurrentStock =  $result2["Stock"];
                $forma = $_POST['pago'];

                if($CurrentStock >= $serv1 ){
                $sql = "INSERT INTO compra(fk_prod_id, fk_us_id, com_fecha, com_cantidad, com_tipopago)
                                        VALUES(1,'$iden',now(),'$serv1', '$forma')";
                $stock = "UPDATE productos
                SET prod_stock = (Select prod_stock from productos where prod_id like '$prod_id') - '$serv1'
                WHERE prod_id like '$prod_id'";

                $FinishedPurchase = $conexion->query($stock);
                    if($conexion->query($sql) === true){
                        
                    }else{
                        die("Error al insertar datos: " . $conexion->error);
                    } 
                }else 
                echo "<script type='text/javascript'>alert('$nostock1');</script>";
            }
            //Imagen Animada
            if(isset($_POST['qw']))
            $serv2 = $_POST['qw'];
            else
            $serv2 = 0;

            $nostock2 = "No hay suficientes productos para su compra de Imagen Animada";

            if(is_numeric ($serv2) && $serv2 > 0){
                $isPurchaseable = "Select prod_stock as Stock from productos where prod_id like 2";
                $result = $conexion->query($isPurchaseable);
                $result2 = $result->fetch_assoc();
                $CurrentStock =  $result2["Stock"];
                $forma = $_POST['pago'];

                if($CurrentStock >= $serv2 ){
                $sql = "INSERT INTO compra(fk_prod_id, fk_us_id, com_fecha, com_cantidad, com_tipopago)
                                        VALUES(2,'$iden',now(),'$serv2', '$forma')";
                $stock = "UPDATE productos
                SET prod_stock = (Select prod_stock from productos where prod_id like 2) - '$serv2'
                WHERE prod_id like 2";

                $FinishedPurchase = $conexion->query($stock);
                    if($conexion->query($sql) === true){
                        
                    }else{
                        die("Error al insertar datos: " . $conexion->error);
                    } 
                }else 
                echo "<script type='text/javascript'>alert('$nostock2');</script>";
            }
            //Imagen con filtro o editada
            if(isset($_POST['qe']))
            $serv3 = $_POST['qe'];
            else
            $serv3 = 0;

            $nostock3 = "No hay suficientes productos para su compra de Imagen con filtro o editada";

            if(is_numeric ($serv3) && $serv3 > 0){
                $prod_id = 3;
                $isPurchaseable = "Select prod_stock as Stock from productos where prod_id like '$prod_id'";
                $result = $conexion->query($isPurchaseable);
                $result2 = $result->fetch_assoc();
                $CurrentStock =  $result2["Stock"];
                $forma = $_POST['pago'];

                if($CurrentStock >= $serv3 ){
                $sql = "INSERT INTO compra(fk_prod_id, fk_us_id, com_fecha, com_cantidad, com_tipopago)
                                        VALUES(3,'$iden',now(),'$serv3', '$forma')";
                $stock = "UPDATE productos
                SET prod_stock = (Select prod_stock from productos where prod_id like '$prod_id') - '$serv3'
                WHERE prod_id like '$prod_id'";

                $FinishedPurchase = $conexion->query($stock);
                    if($conexion->query($sql) === true){
                        
                    }else{
                        die("Error al insertar datos: " . $conexion->error);
                    } 
                }else 
                echo "<script type='text/javascript'>alert('$nostock3');</script>";
            }
            
            //Imagen Comica sin Sentido
            if(isset($_POST['qr']))
            $serv4 = $_POST['qr'];
            else
            $serv4 = 0;

            $nostock4 = "No hay suficientes productos para su compra de Imagen Comica sin Sentido";

            if(is_numeric ($serv4) && $serv4 > 0){
                $prod_id = 4;
                $isPurchaseable = "Select prod_stock as Stock from productos where prod_id like '$prod_id'";
                $result = $conexion->query($isPurchaseable);
                $result2 = $result->fetch_assoc();
                $CurrentStock =  $result2["Stock"];
                $forma = $_POST['pago'];
                
                if($CurrentStock >= $serv4 ){
                $sql = "INSERT INTO compra(fk_prod_id, fk_us_id, com_fecha, com_cantidad, com_tipopago)
                                        VALUES(4,'$iden',now(),'$serv4', '$forma')";
                $stock = "UPDATE productos
                SET prod_stock = (Select prod_stock from productos where prod_id like '$prod_id') - '$serv4'
                WHERE prod_id like '$prod_id'";

                $FinishedPurchase = $conexion->query($stock);
                    if($conexion->query($sql) === true){
                        
                    }else{
                        die("Error al insertar datos: " . $conexion->error);
                    } 
                }else 
                echo "<script type='text/javascript'>alert('$nostock4');</script>";
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