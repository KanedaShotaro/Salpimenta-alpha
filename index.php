<?php

require '/var/www/Salpimenta-backend/helpers.php';
require '/var/www/Salpimenta-backend/config.php';

include '/var/www/Salpimenta-backend/Library/Alert.php';
include '/var/www/Salpimenta-backend/Library/NewAlert.php';
include '/var/www/Salpimenta-backend/Library/Encryptar.php';

include '/var/www/Salpimenta-backend/Model/BaseDatos.php';
include '/var/www/Salpimenta-backend/Model/AbstractBD.php';
include '/var/www/Salpimenta-backend/Model/RecetaBd.php';
include '/var/www/Salpimenta-backend/Model/UsuarioBd.php';
include '/var/www/Salpimenta-backend/Library/AbstractFun.php';
include '/var/www/Salpimenta-backend/Library/Usuario.php';
include '/var/www/Salpimenta-backend/Library/Receta.php';
include '/var/www/Salpimenta-backend/Library/View.php';
include '/var/www/Salpimenta-backend/Library/Request.php';
include '/var/www/Salpimenta-backend/Library/RecetaDetalle.php';
include '/var/www/Salpimenta-backend/Library/Ajustes.php';
include '/var/www/Salpimenta-backend/Library/RegistroReceta.php';
include '/var/www/Salpimenta-backend/Library/RegistroUsuario.php';
include '/var/www/Salpimenta-backend/Library/SeccionDetalle.php';



session_start();

if (empty($_GET['url'])) {
    $url = '';
} else {
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();


