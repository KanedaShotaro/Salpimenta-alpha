<?php

echo "home.php/";

if (isset($_SESSION["usuario"])) {
    header("Location: /Salpimenta-backend/index.php?url=miSalpimenta");
}else{
    include '/var/www/Salpimenta-backend/View/homeView.php';
}




