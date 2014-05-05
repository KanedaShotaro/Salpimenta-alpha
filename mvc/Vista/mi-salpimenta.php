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
            <li><a href="/Salpimenta-backend/mvc/Vista/registro-receta.php">Subir Receta</a></li>
        </ul>
        <h2> panel Usuario </h2>
        <ul>
            <li><a href="#"> ajustes </a></li>
            <li><a href="#"> mi ficha </a></li>
            <li><a href="#"> ver/editar mis recetas </a></li>          
        </ul>

        <h2>Secciones mi salpimenta</h2>
        <ul>
            <li><a href="#"> Aperitivos </a></li>
            <li><a href="#"> Ensaladas y verduras </a></li>
            <li><a href="#"> rroces y cereales </a></li> 
            <li><a href="#"> Sopas y cremas </a></li>
            <li><a href="#"> Pastas y pizzas </a></li>
            <li><a href="#"> legumbres </a></li> 
            <li><a href="#"> Carnes </a></li> 
            <li><a href="#"> Pescados y mariscos </a></li>
            <li><a href="#"> Huevos </a></li>
            <li><a href="#"> Setas y hongos </a></li> 
            <li><a href="#"> Salsas </a></li>
            <li><a href="#"> Postres </a></li> 
        </ul>
    </body>
</html>
