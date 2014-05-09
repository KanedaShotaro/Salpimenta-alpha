<?php

echo "index.php/";
require '/var/www/Salpimenta-backend/mvc/Controler/helpers.php';
require '/var/www/Salpimenta-backend/mvc/Controler/config.php';

include '/var/www/Salpimenta-backend/mvc/Model/BaseDatos.php';
include '/var/www/Salpimenta-backend/mvc/Model/Usuario.php';
include '/var/www/Salpimenta-backend/mvc/Model/Receta.php';

session_start();
control_url($_GET['url']);


