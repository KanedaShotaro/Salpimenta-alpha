<?php
echo "helpers.php/";

function control_url($url) {
    if (empty($url)) {
        require '/var/www/Salpimenta-backend/mvc/Controler/home.php';
    } else {
        require '/var/www/Salpimenta-backend/mvc/Controler/' . $url . '.php';
    }
}