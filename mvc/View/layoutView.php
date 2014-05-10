<?php
echo "headerView.php/";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2> Estas en Mi Salpimenta <?php echo $_SESSION["usuario"][0]->getNombre(); ?></h2>

        <ul>
            <li><a href="#"> Mi Salpimenta </a></li>
            <li><a href="#"> Explora </a></li>
            <li><a href="#"> Blogs </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=subirReceta">Subir Receta</a></li>
        </ul>
        <h2> panel Usuario </h2>
        <ul>
            <li><a href="#"> ajustes </a></li>
            <li><a href="#"> mi ficha </a></li>
            <li><a href="#"> ver/editar mis recetas </a></li>          
        </ul>

        <h2>Secciones mi salpimenta</h2>
        <ul>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=aperitivos"> Aperitivos </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=ensaladas-y-verduras"> Ensaladas y verduras </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=arroces-y-cereales"> arroces y cereales </a></li> 
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=sopas-y-cremas"> Sopas y cremas </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=pastas-y-pizzas"> Pastas y pizzas </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=legumbres"> legumbres </a></li> 
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=carnes"> Carnes </a></li> 
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=pescados-y-mariscos"> Pescados y mariscos </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=huevos"> Huevos </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=setas-y-hongos"> Setas y hongos </a></li> 
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=salsas"> Salsas </a></li>
            <li><a href="/Salpimenta-backend/mvc/Controler/index.php?url=seccion&seccion=postres"> Postres </a></li> 
        </ul>

        <?= $tpl_content ?>

        <?php
        echo "footerView.php/";
        ?>
        <footer>
            <p> Salpimenta 2014 </P>
        </footer>
    </body>
</html>


