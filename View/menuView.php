<?php
if (isset($_GET["zona"])) {
    $zona = $_GET["zona"];
}else{
    $zona = "explora";
}
?>


<?php if ($zona == "misalpimenta") { ?>
    <h2>Secciones mi salpimenta</h2>
    <ol class="breadcrumb">
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=aperitivos&zona=misalpimenta"> Aperitivos </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras&zona=misalpimenta"> Ensaladas y verduras </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales&zona=misalpimenta"> arroces y cereales </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas&zona=misalpimenta"> Sopas y cremas </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas&zona=misalpimenta"> Pastas y pizzas </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=legumbres&zona=misalpimenta"> legumbres </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=carnes&zona=misalpimenta"> Carnes </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos&zona=misalpimenta"> Pescados y mariscos </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=huevos&zona=misalpimenta"> Huevos </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=setas-y-hongos&zona=misalpimenta"> Setas y hongos </a></li> 
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=salsas&zona=misalpimenta"> Salsas </a></li>
        <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=postres&zona=misalpimenta"> Postres </a></li> 
    </ol>

    <!--   <h2>Secciones mi salpimenta</h2>
        <ul>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=aperitivos&zona=misalpimenta"> Aperitivos </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras&zona=misalpimenta"> Ensaladas y verduras </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales&zona=misalpimenta"> arroces y cereales </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas&zona=misalpimenta"> Sopas y cremas </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas&zona=misalpimenta"> Pastas y pizzas </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=legumbres&zona=misalpimenta"> legumbres </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=carnes&zona=misalpimenta"> Carnes </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos&zona=misalpimenta"> Pescados y mariscos </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=huevos&zona=misalpimenta"> Huevos </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=setas-y-hongos&zona=misalpimenta"> Setas y hongos </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=salsas&zona=misalpimenta"> Salsas </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=postres&zona=misalpimenta"> Postres </a></li> 
        </ul>-->
    <?php
} else {

    if ($zona == "blogs") {
        ?>

        <h2>Blogs y Vlogs</h2>
        <ol class="breadcrumb">
            <li><a href="/Salpimenta-backend/index.php?url=seccionBlogDetalleControler&seccion=blogs&zona=blogs"> Blogs </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionBlogDetalleControler&seccion=vlogs&zona=blogs"> Vlogs </a></li> 
        </ol>

        <?php
    } else {
        ?>
        <h2>Secciones Explora</h2>
        <ol class="breadcrumb">
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=aperitivos"> Aperitivos </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras"> Ensaladas y verduras </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales"> arroces y cereales </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas"> Sopas y cremas </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas"> Pastas y pizzas </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=legumbres"> legumbres </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=carnes"> Carnes </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos"> Pescados y mariscos </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=huevos"> Huevos </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=setas-y-hongos"> Setas y hongos </a></li> 
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=salsas"> Salsas </a></li>
            <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=postres"> Postres </a></li> 
        </ol>
        <!--    <ul>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=aperitivos"> Aperitivos </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras"> Ensaladas y verduras </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales"> arroces y cereales </a></li> 
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas"> Sopas y cremas </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas"> Pastas y pizzas </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=legumbres"> legumbres </a></li> 
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=carnes"> Carnes </a></li> 
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos"> Pescados y mariscos </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=huevos"> Huevos </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=setas-y-hongos"> Setas y hongos </a></li> 
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=salsas"> Salsas </a></li>
                <li><a href="/Salpimenta-backend/index.php?url=seccionDetalleControler&seccion=postres"> Postres </a></li> 
            </ul>-->
    <?php
    }
}
?>

