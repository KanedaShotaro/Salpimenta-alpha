<?php

if (isset($_SESSION["usuario"])) {
    header("Location: /Salpimenta-backend/index.php?url=secciones&zona=misalpimenta");
}else{
    include '/var/www/Salpimenta-backend/View/homeView.php';
}




