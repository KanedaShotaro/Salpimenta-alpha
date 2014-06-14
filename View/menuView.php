<?php
if (isset($_GET["zona"])) {
    $zona = $_GET["zona"];
} else {
    $zona = "explora";
}


if ($zona == "blogs") {
    ?>
    <nav class="menu-vblog">
        <ul>
            <li><a href="/index.php?url=seccionBlogDetalleControler&seccion=vlogs&zona=blogs">Vlogs</a></li>
            <li><span></span></li>
            <li><a href="/index.php?url=seccionBlogDetalleControler&seccion=blogs&zona=blogs">Blogs</a></li>
            <li><span></span></li>
            <li><a href="/index.php?url=seccionBlogDetalleControler&seccion=misBlogs&zona=blogs">Mis Blogs </a></li>
        </ul>
    </nav>
    <div class="wrap-main">
        <?php
    } else {
        ?>

        <nav class="menu">
            <ul>
                <li class="aperitivos"><a href="/index.php?url=seccionDetalleControler&seccion=aperitivos&zona=<?= $zona ?>">Aperitivos</a></li>
                <li class="ensaladas-y-verduras"><a href="/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras&zona=<?= $zona ?>">Ensaladas y Verduras</a></li>
                <li class="arroces-y-cereales"><a href="/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales&zona=<?= $zona ?>">Arroces y Cereales</a></li>
                <li class="sopa-y-cremas"><a href="/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas&zona=<?= $zona ?>">Sopa y Cremas</a></li>
                <li class="pastas-y-pizzas"><a href="/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas&zona=<?= $zona ?>">Pastas y Pizzas</a></li>
            </ul>
            <ul>
                <li class="legumbres"><a href="/index.php?url=seccionDetalleControler&seccion=legumbres&zona=<?= $zona ?>">Legumbres</a></li>
                <li class="carnes"> <a href="/index.php?url=seccionDetalleControler&seccion=carnes&zona=<?= $zona ?>">Carnes</a></li>
                <li class="pescados-y-mariscos"><a href="/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos&zona=<?= $zona ?>">Pescados y Mariscos</a></li>
                <li class="huevos"><a href="/index.php?url=seccionDetalleControler&seccion=huevos&zona=<?= $zona ?>">Huevos</a></li>
                <li class="setas-y-hongos"><a href="/index.php?url=seccionDetalleControler&seccion=setas-y-hongos&zona=<?= $zona ?>">Setas y Hongos</a></li>
                <li class="salsas"><a href="/index.php?url=seccionDetalleControler&seccion=salsas&zona=<?= $zona ?>">Salsas</a></li>
                <li class="postres"><a href="/index.php?url=seccionDetalleControler&seccion=postres&zona=<?= $zona ?>">Postres</a></li>
            </ul>
        </nav>
        <div class="wrap-main">
        <?php }
        ?>

