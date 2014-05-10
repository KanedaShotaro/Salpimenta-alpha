<?php

echo "home.php/";

if (isset($_SESSION["usuario"])) {
    header("Location: /Salpimenta-backend/mvc/Controler/index.php?url=miSalpimenta");
}else{
    include '/var/www/Salpimenta-backend/mvc/View/homeView.php';
}




