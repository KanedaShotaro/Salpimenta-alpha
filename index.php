<?php

echo "index.php/";
require '/var/www/Salpimenta-backend/helpers.php';
require '/var/www/Salpimenta-backend/config.php';

include '/var/www/Salpimenta-backend/Model/BaseDatos.php';
include '/var/www/Salpimenta-backend/Model/Usuario.php';
include '/var/www/Salpimenta-backend/Model/Receta.php';
include '/var/www/Salpimenta-backend/Model/View.php';
include '/var/www/Salpimenta-backend/Model/Request.php';

session_start();

if (empty($_GET['url'])) {
    $url = '';
} else {
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();


