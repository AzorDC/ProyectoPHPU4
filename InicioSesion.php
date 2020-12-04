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

<!--  ---------------------------------Iniciar Sesion-------------------------------------- -->
<form action="InicioSesion.php" method="POST">
<br>
<fieldset>
<legend>Iniciar Sesion</legend>
<br>
        <label for="us_ses">Nombre de usuario: </label>
        <input type="text" name="us_ses" id="us_ses">
<br>
<br>
        <label for="us_contrse">Contraseña: </label>
        <input type="password" name="us_contrse" id="us_contrse">
<br>
<br>
</fieldset>
<br>
        <input type="submit" value="Iniciar Sesión">
<br>
<br>
</form>

<!--  ---------------------------------Crear Cuenta-------------------------------------- -->
<form action="InicioSesion.php" method="POST">
<fieldset>
<legend>Crear Cuenta</legend>
<br>
        <label for="us_usuario">Nombre de usuario: </label>
        <input type="text" name="us_usuario" id="us_usuario">
<br>
<br>
        <label for="us_contra">Contraseña: </label>
        <input type="password" name="us_contra" id="us_contra">
<br>
<br>
        <label for="us_correo">Correo Electronico: </label>
        <input type="text" name="us_correo" id="us_correo">
<br>
<br>
        <label for="us_tarjeta">Tarjeta de Banco: </label>
        <input type="password" name="us_tarjeta" id="us_tarjeta">
<br>
<br>
</fieldset>
<br>
        <input type="submit" value="Crear Cuenta">
<br>
<br>
</form>
</main>

<!--  --------------------------------------CREAR CUENTA PHP--------------------------------------------------- --->
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

            // Insertar Datos
            if(isset($_POST['us_usuario']) && isset($_POST['us_contra']) && isset($_POST['us_correo']) && isset($_POST['us_tarjeta'])){
                $nombre = $_POST['us_usuario'];
                $contra = $_POST['us_contra'];
                $correo = $_POST['us_correo'];
                $tarjeta = $_POST['us_tarjeta'];
                
                $sql = "INSERT INTO usuario(us_nombre, us_pass, us_correo, us_tarjeta)
                                    VALUES('$nombre','$contra','$correo','$tarjeta')";
                
                if($conexion->query($sql) === true){
                    //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al insertar datos: " . $conexion->error);
                } 
            }

/*-------------------------------------INICIA SESION PHP-----------------------------------------------------------------*/ 
            
            if(isset($_POST['us_ses']) && isset($_POST['us_contrse'])){
                $usuariose = $_POST['us_ses'];
                $contrase = $_POST['us_contrse'];

                $sql = "SELECT us_id as ID FROM usuario WHERE us_nombre like '$usuariose' and us_pass like '$contrase'";
                $admin = "SELECT us_tipous as nivel FROM usuario WHERE us_nombre like '$usuariose' and us_pass like '$contrase'";

                $resul = $conexion->query($sql);
                $asdf = $resul->fetch_assoc();
                $ident =  $asdf["ID"];

                $resul2 = $conexion->query($admin);
                $qwe = $resul2->fetch_assoc();
                $poder = (int)$qwe["nivel"];


                                 //       $men1 = "Usted ya tiene una cuenta ID: $asdf2";
                 //       echo "<script type='text/javascript'>alert('$men1');</script>";

                if($resul){
                    if($resul->num_rows > 0){
                          

                        if($poder == 1){
                            header("Location: http://localhost/MenuAdmin.php");
                        }else{

                        /*GUARDA EL ID DEL USUARIO EN UNA VARIABLE PARA INDICAR SU SESION ACTIVA*/
                        SESSION_START();
                        $_SESSION['us_id']=$ident;

                            header("Location: COMPRA.php");
                        }
                    }else {
                        $men2 = "Cuenta no existente y/o datos incorrectos";
                        echo "<script type='text/javascript'>alert('$men2');</script>";
                    }
                }else{
                    $men3 = "Error en ".$query."<br>".$db->error;
                    echo "<script type='text/javascript'>alert('$men3');</script>";
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