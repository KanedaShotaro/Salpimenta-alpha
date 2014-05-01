<?php
echo "inicio.php/";
include '/var/www/Salpimenta-backend/mvc/Modelo/Usuario.php';

session_start();

if (!isset($_SESSION[usuario])) {
    header("Location: /Salpimenta-backend/mvc/Vista/index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2> Estas en inicio <?php echo $_SESSION[usuario][0]->getNombre(); ?></h2>

        <ul>
            <li><a href="#"> Mi Salpimenta </a></li>
            <li><a href="#"> Explora </a></li>
            <li><a href="#"> Blogs </a></li>
            <li><a href="/Salpimenta-backend/mvc/Vista/registroReceta.php">Subir Receta</a></li>
        </ul>
    </body>
</html>
