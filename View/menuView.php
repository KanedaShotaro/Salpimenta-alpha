<?php
if (isset($_GET["zona"])) {
    $zona = $_GET["zona"];
} else {
    $zona = "explora";
}


if ($zona == "blogs") {
    ?>

    <h2>Blogs y Vlogs</h2>
    <ol class="breadcrumb">
        <li><a href="/Salpimenta-backend/index.php?url=seccionBlogDetalleControler&seccion=blogs&zona=blogs"> Blogs </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionBlogDetalleControler&seccion=vlogs&zona=blogs"> Vlogs </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionBlogDetalleControler&seccion=misBlogs&zona=blogs"> Mis Blogs </a></li>
    </ol>

    <?php
} else {
    ?>

    <h2>Secciones mi salpimenta</h2>
    <ol class="breadcrumb">
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=aperitivos&zona=<?= $zona ?>"> Aperitivos </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras&zona=<?= $zona ?>"> Ensaladas y verduras </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales&zona=<?= $zona ?>"> arroces y cereales </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas&zona=<?= $zona ?>"> Sopas y cremas </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas&zona=<?= $zona ?>"> Pastas y pizzas </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=legumbres&zona=<?= $zona ?>"> legumbres </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=carnes&zona=<?= $zona ?>"> Carnes </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos&zona=<?= $zona ?>"> Pescados y mariscos </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=huevos&zona=<?= $zona ?>"> Huevos </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=setas-y-hongos&zona=<?= $zona ?>"> Setas y hongos </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=salsas&zona=<?= $zona ?>"> Salsas </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=postres&zona=<?= $zona ?>"> Postres </a></li> 
    </ol>

    <?php }
?>

